<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'id' => 1,
            'point_id' => 1,
            'name' => '太郎',
            'tel' => '11111111111',
            'copy' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('customers')->insert([
            'id' => 2,
            'point_id' => 2,
            'name' => '次郎',
            'tel' => '22222222222',
            'copy' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('customers')->insert([
            'id' => 3,
            'point_id' => 3,
            'name' => '花子',
            'tel' => '33333333333',
            'copy' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('customers')->insert([
            'id' => 4,
            'point_id' => 4,
            'name' => '梅子',
            'tel' => '44444444444',
            'copy' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
