<?php $this->layout('layout/client_layout', ['title' => $title]) ?>
<?php $this->start("page") ?>
    <h2 class="text-center"><?php echo $title; ?></h2>

    <?php if (empty($cart)): ?>
        <p class="text-center">Giỏ hàng của bạn hiện đang trống.</p>
    <?php else: ?>
        <table class="table container">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $productId => $item): ?>
                    <tr id="product-<?= $productId ?>">
                        <td>
                            <img src='/uploads/<?= $item['product']['product_img'] ?>' alt="<?= $item['product']['product_name'] ?>" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                            <?php echo $item['product']['product_name']; ?>
                        </td>
                        <td><?php echo number_format($item['product']['price']); ?> VND</td>
                        <td>
                            <button class="btn btn-secondary btn-sm decrease" data-product-id="<?= $productId ?>" <?php echo $item['quantity'] <= 1 ? 'disabled' : ''; ?>>-</button>
                            <input type="number" value="<?= $item['quantity'] ?>" class="form-control d-inline quantity-input" style="width: 60px; display: inline-block; text-align: center;" min="1" data-product-id="<?= $productId ?>" readonly>
                            <button class="btn btn-secondary btn-sm increase" data-product-id="<?= $productId ?>">+</button>
                        </td>
                        <td class="total-price"><?= number_format($item['product']['price'] * $item['quantity']); ?> VND</td>
                        <td>
                            <a href="/cart/remove/<?php echo $productId; ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="container d-flex flex-row-reverse ">
            <div class="cart-summary">
                <h4 id="total-amount">Tổng cộng: <?php echo number_format($total); ?> VND</h4>
                <a href="/cart/clear" class="btn btn-warning">Xóa toàn bộ giỏ hàng</a>
                <a href="/checkout" class="btn btn-success">Thanh toán</a>
            </div>
        </div>
    <?php endif; ?>
<?php $this->end() ?>

<!-- Thêm jQuery -->
<?php $this->start("page_specific_js") ?>
<script>
$(document).ready(function () {
    // Hàm gửi AJAX
    function updateQuantity(productId, newQuantity) {
        $.ajax({
            url: '/cart/update/' + productId,
            method: 'POST',
            data: { quantity: newQuantity },
            success: function(response) {
                try {
                    var result = JSON.parse(response);

                    // Cập nhật lại số lượng và tổng giá trị sau khi thành công
                    if (result.success) {
                        var totalPrice = result.totalPrice;
                        var totalAmount = result.totalAmount;

                        // Cập nhật giá trị trên giao diện
                        $("#product-" + productId + " .quantity-input").val(newQuantity);
                        $("#product-" + productId + " .total-price").text(totalPrice + ' VND');
                        $("#total-amount").text("Tổng cộng: " + totalAmount + " VND");

                        // Cập nhật nút giảm
                        $("#product-" + productId + " .decrease").prop('disabled', newQuantity <= 1);
                    }
                } catch (e) {
                    console.error("Có lỗi trong phản hồi từ server:", e);
                }
            },
            error: function(xhr, status, error) {
                console.error("Có lỗi xảy ra khi gửi AJAX:", status, error);
            }
        });
    }

    // Các sự kiện tăng và giảm số lượng không thay đổi
    $(".increase").on("click", function() {
        var productId = $(this).data("product-id");
        var currentQuantity = $("#product-" + productId + " .quantity-input").val();
        var newQuantity = parseInt(currentQuantity) + 1;
        updateQuantity(productId, newQuantity);
    });

    $(".decrease").on("click", function() {
        var productId = $(this).data("product-id");
        var currentQuantity = $("#product-" + productId + " .quantity-input").val();
        var newQuantity = parseInt(currentQuantity) - 1;
        updateQuantity(productId, newQuantity);
    });
});
</script>
<?php $this->stop() ?>