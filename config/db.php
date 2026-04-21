<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=demo;charset=utf8',
    'app_user',
    'strong_password'
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>