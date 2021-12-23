<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User2 extends Migration
{
    /**
     * Run the migrationsss.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('description')->nullable();
            $table->string('cel')->nullable();
            ;
            $table->string('estate')->nullable();
            ;
            $table->string('bairro')->nullable();
            ;
            $table->string('curriculum')->nullable();
            ;
            $table->integer('numeroProjetos')->nullable();
            ;
            $table->integer('anosExperiencia')->nullable();
            ;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
