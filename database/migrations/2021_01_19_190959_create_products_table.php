<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('ram_id');
            $table->unsignedBigInteger('memory_id');
            $table->unsignedBigInteger('display_id');
            $table->unsignedBigInteger('battery_id');
            $table->unsignedBigInteger('operating_system_id');
            $table->text('publicIdCloudinary');
            $table->text('name');
            $table->unsignedBigInteger('quantity');
            $table->text('link_thumbnail');
            $table->longText('content_post');
            $table->double('cost', 20, 1);
            $table->double('old_cost', 20, 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
