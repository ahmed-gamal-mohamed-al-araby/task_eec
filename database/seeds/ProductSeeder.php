<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
            \App\Models\Product::create([
                'name' => $faker->name,
                'image' => $faker->image(public_path('product_image'), "640" , "480" , null, false)
            ]);
        }
    }
}
