# ⛪ Sistem Informasi & Layanan Administrasi Jemaat HKBP Sigumpar

[![Laravel](https://img.shields.io/badge/Laravel-12.0-red?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-blue?style=for-the-badge&logo=php)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38bdf8?style=for-the-badge&logo=tailwind-css)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-6.x-646cff?style=for-the-badge&logo=vite)](https://vite.dev)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-orange?style=for-the-badge&logo=mysql)](https://mysql.com)

Sistem Informasi & Layanan Administrasi Jemaat **HKBP Sigumpar** adalah platform web modern berbasis **Laravel 12** yang dirancang untuk mendigitalisasi manajemen data jemaat, mempermudah pengajuan layanan sakramen/administrasi gereja, serta menyajikan warta dan jadwal ibadah secara terintegrasi bagi seluruh jemaat HKBP Sigumpar.

---

## 🚀 Fitur Utama

### 👥 1. Manajemen Jemaat & Statistik (Admin)
*   **Database Jemaat Terpusat:** Pengelolaan data jemaat secara aman (CRUD: *Create, Read, Update, Delete*).
*   **Statistik Penduduk Jemaat:** Visualisasi dan analisis demografi jemaat (usia, jenis kelamin, sektor pelayanan) untuk mempermudah perencanaan program pelayanan gereja.

### 📝 2. Layanan Administrasi Jemaat Online
Jemaat yang terautentikasi dapat mengajukan pendaftaran layanan gereja secara daring, mengunggah berkas persyaratan, dan melacak status pengajuannya:
*   **Pendaftaran Baptisan Kudus**
*   **Pendaftaran Sidi (Konfirmasi)**
*   **Pendaftaran Pernikahan (Pamasu-masuon)**
*   **Pendaftaran Rapor Meninggal (Pemakaman)**

### 🔔 3. Sistem Pemberitahuan & Tracking (Twilio & Web)
*   **Pemberitahuan Real-Time:** Jemaat menerima update status pengajuan layanan (Diterima / Ditolak beserta alasannya) langsung di halaman akun mereka.
*   **Integrasi SMS/WhatsApp (Twilio SDK):** Fitur pengiriman notifikasi otomatis ke nomor handphone jemaat untuk pengingat jadwal dan pembaruan berkas administrasi.

### 📅 4. Warta Jemaat & Jadwal Ibadah Dinamis
*   **Jadwal Ibadah:** Pengumuman jadwal ibadah minggu dan ibadah sektor (*Wijk*) dengan fitur pembaruan massal (*mass-update*) untuk admin.
*   **Warta Jemaat Digital:** Publikasi berita mingguan gereja, laporan keuangan, dan pengumuman penting yang dapat diakses langsung oleh publik tanpa login.

### 🛡️ 5. Manajemen Keamanan & Otentikasi Ganda
*   **Google OAuth (Laravel Socialite):** Memungkinkan jemaat login dengan cepat dan aman menggunakan akun Google mereka.
*   **Role-Based Access Control (Spatie Laravel Permission):** Pembagian hak akses yang ketat antara **Admin**, **Pendeta**, dan **Jemaat** untuk melindungi kerahasiaan data jemaat.
*   **Laravel Breeze Starter Kit:** Sistem login, registrasi, dan manajemen profil bawaan yang kokoh dan responsif.

---

## 🛠️ Tech Stack & Integrasi

*   **Framework Utama:** Laravel 12.x (PHP 8.2+)
*   **Starter Kit & Auth:** Laravel Breeze (Blade/Tailwind) & Laravel Socialite (Google OAuth)
*   **Sistem Otorisasi:** Spatie Laravel Permission
*   **Notifikasi SMS/WhatsApp:** Twilio PHP SDK
*   **Desain & UI:** Tailwind CSS & Alpine.js
*   **Build Tool:** Vite 6.x
*   **Database:** MySQL / SQLite

---

## 📂 Struktur Direktori Proyek

Aplikasi utama berada di dalam folder `psi-2425ge-03-hkbp-sigumpar`. Berikut adalah peta struktur kode penting:

```bash
psi-2425ge-03-hkbp-sigumpar/
├── app/
│   ├── Http/Controllers/      # Logika Kontroler (Auth, Layanan, Warta, Jemaat)
│   └── Models/                # Model Data Eloquent (User, LayananGereja, Jadwal, dll)
├── bootstrap/                 # Bootstrapping Laravel
├── config/                    # Konfigurasi Layanan (Auth, Spatie, Socialite, Twilio)
├── database/
│   ├── migrations/            # Skema Tabel Basis Data (Users, Jadwal, Layanan, dll)
│   └── seeders/               # Data Awal Sistem (Role, Profil Gereja, Tipe Layanan)
├── public/                    # Aset Publik (Gambar, CSS, JS terkompilasi)
├── resources/
│   ├── views/                 # Template Blade UI (Halaman Utama, Admin Dashboard, Profil)
│   └── css/                   # Pengaturan Tailwind CSS
├── routes/
│   ├── web.php                # Rute Halaman Utama & Akses Authenticated
│   └── auth.php               # Rute Registrasi & Login Breeze
└── vite.config.js             # Konfigurasi Kompilasi Vite
```

---

## ⚙️ Petunjuk Instalasi & Pengembangan Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan sistem di komputer lokal Anda:

### 1. Prasyarat Sistem
*   **PHP >= 8.2** terpasang di komputer Anda.
*   **Composer** untuk manajemen dependensi PHP.
*   **Node.js & NPM** untuk build asset frontend.
*   **MySQL Database** server (bisa menggunakan XAMPP, Laragon, atau MySQL Native).

### 2. Kloning Repositori
```bash
git clone https://github.com/ReinhardBatubara/gerejaversi2.git
cd gerejaversi2/psi-2425ge-03-hkbp-sigumpar
```

### 3. Pasang Dependensi
```bash
# Pasang dependensi PHP Laravel
composer install

# Pasang dependensi Frontend Javascript
npm install
```

### 4. Konfigurasi Lingkungan (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Buka file `.env` yang baru dibuat dan sesuaikan konfigurasi berikut:

*   **Database Config:**
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_hkbp_sigumpar
    DB_USERNAME=root
    DB_PASSWORD=
    ```
*   **Google OAuth Config (Laravel Socialite):**
    ```env
    GOOGLE_CLIENT_ID=your-google-client-id
    GOOGLE_CLIENT_SECRET=your-google-client-secret
    GOOGLE_REDIRECT_URI="${APP_URL}/login/google/callback"
    ```
*   **Twilio Config (SMS/WhatsApp):**
    ```env
    TWILIO_SID=your-twilio-sid
    TWILIO_AUTH_TOKEN=your-twilio-auth-token
    TWILIO_NUMBER=your-twilio-phone-number
    ```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Jalankan Migrasi Database & Seeder
Buat database kosong bernama `db_hkbp_sigumpar` di MySQL Anda, lalu jalankan perintah berikut untuk membuat tabel dan mengisi data awal (roles, default profiles, tipe layanan):
```bash
php artisan migrate --seed
```

### 7. Jalankan Server Pengembangan
Jalankan server PHP artisan dan Vite secara bersamaan menggunakan perintah shortcut:
```bash
# Menjalankan server Laravel & kompilasi aset frontend
composer dev
```
Atau jalankan secara terpisah di dua terminal berbeda:
```bash
# Terminal 1: Menjalankan backend Laravel
php artisan serve

# Terminal 2: Menjalankan kompilasi frontend Vite
npm run dev
```

Buka browser Anda dan akses aplikasi di **`http://127.0.0.1:8000`**.

---

## 🔑 Akun Uji Coba Default (Seeders)

Setelah menjalankan `php artisan db:seed`, Anda dapat menggunakan akun simulasi berikut untuk menguji sistem:

*   **Role Admin:**
    *   Email: `admin@drs.com` *(atau sesuai set di DatabaseSeeder)*
    *   Password: `password`
*   **Role Pendeta:**
    *   Email: `pendeta@drs.com`
    *   Password: `password`
*   **Role Jemaat:**
    *   Email: `jemaat@drs.com`
    *   Password: `password`

---

## 🏛️ Lisensi
Proyek ini dibuat untuk mendukung digitalisasi pelayanan gereja **HKBP Sigumpar** dan menggunakan lisensi open-source **MIT**.
