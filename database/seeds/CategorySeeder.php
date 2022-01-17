<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['type_product' => 'SMARTPHONE', 'descripe' => 'none']);
        DB::table('categories')->insert(['type_product' => 'TABLET', 'descripe' => 'none']);
        DB::table('categories')->insert(['type_product' => 'LAPTOP', 'descripe' => 'none']);
    }
}
