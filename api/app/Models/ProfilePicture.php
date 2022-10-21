<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'name',
        'filepath',
        'visibility',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
}
