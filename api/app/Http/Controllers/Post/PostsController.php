<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;


class PostsController extends Controller
{
    /**
     * Show posts list.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $posts = DB::table('posts')->get();
            return response()->json(['data' => $posts], 200);
        }catch(Throwable $e){
            report($e);
            return response()->json([
                'message' => 'Une erreur est survenue lors de la récupération des annonces.',
            ], 500);
        }
    }

}
