# KTP Manager


KTP Manager adalah website yang berfungsi sebagai sistem pengelola data KTP penduduk. Pengguna yang memiliki role admin mempunyai akses untuk CRUD data KTP, import & export data, dan melihat aktivitas user. Sedangkan user hanya bisa melihat data penduduk dan export data.

## Teknologi yang dipakai

- Laravel 10
- PHP 8.1.17
- 10.4.28-MariaDB
- Bootstrap 5
- laravel-dompdf
- MaatWebsite

## Data Login
1. **Admin**
   username : admin
   password : admin123
2. **User**
   username : user
   password : user123

## Cara Penggunaan

1. **Persiapan Lingkungan:**
   Pastikan Anda sudah menginstal PHP, Laravel, Composer, dan MySQL.

2. **Clone Repositori:**
   ```bash
   git clone https://github.com/Pacifista00/crudktp.git

3. **Instalasi:**
   Buka folder melalui terminal / git bash lalu ketikkan:
   ```bash
   composer install

4. **Membuat file .env di Windows:**
   Jika menggunakan windows ketikkan:
   ```bash
   copy .env.example .env

5. **Membuat file .env di Linux:**
   Jika menggunakan linux ketikkan:
   ```bash
   cp .env.example .env

6. **Generate key**
   Setelah berhasil membuat file .env, berikutnya jalankan perintah berikut:
   ```bash
   cp .env.example .env

7. **Buka xampp**
   Buka xampp dan jalankan MySQL
   
8. **Seeding Database**
   Buat database dan isi database menggunakan seed dengan menjalankan perintah berikut:
   ```bash
   php artisan migrate --seed
   
9. **Jalankan Aplikasi**
   Jalankan aplikasi dengan perintah berikut:
   ```bash
   php artisan serve

   Jalankan Aplikasi dengan mengetikkan http://127.0.0.1:8000/ di url browser.
   

## API
1. **Return Data KTP**
   ```bash
   http://127.0.0.1:8000/api/data

2. **Return Data KTP dengan pencarian**
   kata kunci bisa berupa nama atau nik dari data yang ingin dicari.
   ```bash
   http://127.0.0.1:8000/api/search?keyword=[kata kunci]




   

   


