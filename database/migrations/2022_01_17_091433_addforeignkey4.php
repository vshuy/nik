<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addforeignkey4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
            $table->foreign('ram_id')
                ->references('id')
                ->on('rams')
                ->onDelete('cascade');
            $table->foreign('memory_id')
                ->references('id')
                ->on('memories')
                ->onDelete('cascade');
            $table->foreign('display_id')
                ->references('id')
                ->on('display_sizes')
                ->onDelete('cascade');
            $table->foreign('battery_id')
                ->references('id')
                ->on('batteries')
                ->onDelete('cascade');
            $table->foreign('operating_system_id')
                ->references('id')
                ->on('operating_systems')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
