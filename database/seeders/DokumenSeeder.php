<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dokumen = [
            [
                'id_siswa' => 1,
                'dokumen' => 'dokumen.pdf',
                'surat_surat' => 'surat.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_siswa' => 2,
                'dokumen' => 'dokumen.pdf',
                'surat_surat' => 'surat.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('dokumen')->insert($dokumen);
    }
}
