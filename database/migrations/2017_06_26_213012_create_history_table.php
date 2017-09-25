<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('lv17_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');

            $table->datetime('taobangdiem')->nullable();
            $table->datetime('suabangdiem')->nullable();
            $table->datetime('xoabangdiem')->nullable();
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
        //
    }
}
