<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeliveryRouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_routes')->insert([
            'id' => 1,
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('delivery_routes')->insert([
            'id' => 2,
            'user_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
