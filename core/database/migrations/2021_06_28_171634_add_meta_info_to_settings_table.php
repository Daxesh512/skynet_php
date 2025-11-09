<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaInfoToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(
                'about_meta_key',
                'service_meta_key',
                'portfolio_meta_key',
                'package_meta_key',
                'team_meta_key',
                'faq_meta_key',
                'gallery_meta_key',
                'career_meta_key',
                'blog_meta_key',
                'product_meta_key',
                'contact_meta_key',
                'quot_meta_key',
                'about_meta_desc',
                'service_meta_desc',
                'portfolio_meta_desc',
                'package_meta_desc',
                'team_meta_desc',
                'faq_meta_desc',
                'gallery_meta_desc',
                'career_meta_desc',
                'blog_meta_desc',
                'product_meta_desc',
                'contact_meta_desc',
                'quot_meta_desc'
            );
        });
    }
}
