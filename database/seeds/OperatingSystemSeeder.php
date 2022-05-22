<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatingSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operating_systems')->insert(['name' => 'Android']);
        DB::table('operating_systems')->insert(['name' => 'IOS']);
    }
}
