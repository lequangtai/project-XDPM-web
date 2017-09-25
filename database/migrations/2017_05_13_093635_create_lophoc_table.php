<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLophocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lv17_lophoc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenlop');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('lv17_users')->onDelete('cascade');
            $table->integer('namhoc_id')->unsigned();
            $table->foreign('namhoc_id')->references('id')->on('lv17_namhoc')->onDelete('cascade');
            $table->integer('khoilop_id')->unsigned();
            $table->foreign('khoilop_id')->references('id')->on('lv17_khoilop')->onDelete('cascade');
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
        Schema::dropIfExists('lv17_lophoc');
    }
}
