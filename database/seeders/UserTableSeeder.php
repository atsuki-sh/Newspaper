<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'atsuki',
            'admin' => false,
            'password' => bcrypt('bluegreen'),
            'email' => 'blue@example.com',
            'phone' => '08063730453',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'shinoto',
            'admin' => false,
            'email' => 'green@example.com',
            'phone' => '08011112222',
            'password' => bcrypt('greenblue'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
