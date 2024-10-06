<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ct275-project', 'root', 'H&s3GsHb');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error_message = 'Không thể kết nối đến CSDL';
    $reason = $e->getMessage();
    include 'show_error.php';

    include_once 'footer.php';
    exit();
}