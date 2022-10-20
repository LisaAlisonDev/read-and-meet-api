<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Helpers\UserHelper;
use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request, UserHelper $userHelper, UserProfileController $userProfileController): \Illuminate\Http\JsonResponse
    {
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return response()->json(['message' => 'Veuillez choisir une adresse email valide.', 'token' => null], 200);
        }

        if ($userHelper->checkDuplicateEmail($request->email)){
            return response()->json(['message' => 'Cette adresse email existe déjà.', 'token' => null], 200);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $userProfileController->store($user->id);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json([
            'message' => 'Bienvenue sur ReadAndMeet!',
            'token' => $token], 200);
    }

}
