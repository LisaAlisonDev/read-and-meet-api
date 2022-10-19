<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!auth()->attempt($data)) {
            return response()->json(['message' => 'Veullez entrez un identifiant valide.', 'error' => 'Non autorisé'], 401);
        }

        $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;

        return response()->json([
            'message' => 'Bienvenue ' . Auth::user()->name . ' !',
            'user' => auth()->user(),
            'token' => $token,
            'valid' => auth()->check()], 200);
    }

}
