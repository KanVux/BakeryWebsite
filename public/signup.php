<?php
define("TITLE", "Đăng ký");
include_once __DIR__ . '/../partials/header.php';
?>
<section class="Title pt-5">
    <div class="container">
        <h2 class="text-center">Thông tin đăng ký</h2>
    </div>
</section>
<section class="login-section container py-5">
    <div class="row justify-content-center ">
        <form class="col-lg-4">
            <div class="form-floating mb-3">
                <input autocomplete="off" autofocus="on" type="email" class="form-control" id="customerEmailInput" placeholder="Địa chỉ email">
                <label for="customerEmailInput">Địa chỉ email*</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="customerPasswordInput" placeholder="Mật khẩu">
                <label for="customerPasswordInput">Mật khẩu*</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="customerLnameInput" placeholder="Họ">
                <label for="customerLnameInput">Họ*</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="customerFnameInput" placeholder="Tên">
                <label for="customerFnameInput">Tên*</label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" class="form-control" id="customerPhoneInput" placeholder="Số điện thoại"  pattern="[0-9]{10}" required>
                <label for="customerPhoneInput">Số điện thoại*</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="customerAddressInput" placeholder="Địa chỉ">
                <label for="customerAddressInput">Địa chỉ*</label>
            </div>
            <div class="form-floating mb-3" >
                <select class="form-select" id="customerCityInput">
                    <option selected>Cần Thơ</option>
                    <option value="1">Hồ Chí Minh</option>
                    <option value="2">Hà Nội</option>
                    <option value="3">Sóc Trăng</option>
                    <option value="4">Bạc Liêu</option>
                </select>
                <label for="customerCityInput">Tỉnh/Thành phố</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="customerDistrictInput" placeholder="Quận/Huyện">
                <label for="customerDistrictInput">Quận/Huyện*</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="customerWardInput" placeholder="Phường/Xã">
                <label for="customerWardInput">Phường/Xã*</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn custom-btn">Đăng ký</button>
                <p class="text-center py-2">Bạn đã có tài khoản? <a href="login.php" class="text-black">Đăng nhập</a></p>
            </div>
        </form>
    </div>
</section>

<?php
include_once __DIR__ . '/../partials/footer.php';
?>