<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Kamar</title>
    <link rel="stylesheet" href="<?= base_url('css/admin-style.css') ?>">
</head>
<body>
    <div class="form-container">
        <form action="<?= base_url('admin/kamar/store') ?>" method="POST" enctype="multipart/form-data">
            <h2>Form Tambah Data Kamar</h2>
            
            <div class="form-group">
                <label for="id_kamar">ID Kamar</label>
                <input type="text" id="id_kamar" name="id_kamar" required>
            </div>
            
            <div class="form-group">
                <label for="gambar_ruangan">Gambar Ruangan</label>
                <input type="file" id="gambar_ruangan" name="gambar_ruangan" accept="image/*">
            </div>
            
            <div class="form-group">
                <label for="jenis_kamar">Jenis Kamar</label>
                <select id="jenis_kamar" name="jenis_kamar" required>
                    <option value="">-- Pilih Jenis Kamar --</option>
                    <option value="standard">Standard</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="suite">Suite</option>
                    <option value="president">President Suite</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" placeholder="Contoh: 500000" min="0" required>
            </div>
            
            <div class="form-group">k
                <label for="fasilitas">Fasilitas Kamar (pisahkan dengan koma)</label>
                <textarea id="fasilitas" name="fasilitas" placeholder="Contoh: AC, TV, WiFi, Kamar Mandi Dalam"></textarea>
            </div>
            
            <button type="submit" class="btn-submit">Simpan Data Kamar</button>
        </form>
    </div>
</body>
</html>
