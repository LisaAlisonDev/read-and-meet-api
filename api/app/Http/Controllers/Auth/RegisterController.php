<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Profile\CreateProfileController;
use App\Http\Helpers\UserHelper;
use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /**
     * User Registration
     */
    public function register(Request $request, UserHelper $userHelper, CreateProfileController $createProfileController): \Illuminate\Http\JsonResponse
    {
        if (!$userHelper->checkValidEmail($request->email)){
            return response()->json(['message' => 'Veuillez choisir une adresse email valide.', 'token' => null], 200);
        }

        if ($userHelper->checkDuplicateEmail($request->email)){
            return response()->json(['message' => 'Cette adresse email existe déjà.', 'token' => null], 200);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $createProfileController->store($user->id);

            $token = $user->createToken('LaravelAuthApp')->accessToken;

            return response()->json([
                'message' => 'Bienvenue sur ReadAndMeet!',
                'token' => $token], 200);
        } catch (\Throwable $e) {
            report($e);
            return response()->json([
                'message' => 'Une erreur est survenue lors de la création de votre compte.',
                'token' => $token], 5200);
        }

    }

}
