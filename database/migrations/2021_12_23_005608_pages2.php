<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class Pages2 extends Migration
{
    public function up()
    {
        Schema::create('pages', function ($table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('body');
            $table->text('slug');
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
        Schema::dropIfExists('page');
    }
}
