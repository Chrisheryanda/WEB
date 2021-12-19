<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            [
                'nama_jurusan' => "MIPA",
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'nama_jurusan' => "Bahasa",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jurusan' => "IPS",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('jurusan')->insert($jurusan);
    }
}
