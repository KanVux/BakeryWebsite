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
        <div class="d-flex flex-column">
            <div class="container-fluid search-box-container ">
                <div class="d-flex justify-content-end container py-2 gap-2">
                    <!-- <form class="align-content-center input-group p-3 search-box">
                        <input type="text" class="form-control border-end-0 rounded-0 rounded-start border-secondary" placeholder="Tìm kiếm...">
                        <button type="submit" class="btn rounded-0 rounded-end border-secondary"><i class="fa fa-search"></i></button>
                    </form> -->
                    <div>
                        <a href="products.php" class="link-dark text-decoration-none">
                            <div class="icon-container align-content-center rounded-circle text-center border border-secondary">
                                <i class="fa fa-solid fa-magnifying-glass"></i>
                            </div>
                        </a> 
                    </div>
                    <div>
                        <a href="#" class="link-dark text-decoration-none">
                            <div class="icon-container align-content-center rounded-circle text-center border border-secondary">
                                <i class="fa fa-solid fa-cart-shopping"></i>
                            </div>
                        </a> 
                    </div>
                    <div class="dropdown text-end align-content-center">
                        <a href="#" class="link-dark text-decoration-none" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="icon-container align-content-center rounded-circle text-center border border-secondary">
                                <i class="fa fa-user"></i>
                            </div>
                        </a> 
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser" style="">
                        <li><a class="dropdown-item" href="login.php">Tài khoản</a></li>
                        <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                    </ul>
                    </div>

                </div>
            </div>
            <div class="d-flex flex-row justify-content-center" id="LogoContainer">
                <div id="Logo"></div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light" id="HeadNav">
            <div class="container-fluid m-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-evenly" id="navbarContent">
                    <div class="d-flex flex-row">
                    <ul class="navbar-nav mb-2 mb-lg-0 gap-5 mx-3" >
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="index.php">Trang chủ</a>
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
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="aboutus.php"  role="button">
                                Về chúng tôi
                            </a>
                        </li>            
                    </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="container">
        <!-- BEGIN CHANGEABLE CONTENT. -->