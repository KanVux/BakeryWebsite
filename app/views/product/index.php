
<div class="carousel-inner">
    <?php
    $counter = 0;
    if (!empty($products)) {
        foreach ($products as $product) {
            if ($counter % 4 == 0) {
                echo $counter === 0
                    ? '<div class="carousel-item active"><div class="d-flex justify-content-between">'
                    : '</div></div><div class="carousel-item"><div class="d-flex justify-content-start">';
            }

            // Hiển thị sản phẩm
            echo '
                <div class="col-12 col-sm-6 col-lg-3 px-2">
                    <div class="card p-0 border-0">
                        <img src="/uploads/'. htmlspecialchars($product['product_img'] ?? 'default.jpg') . '" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-between card-content">
                                <h5 class="card-title">' . htmlspecialchars($product['product_name'] ?? 'No Name') . '</h5>
                                <p class="card-text">' . htmlspecialchars($product['product_description'] ?? 'No Description') . '</p>
                                <div class="d-flex justify-content-between">
                                    <h3 class="text-success">' . htmlspecialchars($product['price'] ?? '0') . ' VND</h3>
                                    <button class="btn btn-warning border border-secondary shadow-sm">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            $counter++;
        }

        if ($counter % 4 !== 0) {
            echo '</div></div>';
        }
    } else {
        echo '<p> No products found.</p>';
    }
    ?>
</div>

