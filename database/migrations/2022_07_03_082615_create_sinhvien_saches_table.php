<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhvien_saches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MaSach');
            $table->string('MaSV');
            $table->datetime('NgayMuon');
            $table->datetime('NgayTra');
            $table->timestamps();
            $table->foreign('MaSach')->references('MaSach')->on('saches');
            $table->foreign('MaSV')->references('MaSV')->on('sinh_viens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinhvien_saches');
    }
};
