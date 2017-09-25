<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhuhuynhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lv17_phuhuynh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenPH');
            $table->integer('sdt');
            $table->string('diachi');
            $table->string('mkdangnhap');
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
        Schema::dropIfExists('lv17_phuhuynh');
    }
}
