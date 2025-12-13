<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

    <!-- Header -->
    <header class="site-header">
        <div class="brand">
            <h1>BEST HOTEL</h1>
            <p>Queen Best Hotel</p>
        </div>
        <button id="themeToggle" class="theme-toggle" aria-label="Ubah tema">🌙 Gelap</button>
        
        <!-- Navigation -->
        <nav class="menu">
            <ul class="menu-root">
                <li><a href="<?= base_url('/') ?>" class="<?= ($page == 'home') ? 'active' : '' ?>">Home</a></li>
                <li><a href="<?= base_url('kamar') ?>" class="<?= ($page == 'kamar') ? 'active' : '' ?>">Kamar</a></li>
                <li class="has-sub">
                    <a href="#">Fasilitas</a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('fasilitas') ?>">Daftar Fasilitas (Tabel)</a></li>
                        <li><a href="<?= base_url('fasilitas/petualangan') ?>">Petualangan Alam</a></li>
                        <li class="has-sub">
                            <a href="#">Kolam Renang ▸</a>
                            <ul class="submenu">
                                <li><a href="<?= base_url('fasilitas/air-panas') ?>">Sumber Air Panas</a></li>
                                <li class="has-sub">
                                    <a href="#">Kolam Anak &amp; Dewasa ▸</a>
                                    <ul class="submenu">
                                        <li><a href="<?= base_url('fasilitas/reguler') ?>">Reguler</a></li>
                                        <li><a href="<?= base_url('fasilitas/premium') ?>">Premium</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url('fasilitas/kebugaran') ?>">Pusat Kebugaran</a></li>
                        <li><a href="<?= base_url('fasilitas/ruang-rapat') ?>">Ruang Rapat</a></li>
                    </ul>
                </li>
                <li class="cta"><a href="<?= base_url('pemesanan') ?>">Pesan Sekarang</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Layout -->
    <main class="layout">
        <!-- Sidebar / Leftbar -->
        <aside class="leftbar">
            <h2>Video Promo</h2>
            <div class="video-container">
                <iframe class="video" src="https://www.youtube.com/embed/ysz5S6PUM-U" title="Promo Hotel" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            
            <div class="sidebar-widget">
                <h3>Info Terkini</h3>
                <p>Nikmati promo diskon 20% untuk pemesanan di bulan Oktober!</p>
            </div>
        </aside>

        <!-- Content Area -->
        <section class="content">
            <?= $this->renderSection('content') ?>
        </section>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        &copy; <?= date('Y') ?> Queen Best Hotel. All Rights Reserved.
    </footer>

    <script>
        // Simple Theme Toggle Script
        (function(){
            const root = document.documentElement;
            const btn = document.getElementById('themeToggle');
            const saved = localStorage.getItem('theme') || 'dark';
            
            function updateTheme(theme){
                root.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);
                if(btn) btn.textContent = theme === 'dark' ? '🌙 Gelap' : '☀️ Terang';
            }
            
            updateTheme(saved);
            
            if(btn){
                btn.addEventListener('click', () => {
                    const current = root.getAttribute('data-theme');
                    updateTheme(current === 'dark' ? 'light' : 'dark');
                });
            }
        })();
    </script>
</body>
</html>
