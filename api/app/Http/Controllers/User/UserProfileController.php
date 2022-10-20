<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    /**
     * Registration
     */
    public function store($id): \Illuminate\Http\JsonResponse
    {
        try {
            UserProfile::create([
                'user_id' => $id,
                'description' => "",
                'favourite_book' => "",
                'visibility' => 0,
            ]);

            return response()->json([
                'message' => 'Profil crée avec succès!',
                'token' => null], 200);
        }catch(\Error){

            return response()->json([
                'message' => 'Une erreur est survenue lors de la création de votre profile!',
                'token' => null], 200);

        }

    }

}
