<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {

        try {
            $data = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (!auth()->attempt($data)) {
                return response()->json([
                    'message' => 'Veullez entrez un identifiant valide.',
                    'error' => 'Non autorisé'], 401);
            }

            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;

            return response()->json([
                'message' => 'Bienvenue ' . Auth::user()->name . ' !',
                'user' => new UserResource(auth()->user()),
                'token' => $token,
                'valid' => auth()->check()], 200);
        }catch (\Throwable $e){
            report($e);
            return response()->json([
                'message' => 'Une erreur est survenue !',
                ], 500);

        }
    }

}
