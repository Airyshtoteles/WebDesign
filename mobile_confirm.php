<?php
require_once __DIR__ . '/db.php';

$token = $_GET['token'] ?? '';
$tokenRow = null;
if ($token) $tokenRow = get_qr_token($token);

$error = '';
$confirmed_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $token = $_POST['token'] ?? '';
    $u = find_user_by_username($username);
    if ($u && password_verify($password, $u['password_hash'])) {
        confirm_qr_token_for_user($token, $u['id']);
        $confirmed_message = 'Berhasil dikonfirmasi. Tutup halaman ini dan lihat browser desktop.';
    } else {
        $error = 'Username atau password salah.';
    }
    $tokenRow = get_qr_token($token);
}

$page_title = 'Konfirmasi QR Login';
include __DIR__ . '/header.php';
?>
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm mb-3">
      <div class="card-body">
        <h3 class="mb-3">Konfirmasi QR Login</h3>
        <?php if (!$tokenRow): ?>
          <div class="alert alert-danger">Token tidak valid atau hilang.</div>
        <?php else: ?>
          <p class="mb-2"><strong>Status Token:</strong> <?=htmlspecialchars($tokenRow['status'])?></p>
          <?php if ($confirmed_message): ?>
            <div class="alert alert-success"><?=htmlspecialchars($confirmed_message)?></div>
          <?php elseif ($tokenRow['status'] === 'pending'): ?>
            <?php if ($error): ?><div class="alert alert-danger py-2 mb-3"><?=htmlspecialchars($error)?></div><?php endif; ?>
            <form method="post" novalidate>
              <input type="hidden" name="token" value="<?=htmlspecialchars($token)?>">
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input name="username" class="form-control" required autofocus>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Konfirmasi Login</button>
            </form>
          <?php else: ?>
            <div class="alert alert-info">Token sudah <?=htmlspecialchars($tokenRow['status'])?>.</div>
          <?php endif; ?>
        <?php endif; ?>
        <hr>
        <p class="text-center mb-0"><a href="login.php">Kembali ke Login</a></p>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '/footer.php'; ?>
