<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $table = 'gedung';

    protected $fillable = [
        'fakultas_id',
        'nama_gedung'
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function kelas()
{
    return $this->hasMany(Kelas::class);
}
}