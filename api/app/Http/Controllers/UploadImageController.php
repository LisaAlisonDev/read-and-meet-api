<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\Picture\CreateProfilePictureController;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;

class UploadImageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $id, CreateProfilePictureController $createPicture ): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), ['image' => ['required', File::image()->max(2 * 1024)]]);

        if ($validator->fails()) {return response()->json(['message'=> $validator->messages()]);}

        $file = $request->file('image');
        $filename = uniqid() . "_." . $file->getClientOriginalName();
        $file->move(public_path('public/images'), $filename);
        $url = URL::to('/') . '/public/images/' . $filename;

        $createPicture->store($id,  $file->getClientOriginalName(), $url);

        return response()->json([
            'message' => 'Bienvenue sur ReadAndMeet!',
            'file' => $url
        ], 200);
    }

}
