<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Import model Produk
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Menampilkan halaman utama toko dengan semua produk.
     */
    public function index()
    {
        return view('toko');
    }

    /**
     * Menampilkan halaman detail untuk satu produk.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\View\View
     */
    public function show(Produk $produk)
    {
        return view('toko-show', [
            'produk' => $produk
        ]);
    }
}
