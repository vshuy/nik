<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisplaySizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('display_sizes')->insert(['size' => '4.0"']);
        DB::table('display_sizes')->insert(['size' => '4.5"']);
        DB::table('display_sizes')->insert(['size' => '4.7"']);
        DB::table('display_sizes')->insert(['size' => '5.0"']);
        DB::table('display_sizes')->insert(['size' => '5.2"']);
        DB::table('display_sizes')->insert(['size' => '5.7"']);
        DB::table('display_sizes')->insert(['size' => '6.0"']);
        DB::table('display_sizes')->insert(['size' => '6.2"']);
        DB::table('display_sizes')->insert(['size' => '6.7"']);
        DB::table('display_sizes')->insert(['size' => '6.8"']);
    }
}
