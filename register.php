<?php
require_once __DIR__ . '/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $u = trim($_POST['username'] ?? '');
        $p = $_POST['password'] ?? '';
        if ($u === '' || $p === '') $error = 'Username dan password wajib.';
        else {
                $db = get_db();
                $stmt = $db->prepare('INSERT INTO users (username, password_hash, created_at) VALUES (:u, :p, :c)');
                try {
                        $stmt->execute([':u' => $u, ':p' => password_hash($p, PASSWORD_DEFAULT), ':c' => time()]);
                        header('Location: login.php');
                        exit;
                } catch (Exception $e) {
                        $error = 'Username sudah digunakan.';
                }
        }
}
$page_title = 'Register';
include __DIR__ . '/header.php';
?>
<div class="auth-card card shadow-sm">
    <div class="card-body">
        <h3 class="mb-3">Registrasi</h3>
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
            <button type="submit" class="btn btn-success w-100">Daftar</button>
        </form>
        <hr>
        <p class="text-center mb-0"><a href="login.php">Sudah punya akun? Login</a></p>
    </div>
</div>
<?php include __DIR__ . '/footer.php'; ?>
