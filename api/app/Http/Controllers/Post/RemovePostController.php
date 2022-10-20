<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RemovePostController extends Controller
{
    /**
     * Remove a post
     */
    public function remove (Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            DB::table('posts')
                ->where('id', $id)
                ->delete();

            return response()->json([
                'message' => 'Annonce supprimé avec succès!',
                'data' => []], 200);
        }catch(\Error){
            return response()->json([
                'message' => 'Une erreur est survenue lors de la suppression de votre annonce!',
                'token' => null], 500);

        }
    }

}
