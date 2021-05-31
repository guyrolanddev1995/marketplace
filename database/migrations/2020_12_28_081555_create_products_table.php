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
            $table->string('sku');
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('caracteristique')->nullable();
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('min_quantity')->nullable()->default('1');
            $table->integer('price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('featured')->default(0);
            $table->double('poids')->nullable();
            $table->integer('stock')->nullable()->default('1');
            $table->boolean('is_new')->nullable()->default(false);
            $table->text('product_image');
            $table->text('product_video')->nullable();
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
