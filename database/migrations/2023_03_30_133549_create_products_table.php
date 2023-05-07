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
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('description');
            $table->string('short_description')->nullable();

            $table->decimal('price' , 18 , 4 )->unsigned();
            $table->decimal('selling_price' , 18 , 4 )->unsigned()->nullable();
            $table->decimal('special_price' , 18 , 4 )->unsigned()->nullable();

            $table->string('special_price_type')->nullable();
            $table->date('special_price_start')->nullable();
            $table->date('special_price_end')->nullable();
            $table->string('sku')->nullable();
            $table->boolean('manage_stock');
            $table->boolean('in_stock');
            $table->boolean('is_active');
            $table->integer('viewed')->unsigned()->default(0);

            $table->integer('qty')->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->softDeletes();



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
