<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

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
        // Otomatis buat file database SQLite jika terhapus saat server restart
        if (config('database.default') === 'sqlite') {
            $path = config('database.connections.sqlite.database');
            if ($path && !file_exists($path) && $path !== ':memory:') {
                // Buat direktori database jika belum ada
                if (!file_exists(dirname($path))) {
                    mkdir(dirname($path), 0755, true);
                }
                touch($path);
            }
        }

        // Otomatis jalankan migrasi jika tabel orders belum terbentuk
        try {
            if (!Schema::hasTable('orders')) {
                Artisan::call('migrate', ['--force' => true]);
            }
        } catch (\Exception $e) {
            // Mengabaikan error saat proses build awal
        }
    }
}