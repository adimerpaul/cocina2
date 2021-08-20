<?php

namespace Database\Seeders;

use App\Http\Controllers\DeliveryController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        \App\Models\Product::factory(10)->create();
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            DeliverySeeder::class
//            SaleSeeder::class
        ]);
    }
}
