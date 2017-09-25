<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTongketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lv17_tongket', function (Blueprint $table) {
            $table->increments('id');
            $table->double('diemTB',8,1);
            $table->boolean('trangthai')->default(0);
            $table->string('ghichu')->nullable();
            $table->integer('hocsinh_id')->unsigned();
            $table->foreign('hocsinh_id')->references('id')->on('lv17_hocsinh')->onDelete('cascade');
            $table->integer('hanhkiem_id')->unsigned();
            $table->foreign('hanhkiem_id')->references('id')->on('lv17_hanhkiem')->onDelete('cascade');
            $table->string('hocluc');
            $table->integer('songaynghi');
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
        Schema::dropIfExists('lv17_tongket');
    }
}
