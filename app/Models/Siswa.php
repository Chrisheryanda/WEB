<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "siswa";
    protected $primaryKey = "id";
    protected $foreignKey = [
        'id_kelas',
        'id_jurusan',
        'kode_wali_kelas',
    ];
    protected $fillable = [
        'nisn',
        'nama',
        'id_kelas',
        'id_jurusan',
        'kode_wali_kelas',
        'alamat',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
    ];

    public function getTanggalLahirAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal_lahir'])->format('d M Y');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'id_siswa', 'id');
    }

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class, 'id', 'id_jurusan');
    }

    public function walikelas()
    {
        return $this->hasMany(WaliKelas::class, 'id', 'id_wali_kelas');
    }
}
