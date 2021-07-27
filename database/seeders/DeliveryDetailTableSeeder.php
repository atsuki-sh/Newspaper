<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeliveryDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_details')->insert([
            'id' => 1,
            'delivery_id' => 1,
            'point_id' => 1,
            'delivered_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('delivery_details')->insert([
            'id' => 2,
            'delivery_id' => 1,
            'point_id' => 2,
            'delivered_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('delivery_details')->insert([
            'id' => 3,
            'delivery_id' => 2,
            'point_id' => 3,
            'delivered_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('delivery_details')->insert([
            'id' => 4,
            'delivery_id' => 2,
            'point_id' => 4,
            'delivered_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
