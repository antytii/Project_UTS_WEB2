<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpeedboadIdToJadwalsTable extends Migration
{
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->unsignedBigInteger('speedboad_id')->nullable()->after('kapasitas');
            $table->foreign('speedboad_id')->references('id')->on('speedboads')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->dropForeign(['speedboad_id']);
            $table->dropColumn('speedboad_id');
        });
    }
}
