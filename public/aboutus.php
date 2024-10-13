<?php
define("TITLE","Về chúng tôi");
include_once __DIR__ . '/../partials/header.php';
?>
<section class="Title py-3">
    <div class="container">
        <h2 class="text-center">Cửa hàng gần tôi</h2>
    </div>
</section>
<section class="section-stores">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-floating mb-3" >
                            <select class="form-select" id="customerDistrict1Input">
                                <option selected>Ninh Kiều</option>
                                <option value="1">Bình Thủy</option>
                                <option value="2">Cái Răng</option>
                                <option value="3">Ô Môn</option>
                            </select>
                            <label for="customerDistrict1Input">Quận</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="customerAddress1Input" placeholder="Địa chỉ..">
                            <label for="customerAddress1Input">Địa chỉ..</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <ul class="list-unstyled w-100 stores">
                    <li class="mb-1 ">
                        <button class="btn  d-inline-flex align-items-center rounded p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#district1">
                            <h5 class="mx-1 m-0">Ninh Kiều</h5>
                        </button>
                        <div class="collapse show" id="district1">
                            <div class="d-flex flex-column ps-4">
                                <h5>Địa chỉ 1</h5>
                                <p><i class="fa fa-solid text-black fa-location-dot"></i>&nbsp; Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TPCT</p>
                                <p><i class="fa text-black fa-phone"></i>&nbsp; 0321456780</p>
                            </div>
                        </div>
                        <hr class="m-0">
                    </li>
                   <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#district2">
                            <h5 class="mx-1 m-0">Bình Thủy</h5>
                        </button>
                        <div class="collapse show" id="district2">
                            <div class="d-flex flex-column ps-4">
                                <h5>Địa chỉ 2</h5>
                                <p><i class="fa fa-solid text-black fa-location-dot"></i>&nbsp; Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TPCT</p>
                                <p><i class="fa text-black fa-phone"></i>&nbsp; 0321456780</p>
                            </div>
                        </div>
                        <hr class="m-0">
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#district3">
                            <h5 class="mx-1 m-0">Cái Răng</h5>
                        </button>
                        <div class="collapse show" id="district3">
                            <div class="d-flex flex-column ps-4">
                                <h5>Địa chỉ 3</h5>
                                <p><i class="fa fa-solid text-black fa-location-dot"></i>&nbsp; Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TPCT</p>
                                <p><i class="fa text-black fa-phone"></i>&nbsp; 0321456780</p>
                            </div>
                        </div>
                        <hr class="m-0">
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#district4">
                            <h5 class="mx-1 m-0">Ô Môn</h5>
                        </button>
                        <div class="collapse show" id="district4">
                            <div class="d-flex flex-column ps-4">
                                <h5>Địa chỉ 4</h5>
                                <p><i class="fa fa-solid text-black fa-location-dot"></i>&nbsp; Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TPCT</p>
                                <p><i class="fa text-black fa-phone"></i>&nbsp; 0321456780</p>
                            </div>
                        </div>
                        <hr class="m-0">
                    </li>
                </div>
            </div>
            <div class="col-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15267.618906843942!2d105.74434169473466!3d10.037596856148882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ-G6p24gVGjGoSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1728767632365!5m2!1svi!2s" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<section class="Title py-3">
    <div class="container">
        <h2 class="text-center">Về chúng tôi</h2>
    </div>
</section>
<section>
    <div class="container bg-white rounded-2">
        <div class="container d-flex justify-content-center flex-column p-2">
            <h3 class="text-center">Thông tin về thương hiệu</h3>
            <div class="d-flex gap-3">
                <p><i class="fa-solid fa-calendar-days"></i>&nbsp;13/10/2024</p>
                <p><i class="fa-solid fa-comment"></i>&nbsp;0</p>
                <p><i class="fa-solid fa-user"></i>&nbsp;Hà Vũ Khang</p>
            </div>
            <hr class="m-0">
            <div class="container d-flex p-3 px-5 flex-column gap-2">
                <div class="d-flex gap-4">
                    <img src="images/aboutus1.jpg" alt="" class="img-thumbnail w-25">
                    <div class="d-inline">
                        <h4>Giới thiệu</h4>
                        <p class="text-justify" >Kan Bakery ra đời từ niềm đam mê cháy bỏng với nghệ thuật làm bánh và mong muốn mang đến cho mọi người những khoảnh khắc ngọt ngào,
                            trọn vẹn nhất. Chúng tôi không chỉ là một tiệm bánh đơn thuần mà còn là nơi gửi gắm tình yêu thương, sáng tạo và sự tận tâm vào từng sản phẩm.
                            Tại đây, mỗi chiếc bánh là kết tinh của sự cầu kỳ trong từng khâu chuẩn bị, 
                            từ việc lựa chọn nguyên liệu tươi ngon nhất đến quá trình chế biến cẩn thận và sáng tạo.</p>
                        <h4>Sứ Mệnh của Chúng Tôi</h4>
                        <p class="text-justify">Sứ mệnh của chúng tôi là mang đến cho mọi người những khoảnh khắc hạnh phúc, 
                            trọn vẹn qua từng chiếc bánh. Chúng tôi tin rằng, mỗi chiếc bánh không chỉ là một món ăn mà còn là biểu tượng của niềm vui, tình yêu thương và sự gắn kết.
                             Với mong muốn trở thành thương hiệu bánh ngọt được yêu thích và tin cậy, chúng tôi luôn không ngừng nỗ lực để tạo ra những sản phẩm tuyệt vời nhất..</p>
                    </div>
                </div>
                <div class="d-flex gap-4">
                    <div class="d-inline">
                        <h4>Đội Ngũ của Chúng Tôi</h4>
                        <p class="text-justify">Đội ngũ làm bánh tại Kan Bakery gồm những thợ làm bánh dày dạn kinh nghiệm, luôn tâm huyết với từng sản phẩm. 
                            Chúng tôi sử dụng những công thức truyền thống kết hợp với phong cách hiện đại, 
                            đảm bảo mỗi chiếc bánh đều mang đến hương vị tuyệt hảo và hình thức bắt mắt.</p>

                        <h4>Cam Kết Chất Lượng</h4>
                        <p class="text-justify">Tại Kan Bakery, chất lượng là tiêu chí hàng đầu. Chúng tôi cam kết sử dụng nguyên liệu tự nhiên, không chứa phẩm màu độc hại hay chất bảo quản.
                            Mỗi sản phẩm đều trải qua quy trình kiểm tra nghiêm ngặt trước khi đến tay khách hàng.</p>

                        <h4>Hãy Tham Gia Cùng Chúng Tôi</h4>
                        <p class="text-justify">Chúng tôi không chỉ là một cửa hàng bánh, mà còn là một cộng đồng yêu thích sự ngọt ngào.
                            Hãy theo dõi chúng tôi trên mạng xã hội để cập nhật những sản phẩm mới, chương trình khuyến mãi hấp dẫn và các sự kiện đặc biệt.</p>
                        </div> 
                        <img src="images/aboutus2.jpg" alt="" class="img-thumbnail w-50">                      
                    </div>
                    <h5 class="text-justify text-center pt-2">Cảm ơn bạn đã lựa chọn Kan Bakery. Chúng tôi mong muốn được phục vụ bạn những chiếc bánh tuyệt vời nhất!</h>
            </div>
        </div>
    </div>
</section>
<?php
include_once __DIR__ . '/../partials/footer.php';
?>