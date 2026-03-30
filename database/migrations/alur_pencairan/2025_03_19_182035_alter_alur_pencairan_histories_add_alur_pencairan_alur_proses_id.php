<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('alur_pencairan_histories', function (Blueprint $table) {
            $table->bigInteger('alur_pencairan_alur_proses_id');
        });
        Schema::table('_history_alur_pencairan_histories', function (Blueprint $table) {
            $table->bigInteger('alur_pencairan_alur_proses_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alur_pencairan_histories', function (Blueprint $table) {
            $table->dropColumn('alur_pencairan_alur_proses_id');
        });
        Schema::table('_history_alur_pencairan_histories', function (Blueprint $table) {
            $table->dropColumn('alur_pencairan_alur_proses_id');
        });
    }
};
