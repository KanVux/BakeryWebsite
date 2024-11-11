<?php $this->layout('layout/client_layout', ['title' => 'Cảm ơn']) ?>
<?php $this->start("page") ?>
    <div class="container text-center mt-4">
        <h2>Cảm ơn bạn đã mua sắm tại Kan Bakery!</h2>
        <p>Chúng tôi đã nhận được đơn hàng của bạn và đang chuẩn bị để giao bánh ngọt tới bạn. Hãy chuẩn bị sẵn sàng để thưởng thức những chiếc bánh thơm ngon!</p>
        
        <div class="mt-4">
            <img src="/assets/client/images/thank_you/thank-you-cake-removebg-preview.jpg" alt="Cảm ơn" style="width: 300px; height: auto;"/>
        </div>
        
        <div class="order-details mt-5">
            <h3>Thông tin đơn hàng:</h3>
            <h5><strong>Ngày đặt hàng:</strong> <?= date('d/m/Y') ?></h5>
            <h5><strong>Phương thức thanh toán:</strong> <?= ucfirst($paymentMethod) ?></h5>
            <h5><strong>Địa chỉ giao hàng:</strong> <?= $address ?></h5>
            <h5><strong>Số điện thoại:</strong> <?= $phone ?></h5>
            <h5><strong>Tổng đơn hàng:</strong> <?= $total ?> VND</h5>
        </div>

        <div class="mt-5">
            <h4>Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng và giao hàng trong thời gian sớm nhất.</h4>
            <p>Cảm ơn bạn đã tin tưởng và lựa chọn Kan Bakery. Chúng tôi mong muốn mang đến cho bạn những trải nghiệm tuyệt vời!</p>
        </div>

        <div class="mt-4">
            <a href="/" class="btn bakery-btn-custom">Quay lại trang chủ</a>
        </div>
    </div>
<?php $this->end() ?>

