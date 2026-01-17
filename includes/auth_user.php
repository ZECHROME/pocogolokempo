<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /pocogolo/auth/login.php");
    exit;
}

if (!$_SESSION['email_verified']) {
    exit("Please verify your email before accessing documents.");
}