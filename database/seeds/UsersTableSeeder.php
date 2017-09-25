<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('lv17_nhomquyen')->insert([
          [
              'tennhomquyen' =>'Admin',
              'created_at'   => new DateTime(),
          ],
        ]);
        DB::table('lv17_users')->insert([
          [
              'username'    =>'admin',
              'hoten'       =>'Superadmin',
              'gioitinh'    =>0,
              'diachi'      =>'180 Cao Lỗ',
              'email'       =>'admin@gmail.com',
              'sdt'         =>01203719484,
              'password'    => bcrypt('12345'),
              'nhomquyen_id'=>1,
              'trangthai'   =>0,
              'created_at'  => new DateTime(),
          ],
          
        ]);
    }
}
