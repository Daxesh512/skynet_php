<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->integer('language_id')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->text('message')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('rating', 50)->nullable();
            $table->integer('serial_number')->default(0);
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
        Schema::dropIfExists('testimonials');
    }
}
