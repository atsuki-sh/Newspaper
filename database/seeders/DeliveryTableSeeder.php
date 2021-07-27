<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Deliveries')->insert([
            'user_id' => 1,
            'route_id' => 1,
            'date' => '2021-07-27',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('Deliveries')->insert([
            'user_id' => 2,
            'route_id' => 2,
            'date' => '2021-07-17',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
