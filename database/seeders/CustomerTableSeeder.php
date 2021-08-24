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
            'point_id' => 1,
            'name' => '太郎',
            'tel' => '11122223333',
            'address' => '彦根市長曽根南町494-25',
            'copy' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('customers')->insert([
            'point_id' => null,
            'name' => '次郎',
            'tel' => '44455556666',
            'address' => '彦根市馬場1-1-1',
            'copy' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('customers')->insert([
            'point_id' => 1,
            'name' => '花子',
            'tel' => '77788889999',
            'address' => '彦根市野村町野村23-311',
            'copy' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('customers')->insert([
            'point_id' => null,
            'name' => '梅子',
            'tel' => '12345678901',
            'address' => '彦根市泉町543-44',
            'copy' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
