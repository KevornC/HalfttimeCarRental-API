<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 
use App\Models\vehicle;
class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1 ; $i <= 10 ; $i++){
            vehicle::create([
                // 'image' => $faker->imageUrl($width = 200, $height = 200),
                'image' => 'BugattiChironred.png',
                'name' => $faker->name,
                'model' => $faker->text($maxNbChars = 10),
                'rentalCost' => $faker->numberBetween($min = 1000, $max = 9000),
                'quantity' => $faker->randomDigitNotNull,
                'color' => $faker->randomElement($array = array ('white','black','red','yellow','silver')),
                'seatingCap' => $faker->randomDigit,
                'driverType' => $faker->randomElement($array = array ('righthand','lefthand')),
                
            ]);
        }
    }
}
