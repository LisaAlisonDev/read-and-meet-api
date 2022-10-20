<?php
namespace App\Http\Helpers;

use App\Models\UserProfile;

class UserProfileHelper {


    public function initializedFromUser(int $id): bool
    {
        try {
          $profile =  UserProfile::create([
                'user_id' => $id,
                'description' => "",
                'favourite_book' => "",
                'visibility' => 0,
            ]);
          $profile->save();
            return true;
        }catch(\Error){
            return false;
        }

    }
}
