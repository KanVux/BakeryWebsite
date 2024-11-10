<?php $this->layout('layout/client_layout', ['title' => 'Tin tức và Khuyến mãi']); ?>
<?php $this->start("page") ?>

    <!-- Header -->
    <section class="title py-3">
        <div class="container">
            <h2 class="text-center">Tin tức và Ưu đãi</h2>
        </div>
    </section>

    <!-- Content Section -->
    <section class="news-section mb-5">
        <div class="container pt-3">
            <div class="row">
                <!-- Sidebar: Danh mục tin tức -->
                <div class="col-md-3">
                    <h5 class="text-center">Danh mục tin tức</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/news/khuyen-mai" class="nav-link">Khuyến mãi</a></li>
                        <li class="list-group-item"><a href="/news/tin-tuc" class="nav-link">Tin tức mới</a></li>
                        <li class="list-group-item"><a href="/news/uu-dai" class="nav-link">Ưu đãi đặc biệt</a></li>
                        <li class="list-group-item"><a href="/news/hoat-dong" class="nav-link">Hoạt động</a></li>
                    </ul>
                </div>

                <!-- Main Content: Danh sách bài viết -->
                <div class="col-md-9">
                    <div class="row">
                        <!-- Banner tin tức 1 -->
                        <div class="col-md-12 mb-4">
                            <div class="banner d-flex align-items-center" style="background-color: rgb(255, 191, 97);">
                                <div class="banner-image" style="background-image: url('/assets/client/images/home/discount/sale1.jpg'); background-size: cover; background-position: center; height: 300px; width: 50%;"></div>
                                <div class="banner-text p-4 text-white" style="width: 50%;">
                                    <h3 class="banner-title text-black">Giảm 50% nhân dịp kỷ niệm 14 năm</h3>
                                    <p class="banner-description text-black">Các loại bánh ngọt, bánh lạnh, bánh kem và phụ kiện sẽ được giảm giá cho đến hết tuần</p>
                                    <a href="/news/khuyen-mai-mua-he-2024" class="btn btn-light">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>

                        <!-- Banner tin tức 2 -->
                        <div class="col-md-12 mb-4">
                            <div class="banner d-flex align-items-center" style="background-color: rgb(255, 191, 97);">
                                <div class="banner-image" style="background-image: url('/assets/client/images/home/discount/sale2.jpg'); background-size: cover; background-position: center; height: 300px; width: 50%;"></div>
                                <div class="banner-text p-4 text-white" style="width: 50%;">
                                    <h3 class="banner-title text-black">Trung thu đón yêu thương</h3>
                                    <p class="banner-description text-black">Cùng tiệm bánh chúng tôi chúc mừng lễ trung thu bằng những chiếc bánh trung thu vô cùng hấp dẫn được bán trong suốt dịp lễ này</p>
                                    <a href="/news/uu-dai-khach-hang-moi" class="btn btn-light">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>

                        <!-- Banner tin tức 3 -->
                        <div class="col-md-12 mb-4">
                            <div class="banner d-flex align-items-center" style="background-color: rgb(255, 191, 97);">
                                <div class="banner-image" style="background-image: url('/assets/client/images/home/discount/sale3.jpg'); background-size: cover; background-position: center; height: 300px; width: 50%;"></div>
                                <div class="banner-text p-4 text-white" style="width: 50%;">
                                    <h3 class="banner-title text-black">Cuối tuần ngọt ngào</h3>
                                    <p class="banner-description text-black">Giảm giá các loại bánh ngọt và bánh kem vào mỗi cuối tuần, vô cùng hấp dẫn lên đến 10%</p>
                                    <a href="/news/khuyen-mai-noel" class="btn btn-light">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>

                        <!-- Banner tin tức 4 -->
                        <div class="col-md-12 mb-4">
                            <div class="banner d-flex align-items-center" style="background-color: rgb(255, 191, 97);">
                                <div class="banner-image" style="background-image: url('/assets/client/images/home/discount/sale4.jpg'); background-size: cover; background-position: center; height: 300px; width: 50%;"></div>
                                <div class="banner-text p-4 text-white" style="width: 50%;">
                                    <h3 class="banner-title text-black">Bánh mì ngọt nổi tiếng đã có mặt tại Kan Bakery</h3>
                                    <p class="banner-description text-black">Các loại bánh mì ngọt, mặn và các loại bánh nướng đã có mặt tại các cửa hàng.</p>
                                    <a href="/news/khuyen-mai-noel" class="btn btn-light">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->stop() ?>
