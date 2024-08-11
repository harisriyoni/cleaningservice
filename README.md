# Project Web Cleaning Service

* Pembuatan Pada Semester 3 2023

Pembuatan Website Cleaning Service menggunakan Laravel 8, pada matakuliah project 2 website untuk pemesanan Jasa Cleaning Service, berikut beberapa fitur yang telah dibuat:
$ Fitur:



User/Admin
* Login
* Register
* Order Product
* Kelola Profile
* Cetak Order


Admin


* Kelola Order
* Kelola Product
* Data Produk
* Data Pelanggan



Fixing Deploy

Solusi
1. Hapus Referensi Hardcoded pada Service Provider:

Jika Anda tidak memerlukan IdeHelperServiceProvider di lingkungan produksi, Anda dapat menghapus referensi hardcoded pada IdeHelperServiceProvider di config/app.php atau AppServiceProvider.php.
2. Kondisional Registrasi Service Provider:

Tambahkan logika kondisional dalam AppServiceProvider untuk hanya mendaftarkan IdeHelperServiceProvider jika tidak berada di environment produksi:

php
Copy code
public function register()
{
    if ($this->app->environment() !== 'production') {
        $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
}
3. Pindahkan Dependency ke require:

Jika Anda benar-benar memerlukan IdeHelperServiceProvider di lingkungan produksi, Anda bisa memindahkan package ini dari require-dev ke require di composer.json. Namun, ini mungkin tidak disarankan karena biasanya IdeHelper hanya diperlukan selama pengembangan.
4. Hapus Cache:

Terkadang, cache yang sudah ada di direktori bootstrap/cache dapat menyebabkan masalah. Anda bisa membersihkannya dengan perintah:
bash
Copy code
php artisan optimize:clear
5. Update Composer:

Kadang-kadang, masalah ini dapat diselesaikan dengan melakukan pembaruan composer. Jalankan:
bash
Copy code
composer update
6. Cek File Cache yang Dihasilkan:

Pastikan bahwa file cache yang berisi referensi ke IdeHelperServiceProvider tidak ikut ter-commit ke repositori atau disertakan dalam build.
Langkah-Langkah untuk Menyelesaikan Masalah di Heroku
Periksa composer.json: Pastikan bahwa Laravel IdeHelper tidak di-register di bagian extra laravel dan tidak ada referensi hardcoded yang tersisa.

Perbarui dan Push Kode:

Hapus cache lokal dan lakukan update:

bash
Copy code
php artisan optimize:clear
composer update
Commit perubahan Anda dan push ke Heroku:

bash
Copy code
git add .
git commit -m "Fix deployment issues"
git push heroku main