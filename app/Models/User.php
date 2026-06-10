<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

#[Fillable([
    'name',
    'email',
    'password',
    'role',
    'nim',
    'prodi',
    'fakultas_id'
])]

#[Hidden([
    'password',
    'remember_token'
])]


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class);
}

public function fakultas()
{
    return $this->belongsTo(
        Fakultas::class,
        'fakultas_id'
    );
}
}