<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\WaliKelas;
use App\Models\Jurusan;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $ssw_latest = Siswa::latest('updated_at')->first()->updated_at;
        $wali_kelas = WaliKelas::all();
        $wali_kelas_latest = WaliKelas::latest('updated_at')->first()->updated_at;
        $jurusan = Jurusan::all();
        $jurusan_latest = Jurusan::latest('updated_at')->first()->updated_at;
        $kelas = Kelas::all();
        $kelas_latest = Kelas::latest('updated_at')->first()->updated_at;
        $dokumen = Dokumen::all();

        return view('dashboard', compact(
            'siswa',
            'ssw_latest',
            'wali_kelas',
            'wali_kelas_latest',
            'jurusan',
            'jurusan_latest',
            'kelas',
            'kelas_latest',
            'dokumen',
            // 'sp_latest',
        ));
    }
}
