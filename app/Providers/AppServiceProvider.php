<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Paksa semua URL yang dihasilkan Laravel (url(), route(), asset(), dll)
        // selalu memakai skema HTTPS. Ini penting karena Railway berjalan di
        // balik proxy, sehingga Laravel kadang salah mendeteksi skema dan
        // menghasilkan link http:// meskipun situsnya sudah https://.
        // Link http:// inilah yang menyebabkan tombol Download diblokir
        // browser karena dianggap "Mixed Content".
        if (str_contains(config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        // CATATAN: Logika auto-migrate (Artisan::call('migrate')) yang dulu
        // ada di sini sudah DIHAPUS. Migrasi database sekarang ditangani
        // secara resmi oleh Railway lewat "Pre-deploy Command" di Settings
        // (php artisan migrate --force). Menjalankannya lagi di sini akan
        // menyebabkan dua proses migrate berjalan bersamaan (race condition)
        // yang membuat aplikasi crash — persis seperti insiden sebelumnya.
    }
}