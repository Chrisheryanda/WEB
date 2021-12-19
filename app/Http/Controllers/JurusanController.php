<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('data/jurusan', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // buat validasi utk semua field yang diinput
        $rules = [
            'nama_jurusan'            => 'required|unique:jurusan,nama_jurusan',
        ];

        $messages = [
            'nama_jurusan.required'          => 'Jurusan wajib diisi.',
            'nama_jurusan.unique'            => 'Jurusan sudah terdaftar.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // insert setiap request dari form ke database via model
        $jrsn = new Jurusan;
        $jrsn->nama_jurusan = $request->nama_jurusan;

        $simpan = $jrsn->save();

        if ($simpan) {
            Session::flash('success', 'Data berhasil ditambahkan.');
            return redirect()->route('data.jurusan');
        } else {
            Session::flash('errors', 'Data gagal ditambahkan.');
            return redirect()->route('data.jurusan');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_jurusan'            => 'required|unique:jurusan,nama_jurusan' . $request->id,
        ];

        $messages = [
            'nama_jurusan.required'          => 'Jurusan wajib diisi.',
            'nama_jurusan.unique'            => 'Jurusan sudah terdaftar.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $simpan = Jurusan::find($id)->update($request->all());

        if ($simpan) {
            Session::flash('success', 'Data berhasil diubah.');
            return redirect()->route('data.jurusan');
        } else {
            Session::flash('errors', 'Data gagal diubah.');
            return redirect()->route('data.jurusan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jurusan')->where('id', $id)->delete();

        return redirect()->route('data.jurusan')->with('success', 'Data berhasil dihapus.');
    }
}
