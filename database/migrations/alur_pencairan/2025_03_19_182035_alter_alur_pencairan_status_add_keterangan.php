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
        // Add Keterangan to Histories
        Schema::table('alur_pencairan_histories', function (Blueprint $table) {
            $table->text('keterangan')->nullable();
        });
        Schema::table('_history_alur_pencairan_histories', function (Blueprint $table) {
            $table->text('keterangan')->nullable();
        });

        // Add Keterangan to Status
        Schema::table('alur_pencairan_statuses', function (Blueprint $table) {
            $table->text('keterangan')->nullable();
        });
        Schema::table('_history_alur_pencairan_statuses', function (Blueprint $table) {
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alur_pencairan_histories', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
        Schema::table('_history_alur_pencairan_histories', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
        Schema::table('alur_pencairan_statuses', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
        Schema::table('_history_alur_pencairan_statuses', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
    }
};
