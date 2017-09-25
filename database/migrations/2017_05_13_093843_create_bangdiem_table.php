<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangdiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lv17_bangdiem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hocsinh_id')->unsigned();
            $table->foreign('hocsinh_id')->references('id')->on('lv17_hocsinh')->onDelete('cascade');
            $table->string('tenhocsinh');
            $table->integer('monhoc_id')->unsigned();
            $table->foreign('monhoc_id')->references('id')->on('lv17_monhoc')->onDelete('cascade');
            $table->double('mieng1',8,1)->nullable();
            $table->double('mieng2',8,1)->nullable();
            $table->double('mieng3',8,1)->nullable();
            $table->double('mieng4',8,1)->nullable();
            $table->double('d15phut1',8,1)->nullable();
            $table->double('d15phut2',8,1)->nullable();
            $table->double('d15phut3',8,1)->nullable();
            $table->double('d15phut4',8,1)->nullable();
            $table->double('d1tiet1',8,1)->nullable();
            $table->double('d1tiet2',8,1)->nullable();
            $table->double('d1tiet3',8,1)->nullable();
            $table->double('diemthiHK',8,1)->nullable();
            $table->double('diemTBHK',8,1)->nullable();
            $table->integer('hocky_id')->unsigned();
            $table->foreign('hocky_id')->references('id')->on('lv17_hocky')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lv17_bangdiem');
    }
}
