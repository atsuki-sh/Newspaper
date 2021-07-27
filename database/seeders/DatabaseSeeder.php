<?php

namespace Database\Seeders;

use App\Models\Customer;
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
        $this->call([
            UserTableSeeder::class,
            DeliveryRouteTableSeeder::class,
            DeliveryTableSeeder::class,
            PointTableSeeder::class,
            DeliveryDetailTableSeeder::class,
            CustomerTableSeeder::class,
        ]);
    }
}
