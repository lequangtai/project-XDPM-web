<?php

use Illuminate\Database\Seeder;

class QuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('lv17_quyen')->insert([
          [
              'tenquyen' =>'Quản lý điểm',
              'duongdan'=>str_slug('Quản lý điểm','-'),
              'id_cha'=>0,
              'created_at'   => new DateTime(),
          ],
          [
              'tenquyen' =>'Quản lý điểm',
              'duongdan'=>str_slug('Quản lý điểm','-'),
              'id_cha'=>0,
              'created_at'   => new DateTime(),
          ],
          [
              'tenquyen' =>'Quản lý điểm',
              'duongdan'=>str_slug('Quản lý điểm','-'),
              'id_cha'=>0,
              'created_at'   => new DateTime(),
          ],
        ]);
    }
}
