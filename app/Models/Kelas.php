<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_kelas',
        'id_jurusan',
    ];

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class, 'id', 'id_jurusan');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id', 'id_kelas');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }
}
