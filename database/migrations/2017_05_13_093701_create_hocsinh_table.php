<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocsinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lv17_hocsinh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahocsinh');
            $table->string('hoten');
            $table->date('ngaysinh');
            $table->boolean('gioitinh')->default(0);
            $table->string('diachi');
            $table->string('dantoc');
            $table->string('tongiao');
            $table->boolean('trangthai')->default(0);
            $table->string('mkdangnhap');
            $table->integer('phuhuynh_id')->unsigned();
            $table->foreign('phuhuynh_id')->references('id')->on('lv17_phuhuynh')->onDelete('cascade');
            $table->integer('lophoc_id')->unsigned();
            $table->foreign('lophoc_id')->references('id')->on('lv17_lophoc')->onDelete('cascade');
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
        Schema::dropIfExists('lv17_hocsinh');
    }
}
