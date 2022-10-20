<?php
namespace App\Http\Helpers;

use App\Models\User;

class UserHelper {

    public function checkValidEmail($email) : bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public function checkDuplicateEmail($email)
    {
        $existingUser = User::where('email', '=', $email)->get();

        if (count($existingUser) == 1){
            return true;
        }

        return false;
    }
}
