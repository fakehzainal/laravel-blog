# Laravel Blog (Laravel 12 + Filament 4)

Aplikasi blog sederhana berbasis Laravel dengan:
- Frontend publik untuk membaca artikel
- Admin panel berbasis Filament untuk mengelola konten
- Data awal (dummy) melalui seeder agar bisa langsung dicoba

## Fitur Utama
- Halaman publik:
  - Landing page: `/`
  - Daftar artikel: `/blog`
  - Daftar kategori: `/categories`
  - Detail artikel: `/posts/{slug}`
  - Filter kategori: `/category/{slug}`
  - Filter tag: `/tag/{slug}`
- Admin panel Filament:
  - URL: `/admin`
  - Login admin
  - Manajemen data blog (resource Filament)

## Tech Stack
- PHP 8.2+
- Laravel 12
- Filament 4
- MySQL
- Vite + Tailwind CSS 4

## Kebutuhan Sistem
Pastikan sudah terpasang:
- PHP >= 8.2
- Composer
- Node.js + npm
- MySQL / MariaDB
- (Opsional) XAMPP jika menjalankan di Windows lokal

## Cara Menjalankan Project
1. Clone repository
```bash
git clone https://github.com/fakehzainal/laravel-blog.git
cd laravel-blog
```

2. Install dependency backend
```bash
composer install
```

3. Buat file environment
```bash
cp .env.example .env
```
Di Windows PowerShell:
```powershell
Copy-Item .env.example .env
```

4. Atur koneksi database di `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=
```

5. Generate app key
```bash
php artisan key:generate
```

6. Migrasi dan seed data
```bash
php artisan migrate
php artisan db:seed --force
```

7. Install dependency frontend
```bash
npm install
```

8. Jalankan aplikasi
- Terminal 1:
```bash
php artisan serve
```
- Terminal 2:
```bash
npm run dev
```

Aplikasi publik akan berjalan di:
- `http://127.0.0.1:8000`

Admin panel:
- `http://127.0.0.1:8000/admin`

## Akun Admin Default
Seeder membuat akun admin berikut:
- Email: `admin@blog.local`
- Password: `password`

## Screenshot
### Landing Page
<img width="1918" height="992" alt="image" src="https://github.com/user-attachments/assets/4b25a0ca-9415-4625-932a-dc82e30cb437" />

### Admin Panel
<img width="1919" height="1003" alt="image" src="https://github.com/user-attachments/assets/0af95cdf-f1c6-4557-ba4a-403b7f6bfdb9" />

## Struktur Folder Penting
- `app/Filament` -> Resource/Page/Widget Filament
- `app/Http/Controllers/BlogController.php` -> Controller frontend blog
- `app/Providers/Filament/AdminPanelProvider.php` -> Konfigurasi panel admin
- `resources/views/blog` -> Blade view frontend blog
- `routes/web.php` -> Route publik
- `database/seeders/BlogSeeder.php` -> Seeder data awal blog

## Troubleshooting
- `403 Forbidden` saat masuk admin:
  - Pastikan login lewat URL `/admin` (bukan `/dashboard`)
  - Jalankan:
```bash
php artisan optimize:clear
```
- Error koneksi database:
  - Pastikan MySQL aktif
  - Cek `DB_*` di `.env`
- Asset frontend tidak muncul:
  - Pastikan `npm run dev` berjalan

## Perintah Berguna
```bash
php artisan optimize:clear
php artisan test
npm run build
```

## Kontribusi
Pull request dipersilakan. Untuk perubahan besar, buat issue terlebih dahulu agar scope perubahan jelas.

## Lisensi
Project ini mengikuti lisensi [MIT](https://opensource.org/licenses/MIT).
