<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'nama_kelas' => "X MIPA 1",
                'id_jurusan' => "1",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => "X Bahasa 1",
                'id_jurusan' => "2",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => "X IPS 1",
                'id_jurusan' => "3",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => "XI Bahasa 1",
                'id_jurusan' => "2",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => "XI IPS 1",
                'id_prodi' => "3",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => "XI MIPA 1",
                'id_prodi' => "1",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('kelas')->insert($kelas);
    }
}
