<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lv17_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('hoten');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('gioitinh')->default(0);
            $table->string('diachi');
            $table->string('sdt');
            $table->string('hinhanh')->nullable();
            $table->boolean('trangthai')->default(0);
            $table->integer('nhomquyen_id')->unsigned();//bắt buộc
            $table->foreign('nhomquyen_id')->references('id')->on('lv17_nhomquyen')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('lv17_users');
    }
}
