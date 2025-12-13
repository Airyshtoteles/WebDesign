<?php
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');
$token = $_GET['token'] ?? '';
if (!$token) { echo json_encode(['success' => false, 'error' => 'missing token']); exit; }
$user_id = consume_qr_token($token);
if (!$user_id) { echo json_encode(['success' => false, 'error' => 'invalid or not confirmed']); exit; }
// create session for this browser
$_SESSION['user_id'] = $user_id;
echo json_encode(['success' => true]);
?>
