<?php

use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Courier::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'password' => bcrypt(123456),
            ]);
        }
    }
}
