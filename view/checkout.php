<?php include "view/header.php" ?>

<style>
    .cr-form-control.error {
        border: 1px solid red;
        background-color: #ffe6e6;
    }
</style>
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Checkout</h2>
                        <span> <a href="index.php">Home</a> - Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout section -->
<section class="cr-checkout-section padding-tb-100">
    <div class="container">
        <div class="container">
            <?php if (!empty($giohang)): ?>
                <?php if (isset($_SESSION['taikhoan'])): ?>
                    <div class="row">
                        <!-- Sidebar Area Start -->
                        <div class="cr-checkout-rightside col-lg-4 col-md-12">
                            <div class="cr-sidebar-wrap">
                                <!-- Sidebar Summary Block -->
                                <div class="cr-sidebar-block">
                                    <div class="cr-sb-title">
                                        <h3 class="cr-sidebar-title">Summary</h3>
                                    </div>
                                    <div class="cr-sb-block-content">
                                        <div class="cr-checkout-summary">
                                            <?php
                                            $subtotal = 0;
                                            $totalQuantity = 0; // Biến để lưu tổng số lượng sản phẩm
                                            foreach ($giohang as $item) {
                                                $subtotal += $item['subtotal'];
                                                $totalQuantity += $item['quantity']; // Cộng số lượng sản phẩm
                                            }
                                            $deliveryCharges = isset($_POST['delivery']) && $_POST['delivery'] === 'flat' ? 5 : 0;
                                            $totalAmount = $subtotal + $deliveryCharges;
                                            ?>
                                            <div>
                                                <span class="text-left">Sub-Total</span>
                                                <span class="text-right"><?= $subtotal ?> $</span>
                                            </div>
                                            <div>
                                                <span class="text-left">Delivery Charges</span>
                                                <span class="text-right"><?= $deliveryCharges ?> $</span>
                                            </div>
                                            <div class="cr-checkout-summary-total">
                                                <span class="text-left">Total Amount</span>
                                                <span class="text-right"><?= $totalAmount ?> $</span>
                                            </div>
                                            <div class="cr-checkout-summary-total">
                                                <span class="text-left">Total Quantity</span>
                                                <span class="text-right"><?= $totalQuantity ?></span> <!-- Hiển thị tổng số lượng sản phẩm -->
                                            </div>
                                        </div>

                                        <!-- Products in the cart -->
                                        <div class="cr-checkout-pro">
                                            <?php foreach ($giohang as $checkout) :
                                                $img = "upload/" . $checkout['img'];
                                                $linkpro = "index.php?act=productdetails&idproduct=" . $checkout['idproduct'];
                                            ?>
                                                <div class="col-sm-12 mb-6">
                                                    <div class="cr-product-inner">
                                                        <div class="cr-pro-image-outer">
                                                            <div class="cr-pro-image">
                                                                <a href="<?= $linkpro ?>" class="image">
                                                                    <img class="main-image" src="<?= $img ?>" width="50px" alt="Product">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="cr-pro-content cr-product-details mb-5">
                                                            <h5 class="cr-pro-title">
                                                                <a href="<?= $linkpro ?>"><?= $checkout['nameproduct'] ?></a>
                                                            </h5>
                                                            <p class="cr-price">
                                                                <span class="new-price"><?= $checkout['price'] ?> $</span>
                                                            </p>
                                                            <div style="display: flex;">Quantity: <p style="font-weight:bold" class="ms-1"> <?= $checkout['quantity'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sidebar Summary Block -->

                                <!-- Delivery Method -->
                                <div class="cr-sidebar-wrap cr-checkout-del-wrap">
                                    <div class="cr-sidebar-block">
                                        <div class="cr-sb-title">
                                            <h3 class="cr-sidebar-title">Delivery Method</h3>
                                        </div>
                                        <div class="cr-sb-block-content">
                                            <div class="cr-checkout-del">
                                                <div class="cr-del-desc">Please select the preferred shipping method to use on this order.</div>
                                                <form method="post" action="">
                                                    <span class="cr-del-option">
                                                        <span>
                                                            <span class="cr-del-opt-head">Free Shipping</span>
                                                            <input type="radio" id="del1" name="delivery" value="free"
                                                                <?= !isset($_POST['delivery']) || $_POST['delivery'] === 'free' ? 'checked' : '' ?> onchange="this.form.submit();">
                                                            <label for="del1">Rate - $0.00</label>
                                                        </span>
                                                        <span>
                                                            <span class="cr-del-opt-head">Fast Rate</span>
                                                            <input type="radio" id="del2" name="delivery" value="flat"
                                                                <?= isset($_POST['delivery']) && $_POST['delivery'] === 'flat' ? 'checked' : '' ?> onchange="this.form.submit();">
                                                            <label for="del2">Rate - $5.00</label>
                                                        </span>
                                                    </span>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delivery Method -->
                                <div class="cr-sidebar-wrap cr-checkout-pay-wrap">
                                    <!-- Sidebar Payment Block -->
                                    <div class="cr-sidebar-block">
                                        <div class="cr-sb-title">
                                            <h3 class="cr-sidebar-title">Payment Method</h3>
                                        </div>
                                        <div class="cr-sb-block-content">
                                            <div class="cr-checkout-pay">
                                                <div class="cr-pay-desc">Please select the preferred payment method to use on this order.</div>
                                                <form action="#" class="payment-options">
                                                    <span class="cr-pay-option">
                                                        <span>
                                                            <input type="radio" id="pay1" name="radio-group" value="COD" checked>
                                                            <label for="pay1">Cash On Delivery</label>
                                                        </span>
                                                    </span>
                                                    <span class="cr-pay-option">
                                                        <span>
                                                            <input type="radio" id="pay3" name="radio-group" value="BankTransfer">
                                                            <label for="pay3">Bank Transfer</label>
                                                        </span>
                                                    </span>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sidebar Payment Block -->
                                </div>
                                <div class="cr-sidebar-wrap cr-check-pay-img-wrap">
                                    <!-- Sidebar Payment Block -->
                                    <div class="cr-sidebar-block">
                                        <div class="cr-sb-title">
                                            <h3 class="cr-sidebar-title">Payment Method</h3>
                                        </div>
                                        <div class="cr-sb-block-content">
                                            <div class="cr-check-pay-img-inner">
                                                <?php
                                                for ($index = 1; $index <= 3; $index++) :
                                                ?>
                                                    <div class="cr-check-pay-img">
                                                        <img src="view/assets/img/thanhtoan/<?= $index ?>.png" alt="payment" height="22px">
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sidebar Payment Block -->
                                </div>
                                <div class="cr-sidebar-wrap cr-check-pay-img-wrap">
                                    <!-- Sidebar Payment Block -->
                                    <div class="cr-sidebar-block">
                                        <div class="cr-sb-title">
                                            <h3 class="cr-sidebar-title">Shipping Method</h3>
                                        </div>
                                        <div class="cr-sb-block-content">

                                            <div class="cr-check-pay-img-inner">
                                                <?php
                                                for ($index = 1; $index <= 10; $index++) :
                                                ?>
                                                    <div class="cr-check-pay-img" style="margin: 5px;">
                                                        <img src="view/assets/img/vanchuyen/<?= $index ?>.png" alt="payment">
                                                    </div>
                                                <?php endfor; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Sidebar Payment Block -->
                                </div>
                            </div>
                        </div>

                        <div class="cr-checkout-leftside col-lg-8 col-md-12 m-t-991">
                            <!-- checkout content Start -->
                            <div class="cr-checkout-content">
                                <div class="cr-checkout-inner">
                                    <div class="cr-checkout-wrap">
                                        <div class="cr-checkout-block cr-check-bill">
                                            <h3 class="cr-checkout-title">Billing Details</h3>
                                            <div class="cr-bl-block-content mb-3">
                                                <div class="cr-check-subtitle mb-5">Checkout Options</div>
                                                <!-- Existing Address Form -->
                                                <form method="post" id="existingAddressForm" action="index.php?act=placeorder">
                                                    <div id="existing-address-form" class="cr-check-bill-form mb-minus-24">
                                                        <span class="cr-bill-wrap cr-bill-half">
                                                            <label>Họ và tên*</label>
                                                            <input id="fullname" name="fullname" type="text" value="<?= $fullname ?>" placeholder="Nhập Họ Và Tên Của Bạn" class="cr-form-control mb-1">
                                                            <small class="error-message mb-3 ms-3" style="display: block; color:red; font-size:14px;"></small>
                                                        </span>
                                                        <span class="cr-bill-wrap cr-bill-half">
                                                            <label>Số Điện Thoại*</label>
                                                            <input id="phone" name="phone" type="text" value="<?= $phone ?>" placeholder="Nhập Số Điện Thoại Của Bạn" class="cr-form-control mb-1">
                                                            <small class="error-message mb-3 ms-3" style="display: block; color:red; font-size:14px;"></small>
                                                        </span>
                                                        <span class="cr-bill-wrap">
                                                            <label>Địa Chỉ*</label>
                                                            <input id="address" name="address" type="text" value="<?= $address ?>" placeholder="Địa Chỉ Chi Tiết Số Nhà Ngõ Thôn Xóm..." class="cr-form-control mb-1">
                                                            <small class="error-message mb-3 ms-3" style="display: block; color:red; font-size:14px;"></small>
                                                        </span>
                                                        <span class="cr-bill-wrap cr-bill-half">
                                                            <label>Tỉnh*</label>
                                                            <span class="cr-bl-select-inner">
                                                                <select id="city" name="name_province" class="cr-form-control mb-1">
                                                                    <option value="" >Chọn Tỉnh Thành</option>
                                                                    <option selected><?= $name_province  ?></option>
                                                                </select>
                                                            </span>
                                                            <small class="error-message mb-3 ms-3" style="display: block; color:red; font-size:14px;"></small>
                                                        </span>
                                                        <span class="cr-bill-wrap cr-bill-half">
                                                            <label>Huyện*</label>
                                                            <span class="cr-bl-select-inner">
                                                                <select id="district" name="name_district" class="cr-form-control mb-1">
                                                                    <option value="" >Chọn Quận Huyện</option>
                                                                    <option selected><?= $name_district  ?></option>
                                                                </select>
                                                            </span>
                                                            <small class="error-message mb-3 ms-3" style="display: block; color:red; font-size:14px;"></small>
                                                        </span>
                                                        <span class="cr-bill-wrap cr-bill-half">
                                                            <label>Xã*</label>
                                                            <span class="cr-bl-select-inner">
                                                                <select id="ward" name="name_ward" class="cr-form-control mb-1">
                                                                    <option value="" >Chọn Xã Phường</option>
                                                                    <option selected><?= $name_ward  ?></option>
                                                                </select>
                                                            </span>
                                                            <small class="error-message mb-3 ms-3" style="display: block; color:red; font-size:14px;"></small>
                                                        </span>

                                                    </div>

                                            </div>
                                            <div class="cr-bl-block-content">
                                                <div class="cr-check-subtitle">Comment</div>
                                                        <div class="cr-sidebar-wrap cr-checkout-del-wrap" style="border: none;">
                                                            <!-- Sidebar Summary Block -->
                                                            <div class="cr-checkout-del">
                                                                <span class="cr-del-option">
                                                                    <span class="cr-del-commemt mb-3">
                                                                        <span class="cr-del-opt-head mb-3">Add Comments About Your Order</span>
                                                                    </span>
                                                                    <textarea name="comment" placeholder="Comments" ></textarea>

                                                            </div>
                                                            <!-- Sidebar Summary Block -->
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        .cr-bl-block-content-bank {
                                            display: flex;
                                        }
                                    </style>
                                    <div class="cr-checkout-content mt-3" id="banktranfer">
                                        <?php
                                        $randomChars = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 6);
                                        // Ghép chuỗi
                                        $noidung = "QBS" . $totalAmount . $randomChars . $phone;
                                        $url = "https://img.vietqr.io/image/mbbank-014685-qr_only.png?amount=$totalAmount&addInfo=" . urlencode($noidung) . "&accountName=" . urlencode("DANG BAO BIEN");
                                        ?>
                                        <div class="cr-checkout-inner">
                                            <div class="cr-checkout-wrap">
                                                <div class="cr-checkout-block cr-check-bill">
                                                    <h3 class="cr-checkout-title">Billing Details</h3>
                                                    <div class="cr-bl-block-content-bank">
                                                        <div class="cr-check-subtitle mb-5" style="display:block">Bank Tranfer</div>
                                                        <img src="<?= $url ?>" alt="" width="300px" height="300px">
                                                        <div class="content-bank mt-3 ms-3">
                                                            <div class="bank ">
                                                                <p><b>Tên Ngân Hàng</b></p>
                                                                <p>MB BANK</p>
                                                            </div>
                                                            <div class="bank">
                                                                <p><b>Tên Tài Khoản</b></p>
                                                                <p>DANG BAO BIEN</p>
                                                            </div>
                                                            <div class="bank">
                                                                <p><b>Số Tài Khoản</b></p>
                                                                <p>014685</p>
                                                            </div>
                                                            <div class="bank">
                                                                <p><b>Số tiền</b></p>
                                                                <p><?= $totalAmount ?></p>
                                                            </div>
                                                            <div class="bank">
                                                                <p><b>Nội Dung</b></p>
                                                                <p><?= $noidung ?></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Hidden inputs to send data -->
                                    <input type="hidden" name="idaccount" value="<?= $_SESSION['taikhoan']['idaccount'] ?>">
                                    <input type="hidden" name="delivery" value="<?= isset($_POST['delivery']) ? $_POST['delivery'] : 'free' ?>"> <!-- Phương thức giao hàng -->
                                    <input type="hidden" name="paymentmethod" value="<?= isset($_POST['radio-group']) ? $_POST['radio-group'] : 'COD' ?>"> <!-- Phương thức thanh toán -->
                                    <input type="hidden" name="fullname" value="<?= $fullname ?>">


                                    <!-- Dữ liệu giỏ hàng -->
                                    <?php foreach ($giohang as $item): ?>
                                        <input type="hidden" name="idproduct" value="<?= $item['idproduct'] ?>">
                                        <input type="hidden" name="nameproduct" value="<?= $item['nameproduct'] ?>">
                                        <input type="hidden" name="quantity" value="<?= $item['quantity'] ?>">
                                        <input type="hidden" name="price" value="<?= $item['price'] ?>">
                                        <input type="hidden" name="subtotal" value="<?= $totalAmount ?>">
                                        <input type="hidden" name="img" value="<?= $item['img'] ?>">

                                    <?php endforeach; ?>

                                    <button type="submit" class="btn-submit cr-button mt-3">Place Order</button>
                                    </form>

                                    <!--cart content End -->
                                </div>
                            </div>


                        </div>
                    </div>


                <?php else: ?>
                    <!-- Thông báo khi người dùng chưa đăng nhập -->
                    <p style="font-size: 14px; text-align: center; color: #999;">
                        Vui lòng <a href="index.php?act=dangnhap" style="color: #006f3c; text-decoration: none;">đăng nhập</a> để truy cập nội dung này.
                    </p>
                <?php endif; ?>
            <?php else: ?>
                <style>
                    .buttonback {
                        display: flex;
                        justify-content: center;
                    }
                </style>
                <div class="text-center mb-5">
                    <i class="ri-shopping-cart-line" style="font-size: 48px"></i>
                    <h4 class="mt-3">Giỏ hàng trống</h4>
                    <p class="text-muted mb-2">Hãy thêm sản phẩm vào giỏ hàng của bạn</p>
                    <div class="buttonback">
                        <button class="cr-button">
                            <a href="index.php" style="color:#FFF">
                                <i class="ri-arrow-left-line me-2"></i>Tiếp tục mua sắm
                            </a></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>

