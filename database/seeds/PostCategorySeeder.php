<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_categories')->insert(['name' => 'Product', 'describe' => 'None']);
        DB::table('post_categories')->insert(['name' => 'New technology', 'describe' => 'None']);
    }
}
