<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\UserProfile;
use Faker\Core\Number;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = "John Doe";
        $user->email = Str::random(10).'@gmail.com';
        $user->password = Hash::make('password');

        $user->save();

        DB::table('user_profiles')->insert([
            'user_id' => $user->id,
            'description' => Str::random(100),
            'favourite_book' => Str::random(10),
            'visibility' => 0,
        ]);
    }
}
