<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhySelectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_selects', function (Blueprint $table) {
            $table->id();
            $table->string('language_id');
            $table->tinyInteger('status')->nullable();
            $table->string('title')->nullable();
            $table->string('icon')->nullable();
            $table->string('text')->nullable();
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
        Schema::dropIfExists('why_selects');
    }
}
