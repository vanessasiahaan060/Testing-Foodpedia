<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table ='post';
    protected $fillable = ['nama', 'deskripsi', 'price', 'thumbnail', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id');
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjangs::class, 'id');
    }
}
