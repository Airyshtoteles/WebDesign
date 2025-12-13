<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="dashboard-header">
    <h2>Selamat Datang di Best Hotel</h2>
    <p class="note">Nikmati pengalaman menginap terbaik dengan fasilitas lengkap dan pelayanan prima.</p>
</div>

<div class="gallery-grid">
    <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1551776235-dde6d4829808?q=80&w=800&auto=format&fit=crop" alt="Lobi Hotel">
        <div class="caption">Lobi Mewah</div>
    </div>
    <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop" alt="Kamar Tidur">
        <div class="caption">Kamar Nyaman</div>
    </div>
    <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1559599101-f09722fb4948?q=80&w=800&auto=format&fit=crop" alt="Kolam Renang">
        <div class="caption">Kolam Renang</div>
    </div>
    <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4?q=80&w=800&auto=format&fit=crop" alt="Restoran">
        <div class="caption">Restoran</div>
    </div>
    <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=800&auto=format&fit=crop" alt="Pusat Kebugaran">
        <div class="caption">Gym</div>
    </div>
    <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1521783988139-893ce889a8ad?q=80&w=800&auto=format&fit=crop" alt="Ruang Rapat">
        <div class="caption">Meeting Room</div>
    </div>
</div>

<div class="features-summary">
    <h3>Fasilitas Unggulan</h3>
    <div class="features-list">
        <div class="feature-card">
            <h4>Petualangan Alam</h4>
            <p>Jelajahi keindahan alam sekitar dengan paket trekking kami.</p>
            <a href="<?= base_url('fasilitas/petualangan') ?>" class="btn-small">Lihat Detail</a>
        </div>
        <div class="feature-card">
            <h4>Kolam Air Panas</h4>
            <p>Relaksasi tubuh dan pikiran di kolam air panas alami.</p>
            <a href="<?= base_url('fasilitas/air-panas') ?>" class="btn-small">Lihat Detail</a>
        </div>
        <div class="feature-card">
            <h4>Premium Pool</h4>
            <p>Area kolam eksklusif dengan cabana pribadi.</p>
            <a href="<?= base_url('fasilitas/premium') ?>" class="btn-small">Lihat Detail</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
