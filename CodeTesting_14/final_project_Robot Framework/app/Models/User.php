<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function komentar()
    {
        return $this->belongsTo(Komentar::class, 'id');
    }

    public function keranjang()
    {
        return $this->hasMany(keranjang::class, 'id');
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
