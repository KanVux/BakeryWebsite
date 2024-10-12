<?php
define("TITLE", "Đăng nhập");
include_once __DIR__ . '/../partials/header.php';
?>
<section class="Title pt-5">
    <div class="container">
        <h2 class="text-center">Đăng nhập</h2>
    </div>
</section>
<section class="login-section container py-5">
    <div class="row justify-content-center ">
        <form class="col-lg-4">
            <div class="form-floating mb-3">
                <input autocomplete="off" autofocus="on" type="email" class="form-control" id="customerEmailInput" placeholder="Địa chỉ email">
                <label for="customerEmailInput">Địa chỉ email *</label>
                <div id="emailHelp" class="form-text">Không chia sẻ email của bạn cho bất kỳ ai.</div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="customerPasswordInput" placeholder="Mật khẩu">
                <label for="customerPasswordInput">Mật khẩu</label>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class=" form-check my-0">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Ghi nhớ tôi</label>
                </div>
                <div>
                    <a href="#" class="text-black p-1">Quên mật khẩu?</a>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn custom-btn">Đăng nhập</button>
                <p class="text-center py-2">Chưa có tài khoản? <a href="signup.php" class="text-black">Tạo tài khoản.</a></p>
            </div>
        </form>
    </div>
</section>

<?php
include_once __DIR__ . '/../partials/footer.php';
?>