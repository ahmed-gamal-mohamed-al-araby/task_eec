<?php

use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
       $product = \App\Models\Product::inRandomOrder()->pluck('id')->first();
        for ($i = 0; $i < 5; $i++) {
           \App\Models\Shipment::create([
                'address' => $faker->address,
                'products' => ["$product"],
                'description' => $faker->text,
                'shipment_number' => $faker->unique()->word,
                'status' => 'delivered',
                'courier_id' => \App\Models\Courier::inRandomOrder()->pluck('id')->first()
            ]);
        }
        for ($i = 0; $i < 4; $i++) {
            \App\Models\Shipment::create([
                'address' => $faker->address,
                'products' => ["$product"],
                'description' => $faker->text,
                'shipment_number' => $faker->unique()->word,
                'status' => 'out for delivery',
                'courier_id' => \App\Models\Courier::inRandomOrder()->pluck('id')->first()
            ]);
        }
        for ($i = 0; $i < 3; $i++) {
            \App\Models\Shipment::create([
                'address' => $faker->address,
                'products' => ["$product"],
                'description' => $faker->text,
                'shipment_number' => $faker->unique()->word,
                'status' => 'pending',
                'courier_id' => \App\Models\Courier::inRandomOrder()->pluck('id')->first()
            ]);
        }
    }
}
