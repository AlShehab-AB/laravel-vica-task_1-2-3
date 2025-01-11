<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Post::factory(2)->create();
//        User::create([
//            'name' => 'admin',
//            'email' => 'admin@gmail.com',
//            'password' => Hash::make('password'),
//            'is_admin' => true
//        ]);
//        $this->call([
//            UsersTableSeeder::class,
//            PostsTableSeeder::class,

//        ]);
    }

}