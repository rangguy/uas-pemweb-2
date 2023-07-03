<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';
    protected $fillable = [
        'nama_proyek'
    ];

    protected $primary = 'id';

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class,'proyek_id');
    }
}
