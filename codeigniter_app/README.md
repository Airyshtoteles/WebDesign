# CodeIgniter 4 Dashboard Project

Ini adalah implementasi desain dashboard responsif menggunakan struktur CodeIgniter 4, sesuai dengan tugas Modul 1.

## Struktur Folder

- `app/Controllers/Home.php`: Controller utama untuk halaman dashboard.
- `app/Views/layout/main.php`: Template utama (Header, Navigasi, Sidebar, Footer).
- `app/Views/dashboard.php`: Konten halaman dashboard (Gallery, Fasilitas).
- `public/assets/css/style.css`: Stylesheet CSS responsif dengan tema gelap/terang.
- `app/Config/Routes.php`: Konfigurasi routing.

## Cara Penggunaan

1.  Pastikan Anda memiliki instalasi CodeIgniter 4 yang berfungsi (via Composer atau Manual).
2.  Salin folder `app` dan `public` dari direktori ini ke dalam root project CodeIgniter 4 Anda.
3.  Jalankan server development:
    ```bash
    php spark serve
    ```
4.  Buka browser di `http://localhost:8080`.

## Fitur

-   **Responsif**: Menggunakan CSS Grid dan Flexbox untuk layout yang menyesuaikan ukuran layar (Mobile/Desktop).
-   **Templating**: Menggunakan fitur `View Layouts` CodeIgniter 4 (`extend`, `section`, `renderSection`) untuk struktur kode yang bersih.
-   **Tema Gelap/Terang**: Dilengkapi dengan toggle tema yang persisten menggunakan LocalStorage.
-   **Navigasi Bertingkat**: Menu dropdown CSS murni yang responsif.
