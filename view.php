<?php
require __DIR__ . "/includes/auth_user.php";
require __DIR__ . "/config/db.php";

$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM documents WHERE id = ?");
$stmt->execute([$id]);
$doc = $stmt->fetch();

if (!$doc) {
    http_response_code(404);
    exit("File not found");
}

/* LOG VIEW */
$pdo->prepare(
    "INSERT INTO document_views (user_id, document_id) VALUES (?, ?)"
)->execute([$_SESSION['user_id'], $id]);

$file = __DIR__ . "/private/uploads/" . $doc['filename'];

if (!file_exists($file)) {
    exit("File missing on server");
}

header("Content-Type: application/pdf");
header("Content-Disposition: inline; filename=\"" . $doc['filename'] . "\"");
header("Content-Length: " . filesize($file));
readfile($file);
exit;