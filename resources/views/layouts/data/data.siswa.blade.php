@extends('layouts/main')
@section('title','Data Siswa')

@section('main-content')

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Data Siswa</h6>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ $message }}
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
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
                <table class="table table-striped table-bordered display nowrap" id="dataTableAdmin">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($siswa as $ssw)
                        <tr>
                            <td scope="row" class="text-center">{{ $i }}</td>
                            <td scope="row">{{ $ssw->id }}</td>
                            <td scope="row">{{ $ssw->nisn }}</td>
                            <td scope="row">{{ $ssw->nama }}</td>
                            <td scope="row">{{ $ssw->kelas->jurusan->nama_jurusan }}</td>
                            <td scope="row">{{ $ssw->kelas->nama_kelas }}</td>
                            <td scope="row">{{ $ssw->no_telepon }}</td>
                            <td scope="row">{{ Str::limit($ssw->alamat,50) }}</td>
                            <td scope="row">{{ $ssw->jenis_kelamin }}</td>
                            <td scope="row">{{ $ssw->tempat_lahir }}, {{ $ssw->tanggal_lahir }}</td>
                            <td scope="row">{{ $ssw->created_at }}</td>
                            <td scope="row">{{ $ssw->updated_at }}</td>
                            <td scope="row">
                                <abbr title="Lihat Detail"><a href="" data-bs-toggle="modal" data-bs-target="#modalTampilData{{ $ssw->id }}" class="text-primary"><i class="fas fa-sm fa-info"></i></a></abbr> |
                                <abbr title="Edit data"><a href="" data-bs-toggle="modal" data-bs-target="#modalEditData{{ $ssw->id }}" class="text-warning"><i class="fas fa-sm fa-edit"></i></a></abbr> |
                                <abbr title="Hapus data"><a href="" data-bs-toggle="modal" data-bs-target="#modalHapusData{{ $ssw->id }}" class="text-danger"><i class="fas fa-sm fa-trash-alt"></i></a></abbr>
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

{{-- modal tampil data --}}
@foreach ($siswa as $ssw)

<div class="modal fade" id="modalTampilData{{ $ssw->id }}" tabindex="-1" aria-labelledby="modalTampilDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTampilDataLabel">Detail Data Siswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="id" class="col-form-label font-weight-bold">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $ssw->id }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="col-form-label font-weight-bold">NISN:</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{ $ssw->nisn }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label font-weight-bold">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $ssw->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="col-form-label font-weight-bold">Kelas:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $ssw->kelas->nama_kelas }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="peminatan" class="col-form-label font-weight-bold">Jurusan:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $ssw->jurusan->nama_jurusan }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label font-weight-bold">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $ssw->no_telepon }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label font-weight-bold">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" disabled>{{ $ssw->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="col-form-label font-weight-bold">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $ssw->jenis_kelamin }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="col-form-label font-weight-bold" font-weight-bold font-weight-bold>Tempat Lahir:</label>
                        <input type=" text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $ssw->tempat_lahir }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-form-label font-weight-bold">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $ssw->tanggal_lahir }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="col-form-label font-weight-bold">Waktu Dibuat:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $ssw->created_at }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="col-form-label font-weight-bold">Waktu Diperbarui:</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $ssw->updated_at }}" disabled>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- modal tambah data --}}
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Siswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('data.siswa.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nim" class="col-form-label font-weight-bold font-weight-bold">NISN:</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label font-weight-bold font-weight-bold">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_kelas" class="col-form-label font-weight-bold font-weight-bold">Kelas:</label>
                        <select class="form-control" name="id_kelas" id="id_kelas" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_peminatan" class="col-form-label font-weight-bold font-weight-bold">Jurusan:</label>
                        <select class="form-control" name="id_jurusan" id="id_jurusan" required>
                            <option selected disabled>--- Pilih ---</option>
                            @foreach ($jurusan as $jrsn)
                            <option value="{{ $jrsn->id }}">{{ $jrsn->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label font-weight-bold font-weight-bold">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label font-weight-bold font-weight-bold">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="col-form-label font-weight-bold font-weight-bold">Jenis Kelamin:</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" selected disabled>--- Pilih ---</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="col-form-label font-weight-bold font-weight-bold">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-form-label font-weight-bold font-weight-bold">Tanggal Lahir:</label>
                        <input type="date" max="{{ date("Y-m-d") }}" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="tanggal_lahir" required>
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

{{-- modal edit data --}}
@foreach ($siswa as $ssw)

<div class="modal fade" id="modalEditData{{ $ssw->id }}" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataLabel">Edit Data Siswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('data.siswa.update', $ssw->id) }}">
                    @csrf
                    <input hidden type="text" class="form-control" id="id" name="id" value="{{ $ssw->id }}" required>
                    <div class="mb-3">
                        <label for="nim" class="col-form-label font-weight-bold">NISN:</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $ssw->nisn }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="col-form-label font-weight-bold">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $ssw->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="col-form-label font-weight-bold">Kelas:</label>
                        <select class="form-control" name="id_kelas" id="id_kelas" required>
                            <option disabled>--- Pilih ---</option>
                            <option value="{{ $ssw->kelas->id }}" selected hidden>{{ $ssw->kelas->nama_kelas }}</option>
                            @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="peminatan" class="col-form-label font-weight-bold">Jurusan:</label>
                        <select class="form-control" name="id_jurusan" id="id_jurusan" required>
                            <option selected disabled>--- Pilih ---</option>
                            <option value="{{ $ssw->jurusan->id }}" selected hidden>{{ $ssw->jurusan->nama }}</option>
                            @foreach ($jurusan as $jrsn)
                            <option value="{{ $jrsn->id }}">{{ $jrsn->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="col-form-label font-weight-bold">No. Telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $ssw->no_telepon }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="col-form-label font-weight-bold">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $ssw->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="col-form-label font-weight-bold">Jenis Kelamin:</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" value="{{ $ssw->jenis_kelamin }}" required>
                            <option value="" disabled>--- Pilih ---</option>
                            <option value="{{ $ssw->jenis_kelamin }}" selected hidden>{{ $ssw->jenis_kelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="col-form-label font-weight-bold">Tempat Lahir:</label>
                        <input type=" text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $ssw->tempat_lahir }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="col-form-label font-weight-bold">Tanggal Lahir:</label>
                        <input type="date" class="form-control" max="{{ date("Y-m-d") }}" id="tanggal_lahir" name="tanggal_lahir" required>
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
@foreach ($siswa as $ssw)
<div class="modal fade" id="modalHapusData{{ $ssw->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Anda yakin ingin menghapus data siswa ini?</h6>
                <table class="table table-borderless table-responsive">
                    <tr>
                        <th>NIM</th>
                        <td>:</td>
                        <td>{{ $ssw->nim }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $ssw->nama }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>:</td>
                        <td>{{ $ssw->kelas->nama_kelas }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <form action="{{ route('data.siswa.destroy', $ssw->id ) }}" method="GET">
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