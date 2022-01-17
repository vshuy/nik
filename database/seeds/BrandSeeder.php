<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert(['name' => 'SAMSUNG']);
        DB::table('brands')->insert(['name' => 'APPLE']);
        DB::table('brands')->insert(['name' => 'OPPO']);
        DB::table('brands')->insert(['name' => 'NOKIA']);
        DB::table('brands')->insert(['name' => 'VIVO']);
        DB::table('brands')->insert(['name' => 'XIAOMI']);
    }
}
