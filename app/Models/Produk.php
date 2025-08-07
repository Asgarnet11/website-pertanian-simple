<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id', // <-- TAMBAHKAN INI
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'gambar_url',
    ];

    // Satu Produk milik satu Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
