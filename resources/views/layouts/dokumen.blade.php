@extends('layouts/main')
@section('title','Dokumen')

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Dokumen</h6>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ada kesalahan:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button type="button" class="btn btn-success mb-3 mx-3" data-bs-toggle="modal" data-bs-target="#modalTambahData">
                    <i class="fas fa-plus"></i> Unggah Dokumen
                </button>
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aktor</th>
                            <th scope="col">File</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($dokumen as $dok)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $dok->id }}</td>
                            <td scope="row">{{ $dok->nama }}</td>
                            <td scope="row">{{ Str::limit($dok->deskripsi, 50) }}</td>
                            <td scope="row">{{ $dok->aktor }}</td>
                            <td scope="row"><a href="{{ route('dokumen.get',$dok->file) }}">{{ Str::limit($dok->file, 50) }}</a></td>
                            <td scope="row">{{ $dok->created_at }}</td>
                            <td scope="row">{{ $dok->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $dok->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $dok->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr> |
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $dok->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
                            </td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- modal tambah data --}}
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataLabel">Unggah Dokumen</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dokumen.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama File:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="aktor" class="col-form-label">Untuk Aktor:</label>
                        <select class="form-control" name="aktor" id="aktor" required>
                            <option disabled selected>--- Pilih ---</option>
                            <option value="Siswa">Siswa</option>
                            <option value="Wali Kelas">Wali Kelas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="col-form-label">File Dokumen:</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept="application/pdf" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- modal tampil data --}}
@foreach ($dokumen as $dok)

<div class="modal fade" id="modalTampilData{{ $dok->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Dokumen </h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dokumen.update', $dok->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $dok->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama File:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $dok->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" disabled>{{ $dok->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="aktor" class="col-form-label">Untuk Aktor:</label>
                        <textarea name="aktor" id="aktor" class="form-control" disabled>{{ $dok->aktor }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file_template" class="col-form-label">File Dokumen:</label><br>
                        <a href="{{ route('admin.dokumen-kp.get',$dok->file) }}" class="form-control border-0">{{ $dok->file }}</a>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $dok->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $dok->updated_at }}" disabled>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-bs-dismiss="modal">OK</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal edit data --}}
@foreach ($dokumen as $dok)

<div class="modal fade" id="modalEditData{{ $dok->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data Dokumen</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.dokumen-kp.update', $dok->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $dok->id }}" required>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label">Nama File:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $dok->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" requred>{{ $dok->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="aktor" class="col-form-label">Aktor:</label>
                        <select class="form-control" name="aktor" id="aktor" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $dok->aktor }}" selected hidden>{{ $dok->aktor }}</option>
                            <option value="Siswa">Siswa</option>
                            <option value="Wali Kelas">Wali Kelas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="col-form-label">Ubah File Dokumen:</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept="application/pdf" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal hapus data --}}
@foreach ($dokumen as $dok)
<div class="modal fade" id="modalHapusData{{ $dok->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dokumen</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data dan file Dokumen ini?</h6>
                <ul>
                    <li>ID: {{ $dok->id }}</li>
                    <li>Nama File: {{ $dok->nama }}</li>
                    <li>Untuk Aktor: {{ $dok->aktor }}</li>
                    <li>File: {{ $dok->file }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <form action="{{ route('dokumen.destroy', $dok->id ) }}" method="GET">
                    @csrf
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection