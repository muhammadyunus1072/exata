<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     // Add Keterangan to Histories
    //     Schema::table('alur_pencairan_details', function (Blueprint $table) {
    //         $table->string('mata_uang')->nullable();
    //     });
    //     Schema::table('_history_alur_pencairan_details', function (Blueprint $table) {
    //         $table->string('mata_uang')->nullable();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::table('alur_pencairan_details', function (Blueprint $table) {
    //         $table->dropColumn('mata_uang');
    //     });
    //     Schema::table('_history_alur_pencairan_details', function (Blueprint $table) {
    //         $table->dropColumn('mata_uang');
    //     });
    // }
};
