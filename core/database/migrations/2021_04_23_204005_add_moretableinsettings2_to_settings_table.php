<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoretableinsettings2ToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->tinyInteger('about_about')->default(1);
            $table->tinyInteger('about_w_w_a')->default(1);
            $table->tinyInteger('about_choose_us')->default(1);
            $table->tinyInteger('about_history')->default(1);
            $table->tinyInteger('is_video_hero')->default(1);
            $table->tinyInteger('is_whatsapp')->default(1);
            $table->tinyInteger('is_call_button')->default(1);

            $table->string('whatsapp')->nullable();
            $table->string('maintainance_image')->nullable();
            $table->text('hero_section_video_link')->nullable();

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
                'about_about',
                'about_w_w_a',
                'about_choose_us',
                'about_history',
                'is_video_hero',
                'is_whatsapp',
                'is_call_button',
                'whatsapp',
                'maintainance_image',
                'hero_section_video_link',
            );
        });
    }
}
