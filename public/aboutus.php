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
                        <button class="btn  d-inline-flex align-items-center rounded collapsed p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#district1">
                            <h5 class="mx-1 m-0">Ninh Kiều</h5>
                        </button>
                        <div class="collapse" id="district1">
                            <div class="d-flex flex-column ps-4">
                                <h5>Địa chỉ 1</h5>
                                <p><i class="fa fa-solid text-black fa-location-dot"></i>&nbsp; Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TPCT</p>
                                <p><i class="fa text-black fa-phone"></i>&nbsp; 0321456780</p>
                            </div>
                        </div>
                        <hr class="m-0">
                    </li>
                   <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#district2">
                            <h5 class="mx-1 m-0">Bình Thủy</h5>
                        </button>
                        <div class="collapse" id="district2">
                            <div class="d-flex flex-column ps-4">
                                <h5>Địa chỉ 2</h5>
                                <p><i class="fa fa-solid text-black fa-location-dot"></i>&nbsp; Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TPCT</p>
                                <p><i class="fa text-black fa-phone"></i>&nbsp; 0321456780</p>
                            </div>
                        </div>
                        <hr class="m-0">
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#district3">
                            <h5 class="mx-1 m-0">Cái Răng</h5>
                        </button>
                        <div class="collapse" id="district3">
                            <div class="d-flex flex-column ps-4">
                                <h5>Địa chỉ 3</h5>
                                <p><i class="fa fa-solid text-black fa-location-dot"></i>&nbsp; Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TPCT</p>
                                <p><i class="fa text-black fa-phone"></i>&nbsp; 0321456780</p>
                            </div>
                        </div>
                        <hr class="m-0">
                    </li>
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded collapsed p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#district4">
                            <h5 class="mx-1 m-0">Ô Môn</h5>
                        </button>
                        <div class="collapse" id="district4">
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

<?php
include_once __DIR__ . '/../partials/footer.php';
?>