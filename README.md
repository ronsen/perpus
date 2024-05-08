### perpus

Sistem informasi perpustakaan atau peminjaman buku.


Cara memasang aplikasi:

```
git clone https://github.com/ronsen/perpus.git
cd perpus
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
```

Cara menjalankan aplikasi di lokal:

```
php artisan serve
```

Buka `http://localhost:8080` di peramban web dengan pengguna `admin@example.com` dan `password` sebagai sandinya.

Silakan hubungi pengembang untuk pengembangan selanjutnya.