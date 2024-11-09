<?php $this->layout('layout/client_layout',['title' => $title]) ?>

<?php $this->start("page")?>
<section class="Title pt-5">
    <div class="container">
        <h2 class="text-center">Đăng nhập</h2>
    </div>
</section>
<section class="login-section container py-5">
    <div class="row justify-content-center ">
        <form class="col-lg-4" method="POST" action="/login">
            <div class="form-floating mb-3">
                <input id="email" type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>" required placeholder="" autofocus>
                <?php if (isset($errors['email'])): ?>
                    <span class="invalid-feedback">
                        <strong><?= $this->e($errors['email']) ?></strong>
                    </span>
                <?php endif ?>
                <label for="customerEmailInput">Địa chỉ email *</label>
                <div id="emailHelp" class="form-text">Không chia sẻ email của bạn cho bất kỳ ai.</div>
            </div>
            <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" name="password" placeholder="" required>
                <?php if (isset($errors['password'])) : ?>
                  <span class="invalid-feedback">
                    <strong><?= $this->e($errors['password']) ?></strong>
                  </span>
                <?php endif ?>
                <label for="password">Mật khẩu</label>
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
                <p class="text-center py-2">Chưa có tài khoản? <a href="/register" class="text-black">Tạo tài khoản.</a></p>
            </div>
        </form>
    </div>
</section>
<?php $this->stop()?>