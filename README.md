# ⛪ PSI - Monorepo Sistem Informasi Gereja HKBP Nomensen Sigumpar

[![Laravel Version](https://img.shields.io/badge/Laravel-%3E%3D%2010.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D%208.1-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Database](https://img.shields.io/badge/Database-MySQL-blue?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)
[![Developer](https://img.shields.io/badge/Developer-Reinhard%20Batubara-Green?style=for-the-badge)](https://github.com/ReinhardBatubara)

Repository ini merupakan **Monorepo** yang memuat seluruh riwayat pengembangan **Sistem Informasi Gereja HKBP Nomensen Sigumpar** yang dibangun sebagai bagian dari mata kuliah/proyek **Proyek Sistem Informasi (PSI)**. Sistem ini dirancang untuk mendigitalisasi administrasi gereja dan memudahkan komunikasi serta pelayanan bagi jemaat dan pengurus gereja (Sintua/Pendeta).

Penggabungan seluruh repositori terpisah dilakukan dengan **mempertahankan riwayat commit asli (Git Commit History)** dari masing-masing repositori asal untuk menjaga dokumentasi historis pengerjaan kode.

---

## 📂 Struktur Monorepo (Merged Repositories)

Monorepo ini menyatukan 3 iterasi repositori pengembangan ke dalam sub-direktori berikut:

### 1. [gerejaversi3](gerejaversi3)
*   **Deskripsi**: Iterasi final dan stabil dari sistem informasi HKBP Sigumpar. Memuat fitur autentikasi Google OAuth API (`authentikasi google`) dan basis sistem yang siap digunakan secara publik (`Gereja HKBP FINAL 2025`).
*   **Lokasi Direktori**: `gerejaversi3/`

### 2. [HKBP-Nomensen-Sigumpar](HKBP-Nomensen-Sigumpar)
*   **Deskripsi**: Versi publikasi utama dengan optimalisasi performa query data jemaat, perbaikan UI dashboard jemaat, dan layout warta jemaat berbasis web responsive.
*   **Lokasi Direktori**: `HKBP-Nomensen-Sigumpar/`

### 3. [gerejaversi2](gerejaversi2)
*   **Deskripsi**: Iterasi pengembangan tahap menengah yang memetakan modul CRUD dasar untuk administrasi, penjadwalan ibadah, dan registrasi pelayanan gereja.
*   **Lokasi Direktori**: `gerejaversi2/`

---

## ✨ Fitur Utama Sistem Informasi Gereja

*   **Manajemen Data Jemaat**: Pendataan informasi jemaat berdasarkan kepala keluarga, status keanggotaan (aktif, pindah, meninggal), serta statistik demografi jemaat.
*   **Sistem Pelayanan Gereja**: Pendaftaran layanan sakramen digital secara mandiri oleh jemaat (seperti Baptis Kudus, Pernikahan, RPP/Naik Sidi, dll.) yang dapat diverifikasi oleh admin gereja.
*   **Penjadwalan & Warta Jemaat**: Publikasi jadwal ibadah mingguan, penugasan liturgi para Sintua, laporan keuangan gereja, serta file warta jemaat digital.
*   **Portal Informasi & Profile**: Halaman beranda interaktif yang menyajikan sejarah gereja, kepengurusan (organisasi), jadwal kegiatan sosial/pelayanan, serta galeri dokumentasi kegiatan gereja.
*   **Manajemen Akun Dinamis**: Hak akses bertingkat antara **Super Admin/Pendeta**, **Admin/Sintua** (mengelola data dan persetujuan layanan), dan **Jemaat/Masyarakat** (mengajukan layanan dan melihat informasi).

---

## 🛠️ Stack Teknologi

*   **Backend Framework**: Laravel 10.x / 11.x (PHP >= 8.1)
*   **Frontend UI**: Blade Templating Engine, Tailwind CSS (Styling), JavaScript (Interaktivitas UI)
*   **Database**: MySQL / MariaDB
*   **Integrasi Pihak Ketiga**: Google OAuth API Client (untuk login cepat menggunakan akun Google)
*   **Package Manager**: Composer (PHP) & NPM (Node.js)

---

## 🚀 Panduan Instalasi Lokal

Untuk menjalankan salah satu versi proyek (misalnya `HKBP-Nomensen-Sigumpar`), ikuti langkah-langkah di bawah ini:

### 1. Prasyarat (Prerequisites)
Pastikan server lokal Anda telah terinstal:
*   PHP (versi >= 8.1)
*   Composer
*   Node.js & NPM
*   MySQL Server (XAMPP / Laragon)

### 2. Konfigurasi Awal Proyek
Masuk ke sub-direktori proyek:
```bash
cd HKBP-Nomensen-Sigumpar
```

Salin file environment configuration:
```bash
cp .env.example .env
```
Buka file `.env` dan sesuaikan pengaturan koneksi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_gereja
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Instal Dependensi
Jalankan instalasi dependensi PHP dan Node:
```bash
composer install
npm install
```

### 4. Setup Key & Database
Generate application key:
```bash
php artisan key:generate
```

Lakukan migrasi skema database beserta data awal (seeder):
```bash
php artisan migrate --seed
```

### 5. Jalankan Aplikasi
Jalankan kompilasi aset frontend Tailwind CSS dan server lokal Laravel:
```bash
# Terminal 1: Kompilasi aset (Vite)
npm run dev

# Terminal 2: Server Laravel
php artisan serve
```
Aplikasi dapat diakses melalui browser Anda di alamat: `http://127.0.0.1:8000`

---

## 👤 Pengembang (Developer)

*   **Nama**: Reinhard Batubara
*   **Pendidikan**: S1 Sistem Informasi - Institut Teknologi Del
*   **GitHub**: [@ReinhardBatubara](https://github.com/ReinhardBatubara)
*   **Email**: [reinhardbatubara607@gmail.com](mailto:reinhardbatubara607@gmail.com)

---
*Dibuat sebagai bagian dari Proyek Sistem Informasi (PSI) - Institut Teknologi Del.*
