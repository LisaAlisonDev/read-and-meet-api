<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CreatePostController extends Controller
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
        } catch (\Error) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la création de votre annonce!',
                'token' => null], 500);

        }
    }

}
