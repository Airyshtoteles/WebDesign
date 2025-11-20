<?php
require_once __DIR__ . '/db.php';

// Pastikan database sudah dibuat secara manual di phpMyAdmin atau gunakan user root tanpa password.
// Script ini hanya memastikan tabel-tabel yang diperlukan tersedia.

$db = get_db();

$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at INT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$db->exec("CREATE TABLE IF NOT EXISTS qr_tokens (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    token VARCHAR(64) NOT NULL UNIQUE,
    user_id INT UNSIGNED NULL,
    status VARCHAR(20) NOT NULL,
    created_at INT UNSIGNED NOT NULL,
    expires_at INT UNSIGNED NOT NULL,
    INDEX (token),
    INDEX (status),
    INDEX (expires_at),
    CONSTRAINT fk_qr_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$existing = find_user_by_username('demo');
if (!$existing) {
    $stmt = $db->prepare('INSERT INTO users (username, password_hash, created_at) VALUES (:u, :p, :c)');
    $stmt->execute([
        ':u' => 'demo',
        ':p' => password_hash('demo123', PASSWORD_DEFAULT),
        ':c' => time()
    ]);
    echo "Demo user created: username='demo' password='demo123'\n";
} else {
    echo "Demo user already exists\n";
}

echo "Init complete. MySQL database '{$DB_NAME}' siap digunakan.\n";

?>
