<?php
include_once __DIR__ . '/../partials/header.php';
?>
<section class="section-hero mb-5">
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
                            <br>Mỗi chiếc bánh đều được làm từ nguyên liệu tươi ngon, với lớp bông lan mềm mịn và kem
                            ngọt ngào.<br> Hãy để chúng tôi mang đến hương vị ngọt ngào cho những dịp đặc biệt của bạn!
                            <br>Khám phá những hương vị tuyệt vời qua từng chiếc bánh kem tươi ngon tại Kan Bakery
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <div class="row">
                    <div class="col" id="carousel-img2"></div>
                    <div class="col text-center d-flex flex-column justify-content-center px-5">
                        <h3 id="CarouselTitle">Lễ Giáng Sinh</h3>
                        <p id="CarouselPagaraph">Giáng sinh này, hãy cùng tiệm bánh kem của chúng tôi
                            <br>tạo nên những khoảnh khắc ngọt ngào với bánh kem thơm ngon, trang trí rực rỡ theo chủ đề
                            Noel.
                            <br>Đặt bánh ngay để chia sẻ yêu thương mùa lễ hội!
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <div class="row">
                    <div class="col" id="carousel-img3"></div>
                    <div class="col text-center d-flex flex-column justify-content-center">
                        <h3 id="CarouselTitle">Bánh mỳ</h3>
                        <p id="CarouselPagaraph">Tại tiệm bánh của chúng tôi, từng ổ bánh mì được nướng với tình yêu và
                            sự chăm chút.
                            <br>Vỏ giòn, ruột mềm, thơm ngào ngạt – mỗi loại bánh mì đều mang đến hương vị tươi mới và
                            ấm áp, làm say lòng ngay từ miếng đầu tiên!
                        </p>
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
<section class="section-aboutus mb-3">
    <div class="container">
        <div class="row p-3">
            <div class="col-md-6"><img src="images/index_aboutus.jpg" alt="" class="img-fluid rounded-3"></div>
            <div class="col-md-5 d-flex flex-column justify-content-around">
                <h2>Giới thiệu về Kan Bakery</h2>
                <p style="text-align: justify;">Kan Bakery là một tiệm bánh nhỏ với phong cách làm bánh thủ công,
                    mang đến hương vị tươi ngon và tinh tế cho khách hàng.<br><br>
                    Tiệm luôn chú trọng đến chất lượng trong từng sản phẩm, từ bánh mì, bánh ngọt cho đến bánh kem.
                    Với sự tỉ mỉ trong khâu chọn lựa nguyên liệu và quy trình làm bánh, mỗi chiếc bánh đều đảm bảo vị
                    ngon tự nhiên và thơm phức.
                    Kan Bakery còn mang đến một không gian ấm cúng, thân thiện, rất thích hợp cho những buổi gặp gỡ nhẹ
                    nhàng hay thư giãn cùng bạn bè.</p>
                <div>
                    <a href="#" class="link"><i class="fa-solid fa-store mb-3"></i> Cửa hàng gần nhất</a>
                    <div class="row row-cols-2">
                        <div class="col d-flex"><i class="fa-solid fa-phone"></i>
                            <p>&nbsp;0321456780</p>
                        </div>
                        <div class="col d-flex"><i class="fa-solid fa-envelope"></i>
                            <p>&nbsp;kanbakery@gmail.com</p>
                        </div>
                        <div class="col d-flex"><i class="fa-brands fa-facebook-f"></i><a href="#">
                                <p>&nbsp;kanbakery.facebook.com</p>
                            </a></div>
                        <div class="col d-flex"><i class="fa-regular fa-clock"></i>
                            <p>&nbsp;Thứ Hai - Chủ Nhật | 6:00 - 22:30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-sales">
    <div class="text-center mb-3">
        <h1>Tin tức và khuyến mãi</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src="images/sale1.jpg" alt="" class="img-thumbnail">
                <div class="d-flex flex-column">
                    <h5>Giảm 50% nhân dịp kỷ niệm 14 năm</h5>
                    <p>Các loại bánh ngọt, bánh lạnh, bánh kem và phụ kiện sẽ được giảm giá cho đến hết tuần</p>
                </div>
            </div>
            <div class="col-3">
                <img src="images/sale2.jpg" alt="" class="img-thumbnail">
                <div class="d-flex flex-column">
                    <h5>Trung thu đón yêu thương</h5>
                    <p>Cùng tiệm bánh chúng tôi chúc mừng lễ trung thu bằng những chiếc bánh trung thu vô cùng hấp dẫn được bán trong suốt dịp lễ này</p>
                </div>
            </div>
            <div class="col-3">
                <img src="images/sale3.jpg" alt="" class="img-thumbnail">
                <div class="d-flex flex-column">
                    <h5>Cuối tuần ngọt ngào</h5>
                    <p>Giảm giá các loại bánh ngọt và bánh kem vào mỗi cuối tuần, vô cùng hấp dẫn lên đến 10%</p>
                </div>
            </div>
            <div class="col-3">
                <img src="images/sale4.jpg" alt="" class="img-thumbnail">
                <div class="d-flex flex-column">
                    <h5>Bánh mì ngọt nổi tiếng đã có mặt tại Kan Bakery</h5>
                    <p>Các loại bánh mì ngọt, mặn và các loại bánh nướng đã có mặt tại các cửa hàng.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once __DIR__ . '/../partials/footer.php';
?>