<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BatterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('batteries')->insert(['size' => '1500mAh']);
        DB::table('batteries')->insert(['size' => '1800mAh']);
        DB::table('batteries')->insert(['size' => '2000mAh']);
        DB::table('batteries')->insert(['size' => '2400mAh']);
        DB::table('batteries')->insert(['size' => '2600mAh']);
        DB::table('batteries')->insert(['size' => '3000mAh']);
        DB::table('batteries')->insert(['size' => '3300mAh']);
        DB::table('batteries')->insert(['size' => '3600mAh']);
        DB::table('batteries')->insert(['size' => '4000mAh']);
        DB::table('batteries')->insert(['size' => '4100mAh']);
        DB::table('batteries')->insert(['size' => '5000mAh']);
        DB::table('batteries')->insert(['size' => '6000mAh']);
    }
}
