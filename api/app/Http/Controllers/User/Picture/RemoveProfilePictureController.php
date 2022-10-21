<?php

namespace App\Http\Controllers\User\Picture;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;


class RemoveProfilePictureController extends Controller
{
    /**
     * Remove a post
     */
    public function remove (Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $existingProfilePicture = DB::table('profile_pictures')
                ->where('id', $id)->get();

            if (!count($existingProfilePicture) == 1){
                return response()->json([
                    'message' => 'Cette image n\'existe pas ou a déja été supprimé.',
                    'data' => []], 200);
            }

            DB::table('profile_pictures')
                ->where('id', $id)
                ->delete();

            return response()->json([
                'message' => 'Image supprimé avec succès!',
                'data' => []], 200);
        }catch(Throwable $e){
            report($e);
            return response()->json([
                'message' => 'Une erreur est survenue lors de la suppression de votre image!',
                'token' => null], 500);

        }
    }

}
