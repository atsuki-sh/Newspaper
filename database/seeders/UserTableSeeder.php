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
            'name' => 'atsuki',
            'admin' => false,
            'password' => bcrypt('bluegreen'),
            'email' => 'blue@example.com',
            'phone' => '08063730453',
            'updated_by' => 'atsuki',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'shinoto',
            'admin' => false,
            'email' => 'green@example.com',
            'phone' => '08011112222',
            'updated_by' => 'shinoto',
            'password' => bcrypt('greenblue'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
