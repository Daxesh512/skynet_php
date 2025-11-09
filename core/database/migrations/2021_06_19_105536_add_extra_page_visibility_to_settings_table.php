<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraPageVisibilityToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->tinyInteger('is_t5_slider_section')->default(1);
            $table->tinyInteger('is_t5_about_section')->default(1);
            $table->tinyInteger('is_t5_who_er_are_section')->default(1);
            $table->tinyInteger('is_t5_service_section')->default(1);
            $table->tinyInteger('is_t5_project_section')->default(1);
            $table->tinyInteger('is_t5_team_section')->default(1);
            $table->tinyInteger('is_t5_counter_section')->default(1);
            $table->tinyInteger('is_t5_testimonial_section')->default(1);
            $table->tinyInteger('is_t5_meetus_section')->default(1);
            $table->tinyInteger('is_t5_blog_section')->default(1);
            $table->tinyInteger('is_t5_client_section')->default(1);

            $table->tinyInteger('is_t6_slider_section')->default(1);
            $table->tinyInteger('is_t6_client_section')->default(1);
            $table->tinyInteger('is_t6_who_we_are_section')->default(1);
            $table->tinyInteger('is_t6_service_section')->default(1);
            $table->tinyInteger('is_t6_project_section')->default(1);
            $table->tinyInteger('is_t6_team_section')->default(1);
            $table->tinyInteger('is_t6_testimonial_section')->default(1);
            $table->tinyInteger('is_t6_faq_counter_section')->default(1);
            $table->tinyInteger('is_t6_meetus_section')->default(1);
            $table->tinyInteger('is_t6_blog_section')->default(1);
            $table->tinyInteger('is_t6_map_section')->default(1);

            $table->tinyInteger('is_shop')->default(1);
            $table->tinyInteger('is_user_system')->default(1);

            $table->string('hero_slider_overlay_color')->nullable();
            $table->string('hero_slider_overlay_color_opacity')->default(1);
            $table->string('is_shop_share_links')->default(1);
          
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
                'is_t5_slider_section',
                'is_t5_about_section',
                'is_t5_who_er_are_section',
                'is_t5_service_section',
                'is_t5_project_section',
                'is_t5_team_section',
                'is_t5_counter_section',
                'is_t5_testimonial_section',
                'is_t5_meetus_section',
                'is_t5_blog_section',
                'is_t5_client_section',
                'is_t6_slider_section',
                'is_t6_client_section',
                'is_t6_who_we_are_section',
                'is_t6_service_section',
                'is_t6_project_section',
                'is_t6_team_section',
                'is_t6_testimonial_section',
                'is_t6_faq_counter_section',
                'is_t6_meetus_section',
                'is_t6_blog_section',
                'is_t6_map_section',
                'hero_slider_overlay_color',
                'is_shop',
                'is_user_system',
                'is_shop_share_links',
                'hero_slider_overlay_color_opacity'
            );
        });
    }
}
