<div class="carousel-inner">
<?php
    $counter = 0;
    foreach ($products as $product):
        $counter++;
        // Kiểm tra mỗi khi counter chia hết cho 4
        if ($counter % 4 == 1):
            // Mở div cho carousel-item (chỉ mở lần đầu tiên khi counter chia hết cho 4)
            if ($counter > 1):
                echo '</div></div>'; // Đóng carousel-item trước đó nếu counter > 1
            endif;
            echo '<div class="carousel-item' . ($counter == 1 ? ' active' : '') . '"><div class="d-flex justify-content-between">';
        endif;
        ?>
                <div class="col-12 col-sm-6 col-lg-3 px-2">
                    <div class="card p-0 border-0">
                        <img src='/uploads/<?= $product->product_img ?>' class="card-img-top" alt="Product Image">
                        <div class="card-body">
                                <div class="d-flex flex-column justify-content-between card-content">
                                    <h5 class="card-title"><?= $product->product_name ?></h5>
                                    <p class="card-text"><?= $product->product_description ?></p>
                                    <div class="d-flex justify-content-between">
                                        <h3 class="text-success"><?= number_format($product->price) ?> VND</h3>
                                        <form id="add-to-cart-form-<?= $product->product_id ?>" class="add-to-cart-form" data-product-id="<?= $product->product_id ?>">
                                        <button type="submit" class="btn btn-warning border border-secondary shadow-sm">
                                            <?php if(AUTHGUARD()->isUserLoggedIn()): ?>
                                            <a href="/cart/add/<?= $product->product_id ?>?quantity=1" class="nav-link">
                                                Thêm vào giỏ
                                            </a>
                                            <?php else: ?>
                                            <a href="/login" class="nav-link">
                                                Thêm vào giỏ
                                            </a>                                                
                                            <?php endif ?>
                                        </button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
<?php
    echo '</div></div>';
?>

</div>
