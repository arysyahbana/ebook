# Docker Setup — Ebook App

Dokumentasi ini menjelaskan cara kerja environment Docker project ini, serta catatan masalah yang pernah ditemukan dan cara mengatasinya.

## Struktur

```
docker/
├── php/
│   ├── Dockerfile
│   └── entrypoint.sh
├── nginx/
│   └── default.conf
docker-compose.yml
uploads.ini
```

## Services

| Service  | Image/Build           | Port host | Keterangan                          |
|----------|-----------------------|-----------|--------------------------------------|
| app      | build dari `docker/php/Dockerfile` | -         | PHP-FPM 8.2, Laravel                |
| nginx    | `nginx:alpine`        | 8001 → 81 | Reverse proxy ke `app`              |
| mysql    | `mysql:8`             | 3311 → 3306 | Database `ebook_db`                |

## Cara menjalankan (fresh install / server baru)

```bash
cp .env.example .env   # kalau belum ada .env (entrypoint juga auto-generate kalau lupa)
docker compose build --no-cache
docker compose up -d
docker compose logs -f app
```

Aplikasi bisa diakses di: `http://localhost:8001`

Semua langkah berikut berjalan **otomatis** lewat `entrypoint.sh` saat container `app` start:
1. Auto-generate `.env` kalau belum ada (copy dari `.env.example`, atau bikin minimal default).
2. Tunggu MySQL siap menerima koneksi.
3. Generate `APP_KEY` (hanya kalau `.env` belum punya key).
4. `php artisan migrate --force`
5. `php artisan db:seed --force`
6. Membuat default `Setting` kalau belum ada.
7. Cache config/route/view.
8. Set permission `storage` & `bootstrap/cache`.

## Catatan penting (hal yang pernah bikin error)

### 1. `vendor/autoload.php` not found
**Penyebab:** `docker-compose.yml` mem-bind mount seluruh project (`./:/var/www/html`), yang menimpa hasil `composer install` dan `npm ci` yang sudah dibuild di image.

**Fix:** tambahkan anonymous volume untuk melindungi folder hasil build supaya tidak ketiban bind mount host:

```yaml
services:
  app:
    volumes:
      - ./:/var/www/html
      - /var/www/html/vendor
      - /var/www/html/node_modules
```

⚠️ Kalau volume ini sudah pernah dibuat kosong (dari percobaan run sebelum fix ini dipasang), volume lama harus dihapus dulu:
```bash
docker compose down -v --remove-orphans
docker compose build --no-cache
docker compose up -d
```

### 2. `.env: No such file or directory`
**Penyebab:** `php artisan key:generate` butuh file fisik `.env`, bukan cuma environment variable dari `docker-compose.yml`.

**Fix:** `entrypoint.sh` sekarang auto-create `.env` (dari `.env.example`, atau minimal default) kalau belum ada, sebelum step apapun yang butuh Laravel config.

### 3. Container crash-loop — `Duplicate entry ... users_nim_unique`
**Penyebab:** `db:seed` dijalankan ulang setiap kali container restart, tapi seeder tidak idempotent (pakai insert biasa) → bentrok unique constraint pada restart kedua dan seterusnya → container exit 1 → `restart: unless-stopped` mencoba lagi → gagal lagi → infinite loop.

**Fix (2 lapis):**
- **Seeder** (`database/seeders/UserSeeder.php`) diubah pakai `updateOrCreate` (Eloquent) supaya aman dijalankan berkali-kali:
  ```php
  User::updateOrCreate(
      ['nim' => '111111'],
      [
          'name' => 'Admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('123'),
          'role' => 'Admin',
          'no_hp' => '',
          'alamat' => '',
          'jenis_kelamin' => 'Pria',
          'remember_token' => null,
      ]
  );
  ```
- **entrypoint.sh** juga dibuat tidak crash kalau `db:seed` tetap gagal karena sebab lain:
  ```bash
  if ! php artisan db:seed --force; then
      echo "WARNING: db:seed reported an error (likely data already seeded). Continuing startup."
  fi
  ```

## Kredensial default (development)

- **MySQL:** `ebook_user` / `secret`, database `ebook_db`
- **User admin (seeder):** nim `111111`, email `admin@gmail.com`, password `123`

> Ganti semua kredensial di atas sebelum deploy ke production. `docker-compose.yml` saat ini menyimpan password dalam plaintext di `environment:` — untuk production sebaiknya pindahkan ke `.env` + Docker secrets, atau minimal jangan commit ke repo publik.

## Perintah berguna

```bash
# Restart bersih total (hapus volume DB juga)
docker compose down -v --remove-orphans

# Rebuild image tanpa cache
docker compose build --no-cache app

# Masuk ke container app
docker compose exec app bash

# Jalankan artisan command manual
docker compose exec app php artisan migrate:status

# Lihat log realtime
docker compose logs -f app
```
