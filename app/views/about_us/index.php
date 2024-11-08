<?php $this->layout('layout/client_layout',['title'=>$title])?>

<?php $this->start("page")?>
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
                        <h5 class="mx-1">Tìm địa chỉ:</h5>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="customerAddress1Input" placeholder="Địa chỉ.." data-search>
                            <label for="customerAddress1Input">Địa chỉ..</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <ul class="list-unstyled w-100 stores" data-address-ul>
                    <template>
                    <li class="mb-1">
                        <button class="btn  d-inline-flex align-items-center rounded p-0 py-2 border-0" data-bs-toggle="collapse" data-bs-target="#district1" data-district-button>
                            <h5 class="mx-1 m-0" data-address-district></h5>
                        </button>
                        <div class="collapse show" id="district" data-district>
                            <div class="d-flex flex-column ps-4">
                                <div class="d-flex"><i class="fa fa-solid text-black fa-location-dot"></i>&nbsp;<p data-address-detail></p></div>
                                <div class="d-flex"><i class="fa text-black fa-phone"></i>&nbsp;<p data-address-phone></p></div>
                            </div>
                        </div>
                        <hr class="m-0">
                    </li>
                    </template>
                </div>
            </div>
            <div class="col-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15267.618906843942!2d105.74434169473466!3d10.037596856148882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ-G6p24gVGjGoSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1728767632365!5m2!1svi!2s" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <hr class="container">
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
                    <img src="assets/client/images/about_us/aboutus1.jpg" alt="" class="img-thumbnail w-25">
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
                        <img src="assets/client/images/about_us/aboutus2.jpg" alt="" class="img-thumbnail w-50">                      
                    </div>
                    <h5 class="text-justify text-center pt-2">Cảm ơn bạn đã lựa chọn Kan Bakery. Chúng tôi mong muốn được phục vụ bạn những chiếc bánh tuyệt vời nhất!</h>
            </div>
        </div>
    </div>
</section>
<?php $this->stop()?>

<?php $this->start("page_specific_js")?>
<script>
const addressContainer = document.querySelector("[data-address-ul]"); // Lấy container cha
const searchInput = document.querySelector("[data-search]");
const template = document.querySelector("template"); // Lấy template từ HTML

let addresses = [
    { district: "Ninh Kiều", detail: "Đường 3/2, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ", phone: '0321456780' },
    { district: "Ô Môn", detail: "Tôn Đức Thắng, Khu Vực 5, P. Châu Văn Liêm, Q.Ô Môn, TP. Cần Thơ", phone: '03123442780' },
    { district: "Bình Thủy", detail: "Đường Cách mạng tháng 8, P. Bùi Hữu Nghĩa, Q.Bình Thủy, TP.Cần Thơ", phone: '0377752180' },
    { district: "Cái Răng", detail: "KV Yên Hạ, P.Lê Bình, Q.Cái Răng, TP.Cần Thơ", phone: '0912345622' }
];
let districtCounter = 1; 
// Gắn các địa chỉ vào addressContainer
let addressList = addresses.map(address => {
    const addressElement = template.content.cloneNode(true).firstElementChild;

    // Gắn dữ liệu vào các trường trong template
    addressElement.querySelector("[data-address-district]").textContent = address.district;
    addressElement.querySelector("[data-address-detail]").textContent = address.detail;
    addressElement.querySelector("[data-address-phone]").textContent = address.phone;
    
    const districtId = `district${districtCounter}`;
    const districtElement = addressElement.querySelector("[data-district]");
    const districtButton =addressElement.querySelector("[data-district-button]");
    districtElement.id = districtId;  // Gán id cho phần tử collapse
    districtButton.setAttribute("data-bs-target",`#${districtId}`)
    // Tăng biến đếm để gán id cho phần tử tiếp theo
    console.log(districtCounter)
    districtCounter++;
    // Thêm phần tử vào DOM
    addressContainer.appendChild(addressElement);

    // Trả về một đối tượng chứa cả thông tin địa chỉ và element tương ứng
    return { ...address, element: addressElement };
});

// Bộ lọc tìm kiếm
searchInput.addEventListener("input", (e) => {
    const value = e.target.value.toLowerCase();
    addressList.forEach(address => {
        const isVisible = address.district.toLowerCase().includes(value) || address.detail.toLowerCase().includes(value);
        if (isVisible) {
            address.element.removeAttribute("hidden"); // Hiển thị phần tử
        } else {
            address.element.setAttribute("hidden", "true"); // Ẩn phần tử
        }
    });
});

</script>
<?php $this->stop()?>