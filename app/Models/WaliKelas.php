<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class WaliKelas extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "wali_kelas";
    protected $primaryKey = "id";
    protected $foreignKey = [
        'id_kelas',
        'id_jurusan',
    ];
    protected $fillable = [
        'nip',
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

    public function suratPengumuman()
    {
        return $this->belongsTo(SuratPengumuman::class, 'id_siswa', 'id');
    }

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class, 'id', 'id_jurusan');
    }
}
