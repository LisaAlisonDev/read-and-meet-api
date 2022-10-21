<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UpdateProfileController extends Controller
{
    /**
     * Update an user profile
     */
    public function update (Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $post = DB::table('userProfiles')
                ->where('id', $id)
                ->update([
                    'user_id' => Auth::id(),
                    'favourite_book' => $request->title,
                    'description' => $request->description,
                    'visibility' => $request->visibility,
                ]);

            return response()->json([
                'message' => 'Annonce mise à jour avec succès!',
                'data' => $post], 200);
        } catch (\Error) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour de votre annonce!',
                'token' => null], 500);

        }

    }

}
