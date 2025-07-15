<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'restaurant');
define('SITEURL', 'http://localhost/multi-panel-restaurant-php/');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die('DB bağlantı hatası: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');
?>
