<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        // vérifie le format de l'email
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return response()->json(['message' => 'Veuillez choisir une adresse email valide.', 'token' => null], 200);
        }

        $existingUser = User::where('email', '=', $request->email)->get();

        if (count($existingUser) == 1){
            return response()->json(['message' => 'Cette adresse email existe déjà.', 'token' => null], 200);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json([
            'message' => 'Bienvenue sur ReadAndMeet!',
            'token' => $token], 200);
    }

}
