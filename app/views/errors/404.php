<?php $this->layout("layout/client_layout", ['title'=>APP_NAME]); ?>
<?php $this->start("page")?>
    <div class="container bakery-404-container">
        <h1 class="bakery-404-title">404</h1>
        <img src="/uploads/errors/404_img.jpg" alt="Cake" class="bakery-404-image">
        <p class="bakery-404-message">Oops! Trang bạn tìm không có ở đây. Hãy thử quay lại hoặc vào tiệm bánh của chúng tôi để thưởng thức các món bánh ngon!</p>
        <a href="/" class="btn bakery-btn-custom">Quay lại trang chủ</a>
    </div>
<?php $this->stop()?>