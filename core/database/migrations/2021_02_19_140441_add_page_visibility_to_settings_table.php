<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPageVisibilityToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->tinyInteger('is_t1_slider_section')->default(1);
            $table->tinyInteger('is_t1_who_we_are_section')->default(1);
            $table->tinyInteger('is_t1_intro_video_section')->default(1);
            $table->tinyInteger('is_t1_service_section')->default(1);
            $table->tinyInteger('is_t1_why_choose_us_section')->default(1);
            $table->tinyInteger('is_t1_portfolio_section')->default(1);
            $table->tinyInteger('is_t1_testimonial_section')->default(1);
            $table->tinyInteger('is_t1_team_section')->default(1);
            $table->tinyInteger('is_t1_contact_section')->default(1);
            $table->tinyInteger('is_t1_faq_counter_section')->default(1);
            $table->tinyInteger('is_t1_meet_us_section')->default(1);
            $table->tinyInteger('is_t1_blog_section')->default(1);
            $table->tinyInteger('is_t1_clint_section')->default(1);

            $table->tinyInteger('is_t2_hero_section')->default(1);
            $table->tinyInteger('is_t2_about_section')->default(1);
            $table->tinyInteger('is_t2_service_section')->default(1);
            $table->tinyInteger('is_t2_intro_video_section')->default(1);
            $table->tinyInteger('is_t2_team_section')->default(1);
            $table->tinyInteger('is_t2_counter_section')->default(1);
            $table->tinyInteger('is_t2_testimonial_section')->default(1);
            $table->tinyInteger('is_t2_contact_section')->default(1);
            $table->tinyInteger('is_t2_faq_section')->default(1);
            $table->tinyInteger('is_t2_quote_section')->default(1);
            $table->tinyInteger('is_t2_news_section')->default(1);
            $table->tinyInteger('is_t2_client_section')->default(1);


            $table->tinyInteger('is_t3_hero_section')->default(1);
            $table->tinyInteger('is_t3_service_section')->default(1);
            $table->tinyInteger('is_t3_portfolio_section')->default(1);
            $table->tinyInteger('is_t3_testimonial_section')->default(1);
            $table->tinyInteger('is_t3_faq_section')->default(1);
            $table->tinyInteger('is_t3_team_section')->default(1);
            $table->tinyInteger('is_t3_meet_us_section')->default(1);
            $table->tinyInteger('is_t3_news_section')->default(1);
            $table->tinyInteger('is_t3_client_section')->default(1);
            
            $table->tinyInteger('is_t4_hero_section')->default(1);
            $table->tinyInteger('is_t4_client_section')->default(1);
            $table->tinyInteger('is_t4_about_section')->default(1);
            $table->tinyInteger('is_t4_feature_section')->default(1);
            $table->tinyInteger('is_t4_who_we_are_section')->default(1);
            $table->tinyInteger('is_t4_intro_video_section')->default(1);
            $table->tinyInteger('is_t4_portfolio_section')->default(1);
            $table->tinyInteger('is_t4_counter_section')->default(1);
            $table->tinyInteger('is_t4_testmonial_section')->default(1);
            $table->tinyInteger('is_t4_faq_section')->default(1);
            $table->tinyInteger('is_t4_contact_section')->default(1);

            $table->tinyInteger('about_page')->default(1);
            $table->tinyInteger('service_page')->default(1);
            $table->tinyInteger('poerfolio_page')->default(1);
            $table->tinyInteger('package_page')->default(1);
            $table->tinyInteger('team_page')->default(1);
            $table->tinyInteger('faq_page')->default(1);
            $table->tinyInteger('blog_page')->default(1);
            $table->tinyInteger('contact_page')->default(1);
            $table->tinyInteger('quote_page')->default(1);
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
                'is_t1_slider_section',
                'is_t1_who_we_are_section',
                'is_t1_intro_video_section',
                'is_t1_service_section',
                'is_t1_why_choose_us_section',
                'is_t1_portfolio_section',
                'is_t1_testimonial_section',
                'is_t1_team_section',
                'is_t1_contact_section',
                'is_t1_faq_counter_section',
                'is_t1_meet_us_section',
                'is_t1_blog_section',
                'is_t1_clint_section',
                'is_t2_hero_section',
                'is_t2_about_section',
                'is_t2_service_section',
                'is_t2_intro_video_section',
                'is_t2_team_section',
                'is_t2_counter_section',
                'is_t2_testimonial_section',
                'is_t2_contact_section',
                'is_t2_faq_section',
                'is_t2_quote_section',
                'is_t2_news_section',
                'is_t2_client_section',
                'is_t3_hero_section',
                'is_t3_service_section',
                'is_t3_portfolio_section',
                'is_t3_testimonial_section',
                'is_t3_faq_section',
                'is_t3_team_section',
                'is_t3_meet_us_section',
                'is_t3_news_section',
                'is_t3_client_section',
                'is_t4_hero_section',
                'is_t4_client_section',
                'is_t4_about_section',
                'is_t4_feature_section',
                'is_t4_who_we_are_section',
                'is_t4_intro_video_section',
                'is_t4_portfolio_section',
                'is_t4_counter_section',
                'is_t4_testmonial_section',
                'is_t4_faq_section',
                'is_t4_contact_section',
                'about_page',
                'service_page',
                'poerfolio_page',
                'package_page',
                'team_page',
                'faq_page',
                'blog_page',
                'contact_page',
                'quote_page',

            );
        });
    }
}
