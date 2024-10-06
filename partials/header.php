<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_administrator($user = 'me')
{
    return (isset($_SESSION['user']) && ($_SESSION['user'] === $user));
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php
            if (defined('TITLE')) {
                echo TITLE;
            } else {
                echo 'Trang chủ';
            }
            ?></title>
</head>

<body>
    <header>
        <div class="d-flex flex-row justify-content-center" id="LogoContainer">
            <div id="Logo"></div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light" id="HeadNav">
            <div class="container-fluid m-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex flex-row justify-content-center" style="width: 100%">
                    <ul class="d-flex flex-row justify-content-evenly navbar-nav mb-2 mb-lg-0 gap-5 mx-3" style="width: 100%">
                        <li class="nav-item">
                            <a class="nav-link active fs-5" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sản phẩm
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                    require_once __DIR__ . '/../partials/db_connect.php';

                                    $querry = 'SELECT * FROM category';
                                    try {
                                        $statement = $pdo->prepare($querry);
                                        $statement->execute();
                                        
                                        while($rows = $statement->fetch()) {
                                            echo '<li><a class="dropdown-item" href="#">'. $rows['category_name'] .'</a></li>';
                                        } 
                                    } catch (PDOException $e) {
                                        $error_message = 'Không thể lấy dữ liệu';
                                        $reason = $e->getMessage();
                                        include __DIR__ . '/../partials/show_error.php';
                                    }
                                ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item fs-5" href="#">Sản phẩm khác</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="#">Tin tức và Ưu đãi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Về chúng tôi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Đội ngũ</a></li>
                                <li><a class="dropdown-item" href="#">Vị trí</a></li>
                                <li><a class="dropdown-item" href="#">Thông tin liên hệ</a></li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </nav>
        
    </header>
    <div id="container">
        <!-- BEGIN CHANGEABLE CONTENT. -->