<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sesuai dengan nama model dalam bentuk jamak)
    protected $table = 'jurnals';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'tanggal',
        'rekening',
        'keterangan',
        'debit',
        'kredit',
    ];

    // Jika tidak memakai timestamps (created_at dan updated_at)
    public $timestamps = false;
}

