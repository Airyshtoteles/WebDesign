<?php
require_once __DIR__ . '/db.php';

$token = create_qr_token(180); // 3 menit
$confirm_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/mobile_confirm.php?token=' . $token;
$qr_api = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($confirm_url);

$page_title = 'Login QR';
include __DIR__ . '/header.php';
?>
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm mb-3">
      <div class="card-body text-center">
        <h3 class="mb-3">Login dengan QR</h3>
        <p class="text-muted">Scan QR ini menggunakan ponsel Anda lalu login untuk mengonfirmasi.</p>
        <img class="img-fluid mb-3" src="<?=htmlspecialchars($qr_api)?>" alt="QR code">
        <div id="status" class="fw-semibold">Menunggu konfirmasi...</div>
        <hr>
        <a href="login.php" class="btn btn-outline-secondary btn-sm">Kembali ke Login</a>
      </div>
    </div>
  </div>
</div>
<script>
  function poll() {
    fetch('api/poll_qr.php?token=<?=htmlspecialchars($token)?>')
      .then(r=>r.json())
      .then(js=>{
        if (js.status === 'confirmed') {
          fetch('api/consume_qr.php?token=<?=htmlspecialchars($token)?>')
            .then(r=>r.json())
            .then(res=>{
              if (res.success) location.href = 'index.php';
              else alert('Gagal konsumsi token');
            });
        } else if (js.status === 'expired') {
          document.getElementById('status').textContent = 'Token kadaluarsa. Reload untuk mencoba lagi.';
        }
      })
      .catch(e=>console.error(e));
  }
  setInterval(poll, 2000);
</script>
<?php include __DIR__ . '/footer.php'; ?>
