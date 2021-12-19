<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\WaliKelas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        // menampilkan data seluruh siswa
        $siswa = Siswa::all();
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $wali_kelas = WaliKelas::all();

        return view('data/siswa', compact('siswa', 'jurusan', 'kelas', 'wali_kelas'));
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nisn'                   => 'required|unique:siswa,nisn',
            'nama'                  => 'required',
            'id_kelas'              => 'required',
            'id_jurusan'          => 'required',
            'id_wali_kelas'                 => 'required',
        ];

        $messages = [
            'nisn.required'          => 'NISN wajib diisi.',
            'nisn.unique'            => 'NISN sudah terdaftar.',
            'nama.required'         => 'nama wajib diisi',
            'id_kelas.required'     => 'Kelas wajib diisi',
            'id_jurusan.required' => 'Jurusan wajib diisi',
            'id_wali_kelas.required'        => 'Kode Wali Kelas wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $ssw = new Siswa;
        $ssw->nisn = $request->nisn;
        $ssw->nama = $request->nama;
        $ssw->id_kelas = $request->id_kelas;
        $ssw->id_jurusan = $request->id_jurusan;
        $ssw->id_wali_kelas = $request->id_wali_kelas;
        $ssw->alamat = $request->alamat;
        $ssw->no_telepon = $request->no_telepon;
        $ssw->jenis_kelamin = $request->jenis_kelamin;
        $ssw->tempat_lahir = $request->tempat_lahir;
        $ssw->tanggal_lahir = $request->tanggal_lahir;
        $simpan = $ssw->save();

        if ($simpan) {
            Session::flash('success', 'Data Siswa berhasil ditambahkan.');
            return redirect()->route('data.siswa');
        } else {
            Session::flash('errors', 'Data Siswa gagal ditambahkan.');
            return redirect()->route('data.siswa');
        }
    }

    public function show(Siswa $siswa)
    {
        // dengan menggunakan resource, maka kita bisa memanfaatkan model sebagai parameter berdasarkan id yang dipilih
        // dengan href="{{ route('admin.data.mahasiswa.show',$mahasiswa->id) }}
        return view('data.siswa.show', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nisn'                   => 'required|unique:siswa,nisn',
            'nama'                  => 'required',
            'id_kelas'              => 'required',
            'id_jurusan'          => 'required',
            'id_wali_kelas'                 => 'required',
        ];

        $messages = [
            'nisn.required'          => 'NISN wajib diisi.',
            'nisn.unique'            => 'NISN sudah terdaftar.',
            'nama.required'         => 'nama wajib diisi',
            'id_kelas.required'     => 'Kelas wajib diisi',
            'id_jurusan.required' => 'Jurusan wajib diisi',
            'id_wali_kelas.required'        => 'Kode Wali Kelas wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = Siswa::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data Siswa berhasil diubah.');
            return redirect()->route('data.siswa');
        } else {
            Session::flash('errors', 'Data Siswa gagal diubah.');
            return redirect()->route('data.siswa');
        }
    }

    public function destroy($id)
    {
        DB::table('siswa')->where('id', $id)->delete();

        return redirect()->route('data.siswa')->with('success', 'Data Siswa berhasil dihapus.');
    }
}
