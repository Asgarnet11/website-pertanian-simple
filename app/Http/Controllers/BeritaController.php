<?php

namespace App\Http\Controllers;

use App\Models\Berita; // Jangan lupa import model Berita
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan halaman daftar berita.
     */
    public function index()
    {
        return view('berita');
    }

    /**
     * Menampilkan satu berita secara spesifik.
     * Laravel akan otomatis mengambil data berita berdasarkan ID di URL.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\View\View
     */
    public function show(Berita $berita)
    {
        return view('berita-show', [
            'berita' => $berita
        ]);
    }
}
