<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5;$i++){
            DB::table('posts')->insert([
                'user_id' => 1,
                'title' => "Annonce n°" . $i,
                'description' => Str::random(100),
                'visibility' => 0,
            ]);

    }
    }
}
