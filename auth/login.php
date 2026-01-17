<?php
session_start();
require __DIR__ . "/../config/db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /pocogolo/index.php");
    exit;
}

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    exit("Missing credentials");
}

/* CHECK ADMIN FIRST */
$stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
$stmt->execute([$email]);
$admin = $stmt->fetch();

if ($admin && password_verify($password, $admin['password'])) {
    $_SESSION['admin'] = true;
    $_SESSION['role']  = 'admin';
    header("Location: /pocogolo/documents.php");
    exit;
}

/* CHECK USER */
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user || !password_verify($password, $user['password'])) {
    exit("Invalid login");
}

if (!$user['email_verified']) {
    exit("Please verify your email before logging in.");
}

/* LOGIN USER */
$_SESSION['user_id']        = $user['id'];
$_SESSION['user_email']     = $user['email'];
$_SESSION['email_verified'] = true;
$_SESSION['role']           = 'user';

header("Location: /pocogolo/documents.php");
exit;