</section>
<!-- Checkout section End -->
<?php include "view/footer.php" ?>

<script src="view/assets/js/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Name); // Gán Name vào value
        }
        citis.onchange = function() {
            districts.length = 1; // Xóa các tùy chọn cũ
            wards.length = 1;
            if (this.value !== "") {
                const result = data.filter((n) => n.Name === this.value); // So sánh Name thay vì Id
                for (const k of result[0].Districts) {
                    districts.options[districts.options.length] = new Option(k.Name, k.Name); // Gán Name
                }
            }
        };
        districts.onchange = function() {
            wards.length = 1;
            const dataCity = data.filter((n) => n.Name === citis.value); // So sánh Name
            if (this.value !== "") {
                const dataWards = dataCity[0].Districts.filter((n) => n.Name === this.value)[0].Wards; // So sánh Name
                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Name); // Gán Name
                }
            }
        };
    }
    console.log(citis);
</script>

<script>
   function validateForm() {
    const fullname = document.getElementById("fullname");
    const phone = document.getElementById("phone");
    const address = document.getElementById("address");


    // Hàm đặt lỗi và viền đỏ
    function setError(element, message) {
        const errorElement = element.nextElementSibling;
        errorElement.textContent = message;
        element.style.borderColor = "red";
        element.focus();
    }

    // Hàm xóa lỗi và reset viền
    function clearError(element) {
        const errorElement = element.nextElementSibling;
        errorElement.textContent = "";
        element.style.borderColor = "";
    }

    // Kiểm tra từng input và dừng khi gặp lỗi
    if (!fullname.value.trim()) {
        setError(fullname, "Họ và tên không được để trống");
        return false;
    }
    clearError(fullname);

    if (!phone.value.trim() || !/^\d{10}$/.test(phone.value.trim())) {
        setError(phone, "Số điện thoại không hợp lệ (phải có 10 chữ số)");
        return false;
    }
    clearError(phone);

    if (!address.value.trim()) {
        setError(address, "Địa chỉ không được để trống");
        return false;
    }
    clearError(address);

    const province = document.querySelector("select[name='name_province']");
if (!validateField(province, value => value !== "" && value !== "Chọn Tỉnh Thành", "Tỉnh không được để trống.")) {
    event.preventDefault();
    province.focus();
    return;
}

const district = document.querySelector("select[name='name_district']");
if (!validateField(district, value => value !== "" && value !== "Chọn Quận Huyện", "Huyện không được để trống.")) {
    event.preventDefault();
    district.focus();
    return;
}

const ward = document.querySelector("select[name='name_ward']");
if (!validateField(ward, value => value !== "" && value !== "Chọn Xã Phường", "Xã không được để trống.")) {
    event.preventDefault();
    ward.focus();
    return;
}


    return true; // Form hợp lệ
}

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const bankTransferSection = document.getElementById("banktranfer");
        const paymentOptions = document.querySelectorAll("input[name='radio-group']");

        // Ẩn phần Bank Transfer mặc định
        bankTransferSection.style.display = "none";

        paymentOptions.forEach(option => {
            option.addEventListener("change", function() {
                if (this.value === "BankTransfer") {
                    bankTransferSection.style.display = "block";
                } else {
                    bankTransferSection.style.display = "none";
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const paymentOptions = document.querySelectorAll("input[name='radio-group']");
        const paymentMethodInput = document.querySelector("input[name='paymentmethod']");

        paymentOptions.forEach(option => {
            option.addEventListener("change", function() {
                paymentMethodInput.value = this.value; // Cập nhật giá trị ẩn
            });
        });
    });
</script>