<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rams')->insert(['size' => '2GB']);
        DB::table('rams')->insert(['size' => '4GB']);
        DB::table('rams')->insert(['size' => '6GB']);
        DB::table('rams')->insert(['size' => '8GB']);
        DB::table('rams')->insert(['size' => '12GB']);
        DB::table('rams')->insert(['size' => '16GB']);
    }
}
