<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::all();
        return view('dokumen', compact('dokumen'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'aktor' => 'required',
            'file' => 'max:50000',
        ];

        $messages = [
            'nama.required' => 'Nama file harus diisi',
            'deskripsi.required' => 'Deskripsi file harus diisi',
            'aktor.required' => 'Aktor tujuan harus dipilih',
            'file.max' => 'Ukuran file maksimal adalah 50MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $fileName = $request->file->getClientOriginalName();
        $request->file('file')->storeAs('public/dokumen', $fileName);

        $dokumen = new Dokumen;
        $dokumen->nama = $request->nama;
        $dokumen->deskripsi = $request->deskripsi;
        $dokumen->aktor = $request->aktor;
        $dokumen->file = $fileName;

        $simpan = $dokumen->save();

        if ($simpan) {
            Session::flash('success', 'Dokumen berhasil diunggah.');
            return redirect()->route('dokumen');
        } else {
            Session::flash('errors', 'Dokumen gagal diunggah.');
            return redirect()->route('dokumen');
        }
    }

    public function getFile(Request $request)
    {
        if (Storage::disk('public')->exists("dokumen/$request->file")) {
            $path = Storage::disk('public')->path("dokumen/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->route('dokumen')->with('errors', 'Gagal mengunduh file.');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'file' => 'max:50000',
        ];

        $messages = [
            'file.max' => 'Ukuran file maksimal adalah 50MB.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $dokumen = Dokumen::whereId($id)->first();
        if (File::exists('storage/dokumen/' . $dokumen->file)) {
            File::delete('storage/dokumen/' . $dokumen->file);
        }

        $fileName = $request->file->getClientOriginalName();
        $request->file('file')->storeAs('public/dokumen', $fileName);

        $simpan = $dokumen->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'aktor' => $request->aktor,
            'file' => $fileName,
        ]);

        if ($simpan) {
            Session::flash('success', 'Dokumen berhasil diperbarui.');
            return redirect()->route('dokumen');
        } else {
            Session::flash('errors', 'Dokumen gagal diperbarui.');
            return redirect()->route('dokumen');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratPengantar  $suratPengantar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus file
        $dokumen = Dokumen::where('id', $id)->first();
        File::delete('storage/dokumen/' . $dokumen->file);

        // hapus data di tabel database
        Dokumen::where('id', $id)->delete();

        return redirect()->route('dokumen')->with('success', 'Data berhasil dihapus.');
    }
}
