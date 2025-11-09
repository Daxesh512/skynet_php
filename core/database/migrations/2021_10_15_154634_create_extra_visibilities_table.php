<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraVisibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('extra_visibilities', function (Blueprint $table) {
            $table->id();
            
            $table->tinyInteger('is_t7_slider_section')->default(1);
            $table->tinyInteger('is_t7_video_section')->default(1);
            $table->tinyInteger('is_t7_service_section')->default(1);
            $table->tinyInteger('is_t7_portfolio_section')->default(1);
            $table->tinyInteger('is_t7_team_section')->default(1);
            $table->tinyInteger('is_t7_testimonial_section')->default(1);
            $table->tinyInteger('is_t7_callaction_section')->default(1);
            $table->tinyInteger('is_t7_blog_section')->default(1);
            $table->tinyInteger('is_t7_brand_section')->default(1);


            $table->tinyInteger('is_t8_hero_section')->default(1);
            $table->tinyInteger('is_t8_about_section')->default(1);
            $table->tinyInteger('is_t8_video_section')->default(1);
            $table->tinyInteger('is_t8_service_section')->default(1);
            $table->tinyInteger('is_t8_callaction_section')->default(1);
            $table->tinyInteger('is_t8_portfolio_section')->default(1);
            $table->tinyInteger('is_t8_testimonial_section')->default(1);
            $table->tinyInteger('is_t8_team_section')->default(1);
            $table->tinyInteger('is_t8_blog_section')->default(1);
            $table->tinyInteger('is_t8_brand_section')->default(1);


            $table->tinyInteger('is_t9_slider_section')->default(1);
            $table->tinyInteger('is_t9_banner_section')->default(1);
            $table->tinyInteger('is_t9_popularcategory_section')->default(1);
            $table->tinyInteger('is_t9_newproduct_section')->default(1);
            $table->tinyInteger('is_t9_featureproduct_section')->default(1);

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
        Schema::dropIfExists('extra_visibilities');
    }
}
