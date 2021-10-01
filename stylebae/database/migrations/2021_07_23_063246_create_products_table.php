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
            $table->id();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_hin')->nullable();
            $table->string('product_slug_en');
            $table->string('product_slug_hin');
            $table->string('short_desc_en')->nullable();
            $table->string('short_desc_hin')->nullable();
            $table->string('long_desc_en');
            $table->string('long_desc_hin')->nullable();
            $table->string('product_mainImg');
            $table->string('product_address');
            $table->string('phone');
            $table->string('opening_time');
            $table->string('closing_time');
            $table->string('user')->nullable();
            $table->string('city')->nullable();
            $table->string('city_slug')->nullable();
            $table->integer('status')->default(0);
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
