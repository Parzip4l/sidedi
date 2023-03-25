<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduans';

    protected $fillable = [
        'nik',
        'nama',
        'email',
        'nomor_telepon',
        'pesan',
    ];
}
