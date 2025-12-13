<?php
require_once __DIR__ . '/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $u = trim($_POST['username'] ?? '');
        $p = $_POST['password'] ?? '';
        if ($u === '' || $p === '') $error = 'Username dan password wajib.';
        else {
                $user = find_user_by_username($u);
                if ($user && password_verify($p, $user['password_hash'])) {
                        $_SESSION['user_id'] = $user['id'];
                        header('Location: index.php');
                        exit;
                } else {
                        $error = 'Username atau password salah.';
                }
        }
}
$page_title = 'Login';
include __DIR__ . '/header.php';
?>
<div class="auth-card card shadow-sm">
    <div class="card-body">
        <h3 class="mb-3">Login</h3>
        <?php if ($error): ?><div class="alert alert-danger py-2 mb-3"><?=htmlspecialchars($error)?></div><?php endif; ?>
        <form method="post" novalidate>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input name="username" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
        <hr>
        <p class="text-center mb-0"><a href="register.php">Daftar akun</a> &middot; <a href="qr_login.php">Login QR</a></p>
    </div>
</div>
<?php include __DIR__ . '/footer.php'; ?>
