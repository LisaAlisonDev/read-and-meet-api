<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;

class CreateProfileController extends Controller
{
    /**
     * Creation of user profile
     */
    public function store($id): \Illuminate\Http\JsonResponse
    {
        try {
            UserProfile::create([
                'avatar'=> "https://api.adorable.io/avatars/400/57842e83b9fcd9ae0d741cec40c47734.png",
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
