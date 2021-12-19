<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class WaliKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wali_kelas = [
            [
                'nip' => 2000000001,
                'nama' => "Heri Prasetyo",
                'kode_wali_kelas' => "HPT",
                'no_telepon' => "089517289371",
                'alamat' => "Jl. Telekomunikasi no. 1",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Bandung",
                'tanggal_lahir' => "1979-08-12",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000000002,
                'nama' => "Samsul",
                'kode_wali_kelas' => "SMS",
                'no_telepon' => "0817364920",
                'alamat' => "Jl. Bunga no. 1",
                'jenis_kelamin' => "Laki-laki",
                'tempat_lahir' => "Surabaya",
                'tanggal_lahir' => "1971-09-24",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => 2000000003,
                'nama' => "Endah",
                'kode_wali_kelas' => "EDH",
                'no_telepon' => "0881726489",
                'alamat' => "Jl. Melati no. 1",
                'jenis_kelamin' => "Perempuan",
                'tempat_lahir' => "Serang",
                'tanggal_lahir' => "1983-11-22",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('wali_kelas')->insert($wali_kelas);

        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= 50; $i++) {
            DB::table('wali_kelas')->insert([
                'nip' => $faker->unique()->numberBetween(2000000006, 2000001111),
                'nama' => $faker->name,
                'kode_wali_kelas' => Str::random(3),
                'no_telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeBetween('-50 years', '-24 years', null)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
