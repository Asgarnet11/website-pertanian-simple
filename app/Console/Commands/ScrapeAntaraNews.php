<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Support\Str;
// Ganti use statement Goutte dengan ini:
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

class ScrapeAntaraNews extends Command
{
    /**
     * Nama dan signature dari command kita.
     */
    protected $signature = 'news:scrape-antara';

    /**
     * Deskripsi dari command.
     */
    protected $description = 'Scrape berita terkini dari website Antara News';

    /**
     * Method utama yang akan dieksekusi saat command dijalankan.
     */
    public function handle()
    {
        // Inisialisasi client dengan cara baru
        $browser = new HttpBrowser(HttpClient::create());

        $url = 'https://rri.co.id/sprint?query=pertanian';

        // Lakukan request ke URL target
        $crawler = $browser->request('GET', $url);

        $this->info("Memulai scraping dari: {$url}");

        // Filter untuk menemukan setiap container artikel berita
        // Logika di bawah ini TIDAK BERUBAH SAMA SEKALI
        $crawler->filter('article.simple-post')->each(function ($node) {

            $title = $node->filter('h3.simple-post__title a')->text();
            $link = $node->filter('h3.simple-post__title a')->attr('href');
            $image = $node->filter('picture img')->attr('data-src');
            $summary = $node->filter('p')->text();

            $beritaExists = Berita::where('judul', $title)->exists();

            if (!$beritaExists) {
                Berita::create([
                    'judul' => $title,
                    'gambar_url' => $image,
                    'konten' => $summary . "\n\n<a href='{$link}' target='_blank' class='font-bold text-indigo-600 hover:underline'>Baca selengkapnya di Antara News...</a>",
                    'user_id' => 1,
                ]);

                $this->info("BERHASIL DISIMPAN: {$title}");
            } else {
                $this->warn("SUDAH ADA: {$title}");
            }
        });

        $this->info('Proses scraping selesai!');
        return 0;
    }
}
