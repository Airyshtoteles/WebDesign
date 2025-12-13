<?php
session_start();

// Konfigurasi MySQL (ubah sesuai kebutuhan XAMPP Anda)
$DB_HOST = 'localhost';
$DB_NAME = 'tugas_app';
$DB_USER = 'root';
$DB_PASS = ''; // default XAMPP biasanya kosong

function get_db() {
    global $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS;
    static $db = null;
    if ($db === null) {
        $dsn = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4";
        $db = new PDO($dsn, $DB_USER, $DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $db;
}

function find_user_by_username($username) {
    $db = get_db();
    $stmt = $db->prepare('SELECT * FROM users WHERE username = :u LIMIT 1');
    $stmt->execute([':u' => $username]);
    return $stmt->fetch();
}

function require_login() {
    if (empty($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
}

function current_user() {
    if (empty($_SESSION['user_id'])) return null;
    $db = get_db();
    $stmt = $db->prepare('SELECT id, username FROM users WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $_SESSION['user_id']]);
    return $stmt->fetch();
}

function create_qr_token($ttl_seconds = 300) {
    $db = get_db();
    $token = bin2hex(random_bytes(16));
    $stmt = $db->prepare('INSERT INTO qr_tokens (token, status, created_at, expires_at) VALUES (:t, :s, :c, :e)');
    $now = time();
    $stmt->execute([
        ':t' => $token,
        ':s' => 'pending',
        ':c' => $now,
        ':e' => $now + $ttl_seconds
    ]);
    return $token;
}

function get_qr_token($token) {
    $db = get_db();
    $stmt = $db->prepare('SELECT * FROM qr_tokens WHERE token = :t LIMIT 1');
    $stmt->execute([':t' => $token]);
    $row = $stmt->fetch();
    if (!$row) return null;
    if ($row['expires_at'] < time() && $row['status'] === 'pending') {
        $stmt = $db->prepare('UPDATE qr_tokens SET status = :s WHERE token = :t');
        $stmt->execute([':s' => 'expired', ':t' => $token]);
        $row['status'] = 'expired';
    }
    return $row;
}

function confirm_qr_token_for_user($token, $user_id) {
    $db = get_db();
    $stmt = $db->prepare('UPDATE qr_tokens SET status = :s, user_id = :uid WHERE token = :t');
    return $stmt->execute([':s' => 'confirmed', ':uid' => $user_id, ':t' => $token]);
}

function consume_qr_token($token) {
    $db = get_db();
    $row = get_qr_token($token);
    if (!$row) return false;
    if ($row['status'] !== 'confirmed') return false;
    $stmt = $db->prepare('UPDATE qr_tokens SET status = :s WHERE token = :t');
    $stmt->execute([':s' => 'used', ':t' => $token]);
    return $row['user_id'];
}

?>
