<?php include "view/header.php"; ?>
<style>
    .cr-form-control.error-placeholder {
        color: red;
    }

    .error-message {
        margin-top: 5px;
    }
</style>

<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Register</h2>
                        <span> <a href="index.php">Home</a> - Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Register -->
<section class="section-register padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Đăng Ký</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Đăng ý thành công. Bạn sẽ được chuyển hướng sang trang Đăng Nhập trong 3s tới</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cr-register" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="form-logo">
                        <img src="view/assets/img/logo/logo.png" alt="logo">
                        <!-- <img src="../images/hien.svg" alt=""> -->
                    </div>
                    <form class="cr-content-form" action="index.php?act=dangky" method="post">
                        <div class="row">
                            <!-- Thông báo lỗi -->
                            <div class="col-12">
                                <!-- <div id="error-message" style="color: red; font-weight: bold;"></div> -->
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Họ và tên*</label>
                                    <!-- <div id="error-message" style="color: red; font-weight: bold;"></div> -->

                                    <input name="fullname" type="text" placeholder="Nhập Họ Và Tên Của Bạn" class="cr-form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <!-- <div id="error-message" style="color: red; font-weight: bold;"></div> -->
                                    <input name="email" type="email" placeholder="Nhập Email Của Bạn" class="cr-form-control">
                                    <div id="error-message" style="color: red; font-weight: bold;"></div>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Số Điện Thoại*</label>
                                    <input name="phone" type="text" placeholder="Nhập Số Điện Thoại Của Bạn" class="cr-form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Địa Chỉ*</label>
                                    <input name="address" type="text" placeholder="Địa Chỉ Chi Tiết Số Nhà Ngõ Thôn Xóm..." class="cr-form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tỉnh*</label>
                                    <select name="name_province" class="cr-form-control" id="city" aria-label=".form-select-sm">
                                        <option value="" selected>Chọn tỉnh thành</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Huyện*</label>
                                    <select name="name_district" class="cr-form-control" id="district" aria-label=".form-select-sm">
                                        <option value="" selected>Chọn quận huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Xã*</label>
                                    <select name="name_ward" class="cr-form-control" id="ward" aria-label=".form-select-sm">
                                        <option value="" selected>Chọn phường xã</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mật Khẩu*</label>
                                    <div style="position: relative;">
                                        <input name="password" type="password" placeholder="Nhập Mật Khẩu Của Bạn" class="cr-form-control">
                                        <img height="30px" src="view/assets/img/logo/hien.svg" alt="Hiện mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                        <img height="30px" src="view/assets/img/logo/an.svg" alt="Ẩn mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); display: none; cursor: pointer;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label>Nhập Lại Mật Khẩu*</label>
                                    <div style="position: relative;">
                                        <input name="repassword" type="password" placeholder="Nhập Lại Mật Khẩu Của Bạn" class="cr-form-control">
                                        <img height="30px" src="view/assets/img/logo/hien.svg" alt="Hiện mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('repassword', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                        <img height="30px" src="view/assets/img/logo/an.svg" alt="Ẩn mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('repassword', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); display: none; cursor: pointer;">
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group " style="color: green; font-weight: bold;">
                                    <label style="color: green;"><?php
                                                                    if (isset($thongbao) && ($thongbao != "")) {
                                                                        echo $thongbao;
                                                                    } ?>
                                    </label>
                                </div>
                            </div>
                            <div class="cr-register-buttons">
                                <input type="submit" name="dangky" value="Đăng ký" class="cr-button">
                                <a href="index.php?act=dangnhap" class="link">Have an account?</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include "view/footer.php"; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
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
</script>


  <script>
    document.querySelector(".cr-content-form").addEventListener("submit", function(event) {
        let isValid = true;

        // Hàm đặt lỗi
        function setError(element, message) {
            isValid = false;
            element.style.borderColor = "red";

            // Tìm hoặc tạo mới phần tử hiển thị lỗi
            let errorElement = element.parentNode.querySelector(".error-message");
            if (!errorElement) {
                errorElement = document.createElement("div");
                errorElement.classList.add("error-message");
                errorElement.style.color = "red";
                errorElement.style.fontSize = "0.9em";
                element.parentNode.appendChild(errorElement);
            }
            errorElement.textContent = message;
        }

        // Hàm xóa lỗi
        function clearError(element) {
            element.style.borderColor = "";
            const errorElement = element.parentNode.querySelector(".error-message");
            if (errorElement) {
                errorElement.remove();
            }
        }

        // Hàm kiểm tra từng trường
        function validateField(element, validationFn, errorMessage) {
            clearError(element); // Xóa lỗi cũ
            if (!validationFn(element.value)) {
                setError(element, errorMessage); // Thiết lập lỗi mới
                return false;
            }
            return true;
        }

        // Kiểm tra từng trường
        const fullName = document.querySelector("input[name='fullname']");
        if (!validateField(fullName, value => value.trim() !== "", "Họ và tên không được để trống.")) {
            event.preventDefault();
            fullName.focus();
            return;
        }

        const email = document.querySelector("input[name='email']");
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!validateField(email, value => emailRegex.test(value), "Email phải hợp lệ, chỉ có một '@' và phải có phần tên miền.")) {
            event.preventDefault();
            email.focus();
            return;
        }

        const phone = document.querySelector("input[name='phone']");
        const phoneRegex = /^[0-9]{10}$/;
        if (!validateField(phone, value => phoneRegex.test(value), "Số điện thoại phải có đúng 10 ký tự số.")) {
            event.preventDefault();
            phone.focus();
            return;
        }

        const address = document.querySelector("input[name='address']");
        if (!validateField(address, value => value.trim() !== "", "Địa chỉ không được để trống.")) {
            event.preventDefault();
            address.focus();
            return;
        }

        const province = document.querySelector("select[name='name_province']");
        if (!validateField(province, value => value !== "", "Tỉnh không được để trống.")) {
            event.preventDefault();
            province.focus();
            return;
        }

        const district = document.querySelector("select[name='name_district']");
        if (!validateField(district, value => value !== "", "Huyện không được để trống.")) {
            event.preventDefault();
            district.focus();
            return;
        }

        const ward = document.querySelector("select[name='name_ward']");
        if (!validateField(ward, value => value !== "", "Xã không được để trống.")) {
            event.preventDefault();
            ward.focus();
            return;
        }

        const password = document.querySelector("input[name='password']");
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,25}$/;
        if (!validateField(password, value => passwordRegex.test(value), "Mật khẩu phải từ 8-25 ký tự, có ít nhất 1 chữ hoa, 1 ký tự đặc biệt và 1 chữ số.")) {
            event.preventDefault();
            password.focus();
            return;
        }

        const repassword = document.querySelector("input[name='repassword']");
        if (!validateField(repassword, value => value === password.value, "Nhập lại mật khẩu phải giống mật khẩu.")) {
            event.preventDefault();
            repassword.focus();
            return;
        }
    });

</script>


</script>

<script>
    function togglePasswordVisibility(inputName, icon) {
        const input = document.querySelector(`input[name='${inputName}']`);
        const showIcon = icon.parentElement.querySelector("img[src='view/assets/img/logo/hien.svg']");
        const hideIcon = icon.parentElement.querySelector("img[src='view/assets/img/logo/an.svg']");

        if (input.type === "password") {
            input.type = "text";
            showIcon.style.display = "none";
            hideIcon.style.display = "block";
        } else {
            input.type = "password";
            showIcon.style.display = "block";
            hideIcon.style.display = "none";
        }
    }
</script>