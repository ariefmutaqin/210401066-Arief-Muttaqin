<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'level', 'gambar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function petugas()
    {
        return $this->hasOne(Petugas::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
