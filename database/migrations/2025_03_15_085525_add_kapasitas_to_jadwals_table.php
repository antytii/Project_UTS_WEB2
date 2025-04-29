<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->integer('kapasitas')->after('tujuan');
        });
    }

    public function down()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->dropColumn('kapasitas');
        });
    }
};
