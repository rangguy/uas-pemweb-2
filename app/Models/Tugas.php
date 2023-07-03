<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $fillable = [
        'nama_tugas'
    ];
    protected $primary = 'id';

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class,'tugas_id');
    }
}
