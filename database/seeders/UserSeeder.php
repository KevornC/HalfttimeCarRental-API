<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; //
use App\Models\User; //
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1 ; $i <= 5 ; $i++){
            User::create([
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'email' => $faker->email(),
                'password' => hash::make('password'), // password
                // 'remember_token' => Str::random(10),
         
            ]);
        }
    }
}
