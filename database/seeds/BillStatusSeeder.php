<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_statuses')->insert(['status' => 'Waiting confirm']);
        DB::table('bill_statuses')->insert(['status' => 'Confirmed paid']);
        DB::table('bill_statuses')->insert(['status' => 'Processing to deliver']);
        DB::table('bill_statuses')->insert(['status' => 'Delivered']);
        DB::table('bill_statuses')->insert(['status' => 'Canceled']);
    }
}
