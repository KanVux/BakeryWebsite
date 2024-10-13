<?php
define("TITLE", "Sản phẩm");
include_once __DIR__ . '/../partials/header.php';
?>
<section class="Title py-3">
    <div class="container">
        <h2 class="text-center">Sản phẩm</h2>
    </div>
</section>
<section class="section-products mb-5">
    <div class="container pt-3">
        <div class="row">
            <div class="col-3">
                <ul class="list-unstyled">
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#priceTag">
                            <h5 class="mx-1 m-0">GIÁ THÀNH</h5>
                        </button>
                        <div class="collapse show" id="priceTag">
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="priceRange1">
                                <label for="priceRange1">100.000 - 300.000</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="priceRange2">
                                <label for="priceRange2">300.000 - 500.000</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="priceRange3">
                                <label for="priceRange3">500.000 - 700.000</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="priceRange4">
                                <label for="priceRange4">700.000 - 1.000.000</label>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#sizeTag">
                            <h5 class="mx-1 m-0">KÍCH THƯỚC</h5>
                        </button>
                        <div class="collapse show" id="sizeTag">
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="size1">
                                <label for="size1">16cm</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="size2">
                                <label for="size2">20cm</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="size3">
                                <label for="size3">24cm</label>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#flavourTag">
                            <h5 class="mx-1 m-0">HƯƠNG VỊ</h5>
                        </button>
                        <div class="collapse show" id="flavourTag">
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="flavour1">
                                <label for="flavour1">Sôcôla</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="flavour2">
                                <label for="flavour2">Dâu</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="flavour3">
                                <label for="flavour3">Matcha</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="flavour4">
                                <label for="flavour4">Phô mai</label>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#shapeTag">
                            <h5 class="mx-1 m-0">HÌNH DẠNG</h5>
                        </button>
                        <div class="collapse show" id="shapeTag">
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="shape1">
                                <label for="shape1">Mẫu có sẵn hằng ngày</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input" id="shape2">
                                <label for="shape2">Mẫu đặt trước</label>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <?php
                // Fetch products from the database
                require_once __DIR__ . '/../partials/db_connect.php';
                $query = 'SELECT product_name, price, product_description, product_img FROM product;';
                try {
                    $statement = $pdo->prepare($query);
                    $statement->execute();

                    echo '<div class="container"><div class="row">'; // Start the grid container and row
                
                    while ($rows = $statement->fetch()) {
                        // Display product cards in a grid format
                        echo '
                <div class="col-12 col-sm-6 col-lg-3 mb-4"> <!-- Adjust column size based on screen size -->
                    <div class="card p-0 border-0 h-100">
                        <img src="/images/' . htmlspecialchars($rows['product_img']) . '" class="card-img-top" alt="Product Image">
                        <div class="card-body d-flex flex-column justify-content-between">
                            
                                <h5 class="card-title">' . htmlspecialchars($rows['product_name']) .'</h5>
                                <p class="card-text">' . htmlspecialchars($rows['product_description']) .'</p>
                                <div class="d-flex flex-column"> 
                                    <h3 class="text-success">' . htmlspecialchars($rows['price']) . ' VND</h3>
                                    <button class="btn btn-warning border border-secondary shadow-sm">Buy Now</button>
                                </div>
                        </div>
                    </div>
                </div>';
                    }

                    echo '</div></div>'; // Close the grid row and container
                
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="section-banner">
    <div class="container bg-warning-subtle">
        <div class="row align-items-center border rounded-2">
            <div class="col-6 p-0">
                <img src="images/aboutus3.jpg" alt="" class="img-fluid rounded-start-2">
            </div>
            <div class="col-6">
                <h4 class="text-center p-1">Cửa hàng Kan Bakery gần tôi</h4>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary btn-lg">
                        Tìm kiếm
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-bestsellers mb-5">
    <div class="text-center">
        <h1>Best Sellers</h1>
    </div>
    <div class="container-fluid p-3">
        <div class="container">
            <div id="productCarousel" class="carousel slide carousel-dark" data-bs-ride="carousel">
                <!-- Carousel Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1" style="background-color: white;"></button>
                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                        style="background-color: white;"></button>
                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                        style="background-color: white;"></button>
                </div>

                <!-- Carousel Inner -->
                <div class="carousel-inner">
                    <?php
                    // Fetch products from the database
                    require_once __DIR__ . '/../partials/db_connect.php';
                    $query = 'SELECT product_name, price, product_description, product_img FROM product LIMIT 12;';
                    try {
                        $statement = $pdo->prepare($query);
                        $statement->execute();
                        $counter = 0;

                        while ($rows = $statement->fetch()) {
                            // Start a new carousel item every 4 items
                            if ($counter % 4 == 0) {
                                echo $counter === 0 ? '<div class="carousel-item active"><div class="d-flex justify-content-between">' : '</div></div><div class="carousel-item"><div class="d-flex justify-content-start">';
                            }

                            // Display product cards
                            echo '
                                <div class="col-12 col-sm-6 col-lg-3 px-2">
                                    <div class="card p-0 border-0">
                                        <img src="/images/' . $rows['product_img'] . '" class="card-img-top" alt="Product Image">
                                        <div class="card-body">
                                            <div class="d-flex flex-column justify-content-between card-content">
                                                <h5 class="card-title">' . $rows['product_name'] . '</h5>
                                                <p class="card-text">' . $rows['product_description'] . '</p>
                                                <div class="d-flex justify-content-between">
                                                    <h3 class="text-success">' . $rows['price'] . ' VND</h3>
                                                    <button class="btn btn-warning border border-secondary shadow-sm">Buy Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            $counter++;
                        }

                        // Close any open carousel items
                        if ($counter % 4 !== 0) {
                            echo '</div></div>';
                        }

                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                    data-bs-slide="prev" style="right: 30px;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                    data-bs-slide="next">
                    <span class="position-absolute carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

<?php
include_once __DIR__ . '/../partials/footer.php';
?>