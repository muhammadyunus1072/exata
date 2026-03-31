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
        Schema::create('alur_pencairan_details', function (Blueprint $table) {
            $this->scheme($table, false);
        });

        Schema::create('_history_alur_pencairan_details', function (Blueprint $table) {
            $this->scheme($table, true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('alur_pencairan_details');
        Schema::dropIfExists('_history_alur_pencairan_details');
    }

    private function scheme(Blueprint $table, $is_history = false)
    {
        $table->id();

        if ($is_history) {
            $table->bigInteger('obj_id')->unsigned();
        } else {
        }

        $table->bigInteger('alur_pencairan_id');
        $table->string('no_input_jepang');
        $table->string('nama_lengkap');
        $table->date('tanggal_lahir');
        $table->double('nominal_cair', 20, 2);

        $table->bigInteger("created_by")->unsigned()->nullable();
        $table->bigInteger("updated_by")->unsigned()->nullable();
        $table->bigInteger("deleted_by")->unsigned()->nullable()->default(null);
        $table->softDeletes();
        $table->timestamps();
    }
};
