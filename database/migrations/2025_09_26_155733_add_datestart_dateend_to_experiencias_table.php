<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatestartDateendToExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiencias', function (Blueprint $table) {
            $table->date('datestart')->nullable()->after('place');
            $table->date('dateend')->nullable()->after('datestart');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiencias', function (Blueprint $table) {
            $table->dropColumn(['datestart', 'dateend']);
        });
    }
}
