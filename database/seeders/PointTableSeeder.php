<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('points')->insert([
            'id' => 1,
            'delivery_route_id' => 1,
            'north_lat' => 100.00,
            'east_lon' => 200.00,
            'rank' => 1,
            'status' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('points')->insert([
            'id' => 2,
            'delivery_route_id' => 1,
            'north_lat' => 110.00,
            'east_lon' => 210.00,
            'rank' => 2,
            'status' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('points')->insert([
            'id' => 3,
            'delivery_route_id' => 2,
            'north_lat' => 120.00,
            'east_lon' => 220.00,
            'rank' => 3,
            'status' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('points')->insert([
            'id' => 4,
            'delivery_route_id' => 2,
            'north_lat' => 300.00,
            'east_lon' => 330.00,
            'rank' => 4,
            'status' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
