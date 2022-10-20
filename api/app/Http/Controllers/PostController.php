<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Registration
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $post = Post::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'description' => $request->description,
                'visibility' => $request->visibility,
            ]);

            return response()->json([
                'message' => 'Annonce crée avec succès!',
                'data' => $post], 200);
        }catch(\Error){
            return response()->json([
                'message' => 'Une erreur est survenue lors de la création de votre annonce!',
                'token' => null], 500);

        }
    }

    /**
     * Show a list of all of posts users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $posts = DB::table('posts')->get();
            return response()->json(['data' => $posts], 200);
        }catch(\Error){
            return response()->json([
                'message' => 'Une erreur est survenue lors de la récupération des annonces.',
                ], 500);
        }
    }

    /**
     * Registration
     */
    public function update (Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $post = DB::table('posts')
                ->where('id', $id)
                ->update([
                    'user_id' => Auth::id(),
                    'title' => $request->title,
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
