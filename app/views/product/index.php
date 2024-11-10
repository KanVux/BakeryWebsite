<?php $this->layout('layout/client_layout',['title'=>$title]);?>
<?php $this->start("page")?>
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
                    <!-- GIÁ THÀNH -->
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0"
                                data-bs-toggle="collapse" data-bs-target="#priceTag">
                            <h5 class="mx-1 m-0">GIÁ THÀNH</h5>
                        </button>
                        <div class="collapse show" id="priceTag">
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="price" data-value="100000-300000" id="priceRange1">
                                <label for="priceRange1">100.000 - 300.000</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="price" data-value="300000-500000" id="priceRange2">
                                <label for="priceRange2">300.000 - 500.000</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="price" data-value="500000-700000" id="priceRange3">
                                <label for="priceRange3">500.000 - 700.000</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="price" data-value="700000-1000000" id="priceRange4">
                                <label for="priceRange4">700.000 - 1.000.000</label>
                            </ul>
                        </div>
                    </li>

                    <!-- KÍCH THƯỚC -->
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0"
                                data-bs-toggle="collapse" data-bs-target="#sizeTag">
                            <h5 class="mx-1 m-0">KÍCH THƯỚC</h5>
                        </button>
                        <div class="collapse show" id="sizeTag">
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="size" data-value="16" id="size1">
                                <label for="size1">16cm</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="size" data-value="20" id="size2">
                                <label for="size2">20cm</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="size" data-value="24" id="size3">
                                <label for="size3">24cm</label>
                            </ul>
                        </div>
                    </li>

                    <!-- HƯƠNG VỊ -->
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0"
                                data-bs-toggle="collapse" data-bs-target="#flavourTag">
                            <h5 class="mx-1 m-0">HƯƠNG VỊ</h5>
                        </button>
                        <div class="collapse show" id="flavourTag">
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="flavour" data-value="Sô cô la" id="flavour1">
                                <label for="flavour1">Sôcôla</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="flavour" data-value="Dâu" id="flavour2">
                                <label for="flavour2">Dâu</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="flavour" data-value="Matcha" id="flavour3">
                                <label for="flavour3">Matcha</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="flavour" data-value="Phô mai" id="flavour4">
                                <label for="flavour4">Phô mai</label>
                            </ul>
                        </div>
                    </li>

                    <!-- HÌNH DẠNG -->
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0"
                                data-bs-toggle="collapse" data-bs-target="#shapeTag">
                            <h5 class="mx-1 m-0">HÌNH DẠNG</h5>
                        </button>
                        <div class="collapse show" id="shapeTag">
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="shape" data-value="1" id="shape1">
                                <label for="shape1">Mẫu có sẵn hằng ngày</label>
                            </ul>
                            <ul class="list-unstyled mb-0 py-3 pt-md-1">
                                <input type="checkbox" class="form-check-input filter-checkbox" data-category="shape" data-value="0" id="shape2">
                                <label for="shape2">Mẫu đặt trước</label>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <div class="container">
                    <div class="pagination" id="pagination"></div>
                    <div class="row" id="product-list">
                        <?php foreach ($products as $product) : ?>    
                            <div class="col-12 col-sm-6 col-lg-3 mb-4 product" 
                                data-price="<?= $product->price ?>" 
                                data-size="<?= $product->size ?>" 
                                data-flavour="<?= $product->flavour ?>"     
                                data-shape="<?= $product->shape ?>">
                                <div class="card p-0 border-0 h-100">
                                    <img src='/uploads/<?= $this->e($product->product_img) ?>' class="card-img-top" alt="Product Image">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h5 class="card-title"><?= $this->e($product->product_name) ?></h5>
                                        <p class="card-text"><?= $this->e($product->product_description) ?></p>
                                        <div class="d-flex flex-column"> 
                                            <h3 class="text-success"><?= $this->e($product->price) ?> VND</h3>
                                            <form id="add-to-cart-form-<?= $product->product_id ?>" class="add-to-cart-form"
                                                data-product-id="<?= $product->product_id ?>">
                                            </form>
                                            <button type="submit" class="btn btn-warning border border-secondary shadow-sm">
                                                <a href="/cart/add/<?= $product->product_id ?>?quantity=1" class="nav-link">
                                                    Thêm vào giỏ
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
 
