<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = [
            [
                'nisn' => 1202170029,
                'nama' => "Rangga Sultan Tawakkal",
                'id_kelas' => 1,
                'id_jurusan' => 1,
                'kode_wali_kelas' => "EDH",
                'no_telepon' => "089502551212",
                'alamat' => "Jl. Radio Palasari no. 15",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Denpasar",
                'tanggal_lahir' => "1999-10-22",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => 1202172054,
                'nama' => "Chrisheryanda Eka Saputra",
                'id_kelas' => 3,
                'id_jurusan' => 3,
                'kode_wali_kelas' => "HPT",
                'no_telepon' => "081562718291",
                'alamat' => "Jl. Sukabirus no. 1",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Bengkulu",
                'tanggal_lahir' => "1999-10-19",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => 1202174388,
                'nama' => "Candra Eka Laksana",
                'id_kelas' => 3,
                'id_jurusan' => 2,
                'kode_wali_kelas' => "SMS",
                'no_telepon' => "081728192712",
                'alamat' => "Jl. Sukapura no. 1",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Cilacap",
                'tanggal_lahir' => "1999-08-30",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('siswa')->insert($siswa);

        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= 50; $i++) {
            DB::table('siswa')->insert([
                'nisn' => $faker->unique()->numberBetween(1202174389, 1202189999),
                'nama' => $faker->name,
                'id_kelas' => $faker->numberBetween(1, 6),
                'id_jurusan' => $faker->numberBetween(1, 3),
                'kode_wali_kelas' => Str::random(3),
                'no_telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeBetween('-17 years', '-14 years', null)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
