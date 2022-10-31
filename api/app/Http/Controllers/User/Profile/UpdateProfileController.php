<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
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
             DB::table('user_profiles')
                ->where('id', $id)
                ->update([
                    'user_id' => Auth::id(),
                    'avatar'  => $request->avatar,
                    'favourite_book' => "",
                    'description' => $request->description,
                    'visibility' => $request->visibility,
                ]);

            $profile = DB::table('user_profiles')
                ->where('id', $id)->get();

            return response()->json([
                'message' => 'Annonce mise à jour avec succès!',
                'data' => $profile], 200);
        } catch (\Error) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour de votre annonce!',
                'token' => null], 500);

        }

    }

}
