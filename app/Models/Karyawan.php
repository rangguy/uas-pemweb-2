<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $fillable = [
        'nama_karyawan',
        'proyek_id',
        'tugas_id',
        'departemen_id'
    ];
    protected $primary = 'id';

    public function proyek()
    {
        return $this->belongsTo(Proyek::class,'proyek_id');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class,'tugas_id');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class,'departemen_id');
    }

}
