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
        Schema::table('alur_pencairan_details', function (Blueprint $table) {
            $table->string('status');
            $table->string('rekening_terbaru')->nullable();
            $table->bigInteger("rekening_terbaru_updated_by")->unsigned()->nullable();
            $table->dateTime("rekening_terbaru_updated_at")->nullable();
            $table->date('tanggal_transfer')->nullable();
            $table->bigInteger("tanggal_transfer_updated_by")->unsigned()->nullable();
            $table->dateTime("tanggal_transfer_updated_at")->nullable();
        });
        Schema::table('_history_alur_pencairan_details', function (Blueprint $table) {
            $table->string('status');
            $table->string('rekening_terbaru')->nullable();
            $table->bigInteger("rekening_terbaru_updated_by")->unsigned()->nullable();
            $table->dateTime("rekening_terbaru_updated_at")->nullable();
            $table->date('tanggal_transfer')->nullable();
            $table->bigInteger("tanggal_transfer_updated_by")->unsigned()->nullable();
            $table->dateTime("tanggal_transfer_updated_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alur_pencairan_details', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('rekening_terbaru');
            $table->dropColumn('rekening_terbaru_updated_by');
            $table->dropColumn('rekening_terbaru_updated_at');
            $table->dropColumn('tanggal_transfer');
            $table->dropColumn('tanggal_transfer_updated_by');
            $table->dropColumn('tanggal_transfer_updated_at');
        });
        Schema::table('_history_alur_pencairan_details', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('rekening_terbaru');
            $table->dropColumn('rekening_terbaru_updated_by');
            $table->dropColumn('rekening_terbaru_updated_at');
            $table->dropColumn('tanggal_transfer');
            $table->dropColumn('tanggal_transfer_updated_by');
            $table->dropColumn('tanggal_transfer_updated_at');
        });
    }
};
