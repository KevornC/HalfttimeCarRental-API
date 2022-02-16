<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 
use App\Models\member;
use Hash;
class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
        for($i = 1 ; $i <= 10 ; $i++){
            member::create([
                'fname' =>  $faker->firstName,
                'lname' =>  $faker->lastName,
                'gender' =>  $gender,
                'address' =>  $faker->streetAddress,
                'country' =>  $faker->country,
                'photo' => $faker->imageUrl($width = 200, $height = 200),
                'trn' =>  $faker->randomDigit,
                'phone' =>  $faker->phoneNumber,
                'email' =>  $faker->safeEmail,
                'password' => hash::make('password'), // password
           
            ]);
        }
    }
}
