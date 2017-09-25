<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lv17_tintuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieude');
            $table->text('tomtat')->nullable();
            $table->text('noidung');
            $table->string('hinhanh');
            $table->string('duongdan');
            $table->integer('loaitin_id')->unsigned();//bắt buộc
            $table->foreign('loaitin_id')->references('id')->on('lv17_loaitin')->onDelete('cascade');
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
        Schema::dropIfExists('lv17_tintuc');
    }
}
