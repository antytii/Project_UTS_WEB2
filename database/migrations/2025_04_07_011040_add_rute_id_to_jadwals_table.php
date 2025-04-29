<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jadwals', function (Blueprint $table) {
            // Cek dulu apakah kolom belum ada
            if (!Schema::hasColumn('jadwals', 'rute_id')) {
                $table->foreignId('rute_id')->constrained()->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('jadwals', function (Blueprint $table) {
            if (Schema::hasColumn('jadwals', 'rute_id')) {
                $table->dropForeign(['rute_id']);
                $table->dropColumn('rute_id');
            }
        });
    }
};
