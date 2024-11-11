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
                        <img src='/uploads/<?= $item['product']['product_img'] ?>' alt="<?= $item['product']['product_name'] ?>"
                            style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                        <?php echo $item['product']['product_name']; ?>
                    </td>
                    <td><?php echo number_format($item['product']['price']); ?> VND</td>
                    <td>
                        <button class="btn btn-secondary btn-sm decrease" data-product-id="<?= $productId ?>" <?php echo $item['quantity'] <= 1 ? 'disabled' : ''; ?>>-</button>
                        <input type="number" value="<?= $item['quantity'] ?>" class="form-control d-inline quantity-input"
                            style="width: 60px; display: inline-block; text-align: center;" min="1"
                            data-product-id="<?= $productId ?>" readonly>
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
    <div class="container d-flex flex-row-reverse">
        <div class="cart-summary">
            <h4 id="total-amount">Tổng cộng: <?php echo number_format($total); ?> VND</h4>
            <a href="/cart/clear" class="btn btn-warning">Xóa toàn bộ giỏ hàng</a>
            <!-- Nút thanh toán -->
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paymentModal">Thanh toán</button>
        </div>
    </div>
<?php endif; ?>
<!-- Modal Thanh Toán -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Thanh Toán</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="payment-form" action="/order-confirmation" method="POST">
                <!-- Hiển thị thông tin người dùng (tên và địa chỉ) -->
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" id="name" name="name" class="form-control" value='<?= AUTHGUARD()->user()->name ?>' readonly>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ giao hàng</label>
                    <input type="text" id="address" name="address" class="form-control" value='<?= AUTHGUARD()->user()->address ?>' readonly>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>

                <!-- Phương thức thanh toán -->
                <h5>Chọn Phương Thức Thanh Toán</h5>
                <div class="mb-3">
                    <label>
                        <input type="radio" name="payment_method" value="credit_card" required>
                        Thẻ tín dụng/Thẻ ghi nợ (Visa/Mastercard)
                    </label>
                </div>
                <div class="mb-3">
                    <label>
                        <input type="radio" name="payment_method" value="bank_transfer">
                        Chuyển khoản ngân hàng
                    </label>
                </div>
                <div class="mb-3">
                    <label>
                        <input type="radio" name="payment_method" value="cod">
                        Thanh toán khi nhận hàng (COD)
                    </label>
                </div>

                <!-- Thông tin thẻ tín dụng (hiện ra khi chọn phương thức thanh toán qua thẻ) -->
                <div id="credit-card-info" style="display:none;">
                    <div class="mb-3">
                        <label for="card_number" class="form-label">Số thẻ</label>
                        <input type="text" id="card_number" name="card_number" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                    </div>
                    <div class="mb-3">
                        <label for="expiry_date" class="form-label">Ngày hết hạn</label>
                        <input type="text" id="expiry_date" name="expiry_date" class="form-control" placeholder="MM/YY" required>
                    </div>
                    <div class="mb-3">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="text" id="cvv" name="cvv" class="form-control" required>
                    </div>
                </div>

                <!-- Thông tin ngân hàng (hiện ra khi chọn phương thức thanh toán qua chuyển khoản ngân hàng) -->
                <div id="bank-info" style="display:none;">
                    <h5>Thông tin chuyển khoản ngân hàng:</h5>
                    <p><strong>Ngân hàng: </strong>Vietcombank</p>
                    <p><strong>Số tài khoản: </strong>1234567890</p>
                    <p><strong>Chủ tài khoản: </strong>Cửa hàng Bánh Ngọt</p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100">Xác Nhận Thanh Toán</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php $this->end() ?>

<?php $this->start("page_specific_js") ?>
<script>
    $(document).ready(function () {
        // Hiển thị hoặc ẩn các thông tin liên quan đến phương thức thanh toán
        $("input[name='payment_method']").on("change", function () {
            if ($(this).val() == 'credit_card') {
                $("#credit-card-info").show();
                $("#bank-info").hide();
            } else if ($(this).val() == 'bank_transfer') {
                $("#credit-card-info").hide();
                $("#bank-info").show();
            } else {
                $("#credit-card-info").hide();
                $("#bank-info").hide();
            }
        });

        // Kiểm tra khi submit form, chỉ yêu cầu thông tin thẻ khi phương thức thanh toán là thẻ tín dụng
        $("#payment-form").on("submit", function (e) {
            // Kiểm tra nếu phương thức thanh toán là "Thẻ tín dụng"
            if ($("input[name='payment_method']:checked").val() == 'credit_card') {
                // Kiểm tra xem thông tin thẻ tín dụng đã đầy đủ chưa
                if ($('#card_number').val() === "" || $('#expiry_date').val() === "" || $('#cvv').val() === "") {
                    alert("Vui lòng nhập đầy đủ thông tin thẻ tín dụng.");
                    e.preventDefault();  // Ngừng việc gửi form
                    return true; // Fix bug: Kiểm tra thẻ (Không ưu tiên)
                }
            }

            // Nếu chọn phương thức khác, form sẽ gửi bình thường
            return true;
        });
    });
</script>
<?php $this->stop() ?>

