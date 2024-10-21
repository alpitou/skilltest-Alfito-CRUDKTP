# Web CRUD KTP Laravel
Web CRUD KTP Laravel adalah aplikasi web yang dirancang untuk memenuhi persyaratan tahap awal dari proses rekrutmen Freelance Project ERP Bromindo yang berbentuk skill test.

## Deskripsi Singkat

Aplikasi ini memiliki dua jenis pengguna:

- **Admin**: Pengguna dengan peran admin memiliki akses untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data KTP. Admin juga dapat mengimpor dan mengekspor data, serta memantau aktivitas pengguna lainnya.
  
- **User**: Pengguna biasa hanya dapat melihat data penduduk dan melakukan ekspor data.

## Fitur Utama

- **CRUD Data KTP**: Tambah, lihat, edit, dan hapus data KTP penduduk.
- **Impor dan Ekspor Data**: Fitur untuk mengimpor data dari file dan mengekspor data ke berbagai format.
- **Monitoring Aktivitas**: Admin dapat memantau aktivitas pengguna dalam sistem.

## Teknologi yang dipakai

- Laravel 10
- PHP 8.1.17
- 10.4.28-MariaDB
- Bootstrap 5
- laravel-dompdf
- MaatWebsite

## Data Login
1. Admin username : admin password : admin123
2. User username : user password : user123

## API
1. Return Data KTP
http://127.0.0.1:8000/api/data

2. Return Data KTP dengan pencarian kata kunci bisa berupa nama atau nik dari data yang ingin dicari.
http://127.0.0.1:8000/api/search?keyword=[kata kunci]
