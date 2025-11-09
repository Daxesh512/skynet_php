<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->integer('language_id')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->text('about_meta_key')->nullable();
            $table->text('service_meta_key')->nullable();
            $table->text('portfolio_meta_key')->nullable();
            $table->text('package_meta_key')->nullable();
            $table->text('team_meta_key')->nullable();
            $table->text('faq_meta_key')->nullable();
            $table->text('gallery_meta_key')->nullable();
            $table->text('career_meta_key')->nullable();
            $table->text('blog_meta_key')->nullable();
            $table->text('product_meta_key')->nullable();
            $table->text('contact_meta_key')->nullable();
            $table->text('quot_meta_key')->nullable();


            $table->text('about_meta_desc')->nullable();
            $table->text('service_meta_desc')->nullable();
            $table->text('portfolio_meta_desc')->nullable();
            $table->text('package_meta_desc')->nullable();
            $table->text('team_meta_desc')->nullable();
            $table->text('faq_meta_desc')->nullable();
            $table->text('gallery_meta_desc')->nullable();
            $table->text('career_meta_desc')->nullable();
            $table->text('blog_meta_desc')->nullable();
            $table->text('product_meta_desc')->nullable();
            $table->text('contact_meta_desc')->nullable();
            $table->text('quot_meta_desc')->nullable();
            
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
        Schema::dropIfExists('seos');
    }
}
