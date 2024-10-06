<?php
    include_once __DIR__ . '/../partials/header.php';
    include_once __DIR__ . '/../partials/db_connect.php';
?>
     <section>
            <div class="carousel slide" id="carouselExample" data-bs-ride="carousel">
                <!-- Carousel Indicators -->
                <div class="carousel-indicators">
                    <button type="button" class="active" data-bs-target="#carouselExample" data-bs-slide-to="0"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
                </div>
                <!-- Carousel Inner -->
                <div class="carousel-inner" id="HeadCarousel">
                    <div class="carousel-item active" data-bs-interval="4000">
                        <div class="row">
                            <div class="col" id="carousel-img1"></div>
                            <div class="col text-center d-flex flex-column justify-content-center">
                                <h3 id="CarouselTitle">Bánh kem</h3>
                                <p id="CarouselPagaraph">Thưởng thức niềm vui trong từng chiếc bánh! 
                                <br>Mỗi chiếc bánh đều được làm từ nguyên liệu tươi ngon, với lớp bông lan mềm mịn và kem ngọt ngào.<br> Hãy để chúng tôi mang đến hương vị ngọt ngào cho những dịp đặc biệt của bạn!
                                <br>Khám phá những hương vị tuyệt vời qua từng chiếc bánh kem tươi ngon tại Kan Bakery</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                        <div class="row">
                            <div class="col"  id="carousel-img2"></div>
                            <div class="col text-center d-flex flex-column justify-content-center px-5">
                                <h3 id="CarouselTitle">Lễ Giáng Sinh</h3>
                                <p id="CarouselPagaraph">Giáng sinh này, hãy cùng tiệm bánh kem của chúng tôi 
                                    <br>tạo nên những khoảnh khắc ngọt ngào với bánh kem thơm ngon, trang trí rực rỡ theo chủ đề Noel. 
                                    <br>Đặt bánh ngay để chia sẻ yêu thương mùa lễ hội!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                        <div class="row">
                            <div class="col"  id="carousel-img3"></div>
                            <div class="col text-center d-flex flex-column justify-content-center">
                                <h3 id="CarouselTitle">Bánh mỳ</h3>
                                <p id="CarouselPagaraph">Tại tiệm bánh của chúng tôi, từng ổ bánh mì được nướng với tình yêu và sự chăm chút. 
                                    <br>Vỏ giòn, ruột mềm, thơm ngào ngạt – mỗi loại bánh mì đều mang đến hương vị tươi mới và ấm áp, làm say lòng ngay từ miếng đầu tiên!</p>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section>
            <div class="container py-5">
            <h1 class="text-center">Best Sellers</h1>
            <div class="row row-cols-1 row-cols-md-4 g-4 py-2 gap-2 justify-content-center">
                <?php
                    require_once __DIR__ . '/../partials/db_connect.php';

                    $querry = 'SELECT product_name,price,category.category_name,product_description,product_img from product
	                                inner join category on category.category_id = product.category;';
                    try {
                            $statement = $pdo->prepare($querry);
                            $statement->execute();
                                    
                            while($rows = $statement->fetch()) {
                                echo '  
                                    <div class="CardContainer card p-0">
                                        <img src="/images/'. $rows['product_img'] .'" class="card-img-top" alt="...">
                                        <div class="card-body d-flex flex-column justify-content-between gap-2">
                                            <div>
                                                <h5 class="card-title">' .$rows['product_name']. '</h5>
                                                <p class="card-text">'.$rows['product_description'].'</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h3>'.$rows['price'].' VND</h3>
                                                <button class="btn btn-primary">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>';
                            } 
                        } catch (PDOException $e) {
                            $error_message = 'Không thể lấy dữ liệu';
                            $reason = $pdo->getMessage();
                            include __DIR__ . '/../partials/show_error.php';
                        }
                    ?>                
 
            </div>
            </div>    
        </section>
<?php
    include_once __DIR__ . '/../partials/footer.php';
?>