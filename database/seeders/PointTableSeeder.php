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
            'delivery_route_id' => null,
            'name' => 'エコラボ',
            'north_lat' => 100.00,
            'east_lon' => 200.00,
            'updated_by' => 'atsuki',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('points')->insert([
            'delivery_route_id' => null,
            'name' => 'ファーストハイツ',
            'north_lat' => 110.00,
            'east_lon' => 210.00,
            'updated_by' => 'shinoto',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('points')->insert([
            'delivery_route_id' => null,
            'name' => '滋賀大学',
            'north_lat' => 120.00,
            'east_lon' => 220.00,
            'updated_by' => 'atsuki',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('points')->insert([
            'delivery_route_id' => null,
            'name' => 'パリヤ',
            'north_lat' => 300.00,
            'east_lon' => 330.00,
            'updated_by' => 'shinoto',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
