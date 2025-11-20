<?php
require_once __DIR__ . '/db.php';
require_login();
$user = current_user();
$page_title = 'Dashboard';
include __DIR__ . '/header.php';
?>
<div class="row">
	<div class="col-lg-8">
		<div class="card shadow-sm mb-3">
			<div class="card-body">
				<h3 class="card-title mb-3">Halo, <?=htmlspecialchars($user['username'])?></h3>
				<p>Anda sudah masuk. Ini adalah halaman terlindungi.</p>
				<a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
			</div>
		</div>
		<div class="card border-0 bg-light">
			<div class="card-body">
				<h5 class="mb-2">Login QR</h5>
				<p>Coba fitur login menggunakan QR code untuk perangkat lain.</p>
				<a href="qr_login.php" class="btn btn-primary btn-sm">Buka Halaman QR</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card shadow-sm">
			<div class="card-body">
				<h5>Info Akun</h5>
				<ul class="list-unstyled mb-0">
					<li><strong>ID:</strong> <?=htmlspecialchars($user['id'])?></li>
					<li><strong>Username:</strong> <?=htmlspecialchars($user['username'])?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php include __DIR__ . '/footer.php'; ?>
