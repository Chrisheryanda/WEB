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

class WaliKelasController extends Controller
{
    public function index()
    {
        // menampilkan data seluruh wali kelas
        // $jurusan = Jurusan::all();
        // $kelas = Kelas::all();
        $wali_kelas = WaliKelas::all();

        return view('data/wali_kelas', compact('wali_kelas'));
    }

    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nip'                   => 'required|unique:wali_kelas,nip',
            'nama'                  => 'required',
            // 'id_kelas'              => 'required',
            // 'id_jurusan'            => 'required',
            'kode_wali_kelas'       => 'required|unique:wali_kelas,kode_wali_kelas',
        ];

        $messages = [
            'nip.required'          => 'NIP wajib diisi.',
            'nip.unique'            => 'NIP sudah terdaftar.',
            'nama.required'         => 'nama wajib diisi',
            // 'id_kelas.required'     => 'Kelas wajib diisi',
            // 'id_jurusan.required' => 'Jurusan wajib diisi',
            'kode_wali_kelas.required'        => 'Kode Wali Kelas wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $wks = new WaliKelas;
        $wks->nip = $request->nip;
        $wks->nama = $request->nama;
        // $wks->id_kelas = $request->id_kelas;
        // $wks->id_jurusan = $request->id_jurusan;
        $wks->kode_wali_kelas = $request->kode_wali_kelas;
        $wks->no_telepon = $request->no_telepon;
        $wks->alamat = $request->alamat;
        $wks->jenis_kelamin = $request->jenis_kelamin;
        $wks->tempat_lahir = $request->tempat_lahir;
        $wks->tanggal_lahir = $request->tanggal_lahir;

        $simpan = $wks->save();

        if ($simpan) {
            Session::flash('success', 'Data Wali Kelas berhasil ditambahkan.');
            return redirect()->route('data.wali_kelas');
        } else {
            Session::flash('errors', 'Data Wali Kelas gagal ditambahkan.');
            return redirect()->route('data.wali_kelas');
        }
    }

    public function show(WaliKelas $wali_kelas)
    {
        // dengan menggunakan resource, maka kita bisa memanfaatkan model sebagai parameter berdasarkan id yang dipilih
        // dengan href="{{ route('admin.data.mahasiswa.show',$mahasiswa->id) }}
        return view('data.wali_kelas.show', compact('wali_kelas'));
    }

    public function update(Request $request, $id)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nip'                   => 'required|unique:wali_kelas,nip',
            'nama'                  => 'required',
            // 'id_kelas'              => 'required',
            // 'id_jurusan'            => 'required',
            'kode_wali_kelas'       => 'required|unique:wali_kelas,kode_wali_kelas',
        ];

        $messages = [
            'nip.required'          => 'NIP wajib diisi.',
            'nip.unique'            => 'NIP sudah terdaftar.',
            'nama.required'         => 'nama wajib diisi',
            // 'id_kelas.required'     => 'Kelas wajib diisi',
            // 'id_jurusan.required' => 'Jurusan wajib diisi',
            'kode_wali_kelas.required'        => 'Kode Wali Kelas wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = WaliKelas::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data Wali Kelas berhasil diubah.');
            return redirect()->route('data.wali_kelas');
        } else {
            Session::flash('errors', 'Data Wali Kelas gagal diubah.');
            return redirect()->route('data.wali_kelas');
        }
    }

    public function destroy($id)
    {
        DB::table('wali_kelas')->where('id', $id)->delete();

        return redirect()->route('data.wali_kelas')->with('success', 'Data Wali Kelas berhasil dihapus.');
    }
}
