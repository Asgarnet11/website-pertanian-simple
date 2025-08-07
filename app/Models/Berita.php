<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'konten',
        'gambar_url',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
