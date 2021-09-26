<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addforeinkey2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function ($table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });
        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
        Schema::table('detail_bills', function (Blueprint $table) {
            $table->foreign('bill_id')
                ->references('id')
                ->on('bills');
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
