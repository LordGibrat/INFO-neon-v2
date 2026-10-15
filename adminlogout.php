<?php
session_start();
unset($_SESSION['admin_logged_in']);
session_regenerate_id(true);
header('Location: adminlogin.php');
exit;
