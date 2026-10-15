<?php
session_start();

$adminId = getenv('INFO_ADMIN_ID');
$adminPassword = getenv('INFO_ADMIN_PASSWORD');
$submittedId = (string) ($_POST['admin_id'] ?? '');
$submittedPassword = (string) ($_POST['password'] ?? '');

if (is_string($adminId) && $adminId !== '' &&
    is_string($adminPassword) && $adminPassword !== '' &&
    hash_equals($adminId, $submittedId) &&
    hash_equals($adminPassword, $submittedPassword)) {
    session_regenerate_id(true);
    $_SESSION['admin_logged_in'] = true;
    header('Location: adminpage.php');
    exit;
}

$_SESSION['error'] = 'Invalid admin ID or password.';
header('Location: adminlogin.php');
exit;
