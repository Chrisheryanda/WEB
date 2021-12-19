<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @include('layouts/sidebar')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
{{-- @extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <!-- Content Row -->
    <div class="row">

@include('layouts/sidebar')
        
        <!-- card siswa -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-primary shadow h-100 pt-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswa->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $ssw_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('data.siswa') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card wali kelas -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Wali Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $wali_kelas->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $wks_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('data.wali_kelas') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card jurusan -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jurusan
                                </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jurusan->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-school fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $jurusan_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('data.jurusan') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card Kelas -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Kelas
                                </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $kelas_latest }}</small>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('data.kelas') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if ($dokumen->count()!=0)
            
        <!-- card surat pengantar -->
        <div class="col-xl-4 col-md-6 mb-4 mx-auto">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Dokumen
                                </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dokumen->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    {{-- <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <small class=" text-gray-400">Diperbarui {{ $sp_latest }}</small>
                        </div>
                    </div> --}}
                    {{-- <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('dokumen') }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection --}}