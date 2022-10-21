<?php

namespace App\Http\Controllers\User\Picture;

use App\Http\Controllers\Controller;
use App\Models\ProfilePicture;
use Illuminate\Http\Request;
use Throwable;

class CreateProfilePictureController extends Controller
{
    /**
     * Creation of user picture profile
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $picture = ProfilePicture::create([
                'profile_id' => $request->profileId,
                'name' => $request->name,
                'filepath' => $request->filepath,
            ]);

            return response()->json([
                'message' => 'Image ajouté avec succès!',
                'data' => $picture], 200);
        }catch(Throwable $e){
            report($e);
            return response()->json([
                'message' => 'Une erreur est survenue lors de l\'ajout de votre image!',
                'token' => null], 500);

        }

    }

}
