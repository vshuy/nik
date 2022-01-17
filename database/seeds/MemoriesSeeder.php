<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memories')->insert(['size' => '8GB']);
        DB::table('memories')->insert(['size' => '16GB']);
        DB::table('memories')->insert(['size' => '32GB']);
        DB::table('memories')->insert(['size' => '64GB']);
        DB::table('memories')->insert(['size' => '128GB']);
        DB::table('memories')->insert(['size' => '256GB']);
        DB::table('memories')->insert(['size' => '512GB']);
    }
}
