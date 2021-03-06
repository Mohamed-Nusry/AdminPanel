<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('category_id');
            $table->String('product_name');
            $table->String('main_category');
            $table->String('sub_category');
            $table->integer('quantity');
            $table->float('price');
            $table->String('short_description');
            $table->mediumText('long_description');
            $table->String('product_image');
            $table->mediumText('add_images');
            $table->timestamps();
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
