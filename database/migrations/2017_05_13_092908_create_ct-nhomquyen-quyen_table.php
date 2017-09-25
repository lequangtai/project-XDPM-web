<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtNhomquyenQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lv17_ct-nhomquyen-quyen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nhomquyen_id')->unsigned();
            $table->foreign('nhomquyen_id')->references('id')->on('lv17_nhomquyen')->onDelete('cascade');
            $table->integer('quyen_id')->unsigned();
            $table->foreign('quyen_id')->references('id')->on('lv17_quyen')->onDelete('cascade');
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
        Schema::dropIfExists('lv17_ct-nhomquyen-quyen');
    }
}
