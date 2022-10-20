<?php
namespace App\Http\Helpers;

use App\Http\Controllers\User\UserProfileController;
use App\Models\User;

class UserHelper {


    public function checkDuplicateEmail($email)
    {
        $existingUser = User::where('email', '=', $email)->get();

        if (count($existingUser) == 1){
            return true;
        }

        return false;
    }
}