</section>
<section class="section-banner">
    <div class="container bg-warning-subtle">
        <div class="row align-items-center border rounded-2">
            <div class="col-6 p-0">
                <img src="assets/client/images/about_us/aboutus3.jpg" alt="" class="img-fluid rounded-start-2">
            </div>
            <div class="col-6">
                <h4 class="text-center p-1">Cửa hàng Kan Bakery gần tôi</h4>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary btn-lg">
                        <a href="/about_us" class="nav-link">Tìm kiếm</a>
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
               
                <?php require_once ROOTDIR . 'app\views\product\product_list.php'; ?>

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

<?php $this->stop()?>
<?php $this->start("page_specific_js")?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.filter-checkbox');
    
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', filterProducts);
    });
    
    function filterProducts() {
        const selectedFilters = {};

        // Lưu trữ các filter đã chọn vào object
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                const category = checkbox.getAttribute('data-category');
                const value = checkbox.getAttribute('data-value');
                
                if (!selectedFilters[category]) {
                    selectedFilters[category] = [];
                }
                selectedFilters[category].push(value);
            }
        });

        // Lọc các sản phẩm
        const products = document.querySelectorAll('.product');
        products.forEach(function(product) {
            let shouldDisplay = true;

            // Lọc theo các filter khác (size, shape)
            for (const category in selectedFilters) {
                const values = selectedFilters[category];
                const productValue = product.getAttribute('data-' + category); // lấy giá trị thuộc tính của sản phẩm
                
                if (values.length > 0 && !values.some(val => productValue.includes(val))) {
                    shouldDisplay = false;
                    break;
                }
            }

            // Lọc theo hương vị (flavour)
            const productFlavour = product.getAttribute('data-flavour');  // lấy hương vị của sản phẩm
            const flavourFilters = selectedFilters['flavour'];  // Lấy các filter hương vị đã chọn
            if (flavourFilters && flavourFilters.length > 0) {
                shouldDisplay = flavourFilters.some(flavour => {
                    return productFlavour && productFlavour.includes(flavour); // Kiểm tra nếu hương vị chứa từ khóa
                });
            }

            // Lọc theo giá
            const productPrice = parseInt(product.getAttribute('data-price'));  // Giả sử giá sản phẩm được lưu trong data-price
            const priceFilters = selectedFilters['price'];  // Lấy các filter giá đã chọn
            if (priceFilters && priceFilters.length > 0) {
                shouldDisplay = priceFilters.some(range => {
                    const [minPrice, maxPrice] = range.split('-').map(Number);
                    return productPrice >= minPrice && productPrice <= maxPrice;
                });
            }

            // Hiển thị hoặc ẩn sản phẩm dựa trên kết quả lọc
            if (shouldDisplay) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const products = Array.from(document.querySelectorAll('.product'));
    const productsPerPage = 12;
    let currentPage = 1;

    // Hiển thị sản phẩm của trang hiện tại
    function showPage(page) {
        const startIndex = (page - 1) * productsPerPage;
        const endIndex = startIndex + productsPerPage;

        // Ẩn tất cả sản phẩm
        products.forEach(product => product.style.display = 'none');
        
        // Hiển thị sản phẩm cho trang hiện tại
        products.slice(startIndex, endIndex).forEach(product => product.style.display = 'block');

        // Cập nhật phân trang
        updatePagination(page);
    }

    // Cập nhật các nút phân trang
    function updatePagination(page) {
        const totalPages = Math.ceil(products.length / productsPerPage);
        const paginationContainer = document.getElementById('pagination');
        
        paginationContainer.innerHTML = '';

        // Nút "Previous"
        if (page > 1) {
            const prevPage = document.createElement('a');
            prevPage.href = '#';
            prevPage.textContent = 'Previous';
            prevPage.classList.add('pagination-prev');
            prevPage.addEventListener('click', function(e) {
                e.preventDefault();
                showPage(page - 1);
            });
            paginationContainer.appendChild(prevPage);
        }

        // Các số trang
        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement('a');
            pageLink.href = '#';
            pageLink.textContent = i;
            pageLink.classList.add('pagination-page');
            if (i === page) pageLink.classList.add('active');

            pageLink.addEventListener('click', function(e) {
                e.preventDefault();
                showPage(i);
            });

            paginationContainer.appendChild(pageLink);
        }

        // Nút "Next"
        if (page < totalPages) {
            const nextPage = document.createElement('a');
            nextPage.href = '#';
            nextPage.textContent = 'Next';
            nextPage.classList.add('pagination-next');
            nextPage.addEventListener('click', function(e) {
                e.preventDefault();
                showPage(page + 1);
            });
            paginationContainer.appendChild(nextPage);
        }
    }

    // Hiển thị trang đầu tiên
    showPage(currentPage);
});

</script>
<?php $this->stop()?>