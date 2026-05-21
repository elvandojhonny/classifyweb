<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'gedung_id',
        'nama_kelas',
        'keterangan'
    ];

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class);
}
}