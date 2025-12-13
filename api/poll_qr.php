<?php
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');
$token = $_GET['token'] ?? '';
if (!$token) { echo json_encode(['error' => 'missing token']); exit; }
$row = get_qr_token($token);
if (!$row) { echo json_encode(['status' => 'invalid']); exit; }
echo json_encode(['status' => $row['status']]);
?>
