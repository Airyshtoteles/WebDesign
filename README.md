## Setup Aplikasi (MySQL XAMPP)

Proyek ini awalnya memakai SQLite. Sudah dimigrasikan ke MySQL (XAMPP). Ikuti langkah berikut:

1. Jalankan XAMPP dan aktifkan `Apache` serta `MySQL`.
2. Buka phpMyAdmin dan buat database baru dengan nama `tugas_app` (atau ubah nama di `db.php`).
3. Pastikan kredensial MySQL standar XAMPP: user `root` tanpa password. Jika berbeda, sesuaikan variabel `$DB_USER` dan `$DB_PASS` di `db.php`.
4. Jalankan sekali skrip inisialisasi untuk membuat tabel dan user demo:

```bash
php init_db.php
```

5. Akses aplikasi melalui browser (misal `http://localhost/Modul6/tugas/login.php`).

### Akun Demo
Setelah inisialisasi, tersedia akun:
- Username: `demo`
- Password: `demo123`

### Struktur Tabel Utama
`users`:
- id (INT, AUTO_INCREMENT)
- username (UNIQUE)
- password_hash
- created_at (UNIX timestamp)

`qr_tokens`:
- id (INT, AUTO_INCREMENT)
- token (UNIQUE)
- user_id (nullable, FK ke users.id)
- status (pending|confirmed|used|expired)
- created_at, expires_at (UNIX timestamp)

### Fitur
- Login biasa (username & password)
- Registrasi user baru
- Login menggunakan QR (generate token, konfirmasi via perangkat lain)

### Migrasi dari SQLite
Perubahan utama:
- `db.php` sekarang memakai PDO MySQL (`mysql:host=...`).
- `init_db.php` membuat tabel dengan tipe MySQL (InnoDB, charset utf8mb4).
- Ditambahkan indeks dan foreign key untuk performa & integritas.

### Tampilan/Styling
Ditambahkan Bootstrap 5 melalui CDN dan komponen `header.php` serta `footer.php` agar tampilan lebih konsisten.

### Kustomisasi Lanjut
- Ubah nama database atau kredensial di `db.php`.
- Tambah field baru (misal email) dengan ALTER TABLE lalu sesuaikan form di `register.php`.

### Troubleshooting
- Jika `php init_db.php` error: cek apakah database sudah dibuat dan kredensial benar.
- Jika karakter aneh muncul: pastikan `charset=utf8mb4` tetap ada di DSN.

# Secure PHP Login with Password Hashing and QR Login (Demo)

This demo implements:
- Password-based registration and login using `password_hash` and `password_verify`.
- A simple QR-login flow where the web page shows a QR for a one-time token, the mobile scanner opens a confirmation page, and the desktop polls and consumes the token to create a session.
- SQLite for simplicity (no MySQL setup required). Works on XAMPP/PHP.

Files added:
- `init_db.php` — initialize database and create demo user (`demo` / `demo123`).
- `db.php` — DB helper and QR token helpers.
- `register.php`, `login.php`, `logout.php`, `index.php` — auth pages.
- `qr_login.php` — shows QR and polls for confirmation.
- `mobile_confirm.php` — page opened when scanning QR to confirm login.
- `api/poll_qr.php`, `api/consume_qr.php` — AJAX endpoints.

Setup (XAMPP on Windows):

1. Start Apache in XAMPP.
2. Put the `tugas` folder in `c:\xampp\htdocs\Modul6\tugas` (already placed here).
3. In your browser open: `http://localhost/Modul6/tugas/init_db.php` to create the SQLite DB and demo user.
4. Visit `http://localhost/Modul6/tugas/login.php`.

Demo credentials:
- username: `demo`
- password: `demo123`

QR-login usage:
1. Open `qr_login.php` in the desktop browser.
2. Scan the QR with your phone; it opens a confirmation page where you enter username/password to authorize.
3. Once confirmed, the desktop page detects confirmation and logs you into `index.php`.

Notes & security considerations:
- This is a demo. For production:
  - Use HTTPS.
  - Protect against CSRF.
  - Use server-side rate limiting and strong token lifetimes.
  - Consider using a push notification or OAuth flow for mobile confirmation rather than asking credentials on a mobile page.
