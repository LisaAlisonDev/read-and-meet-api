<?php

namespace App\Http\Controllers\User\Picture;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class ShowProfilePicturesController extends Controller
{
    /**
     * Show user pictures list.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $profileId)
    {
        try {
            $profilePictures = DB::table('profile_pictures')->where('profile_id', $profileId)->get();
            return response()->json(['data' => $profilePictures], 200);
        }catch(Throwable $e){

            report($e);
            return response()->json([
                $e,
                'message' => 'Une erreur est survenue lors de la récupération des annonces.',
            ], 500);
        }
    }

}
