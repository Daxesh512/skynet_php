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
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('language_id')->nullable();
            $table->double('current_price', 15, 8)->nullable();
            $table->double('previous_price', 15, 8)->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('category_id')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('attributes_title')->nullable();
            $table->longText('attributes_description')->nullable();
            $table->string('total_sold')->nullable();
            $table->string('tags')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->integer('is_downloadable')->nullable();
            $table->string('downloadable_file')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('meta_description')->nullable();
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
