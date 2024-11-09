<?php $this->layout('layout/client_layout', ['title' => $title]) ?>
<?php $this->start("page")?>
<section class="Title pt-5">
    <div class="container">
        <h2 class="text-center">Thông tin đăng ký</h2>
    </div>
</section>
<section class="login-section container py-5">
    <div class="row justify-content-center ">
        <form class="col-lg-4" method="POST" action="/register">
            <div class="form-floating mb-3">
                <input id="email" type="email" placeholder class="form-control <?= isset($errors['email']) ? ' is-invalid' : '' ?>" name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>" required>
                <?php if (isset($errors['email'])): ?>
                    <span class="invalid-feedback">
                        <strong><?= $this->e($errors['email']) ?></strong>
                    </span>
                <?php endif ?>
                <label for="email">Địa chỉ email*</label>
            </div>
            <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control <?= isset($errors['password']) ? ' is-invalid' : '' ?>" name="password" placeholder="" required>
                <?php if (isset($errors['password'])) : ?>
                  <span class="invalid-feedback">
                    <strong><?= $this->e($errors['password']) ?></strong>
                  </span>
                <?php endif ?>                
                <label for="password">Mật khẩu*</label>
            </div>
            <div class="form-floating mb-3">
                <input id="password_confirmation" type="password" class="form-control <?= isset($errors['password_confirmation']) ? ' is-invalid' : '' ?>" name="password_confirmation" placeholder="" required>
                <?php if (isset($errors['password_confirmation'])) : ?>
                  <span class="invalid-feedback">
                    <strong><?= $this->e($errors['password_confirmation'])?></strong>
                  </span>  
                <?php endif ?>
                 <label for="password_confirmation">Xác nhận mật khẩu*</label>
            </div>
            <div class="form-floating mb-3">
                <input id="name" type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" name="name" value="<?= isset($old['name']) ? $this->e($old['name']) : '' ?>" required autofocus>
                <?php if (isset($errors['name'])) : ?>
                  <span class="invalid-feedback">
                    <strong><?= $this->e($errors['name']) ?></strong>
                  </span>
                <?php endif ?>         
                <label for="name">Tên người dùng*</label>
            </div>
            <div class="form-floating mb-3">
                <input id="address" type="text" class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>" name="address" value="<?= isset($old['address']) ? $this->e($old['address']) : '' ?>" required autofocus>
                <?php if (isset($errors['address'])) : ?>
                  <span class="invalid-feedback">
                    <strong><?= $this->e($errors['address']) ?></strong>
                  </span>
                <?php endif ?>
                <label for="address">Địa chỉ*</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn custom-btn">Đăng ký</button>
                <p class="text-center py-2">Bạn đã có tài khoản? <a href="/login" class="text-black">Đăng nhập</a></p>
            </div>
        </form>
    </div>
</section>
<?php $this->stop()?>
