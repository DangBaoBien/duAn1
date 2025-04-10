<?php include "view/header.php"; ?>


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
                        <h2>Cập Nhật Tài Khoản</h2>
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
                    <form class="cr-content-form" action="index.php?act=mya" method="post">
                        <div class="row">
                            <!-- Thông báo lỗi -->
                            <div class="col-12">
                                <div id="error-message" style="color: red; font-weight: bold;"></div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Họ và tên*</label>
                                    <input name="fullname" type="text" value="<?= $fullname ?>" placeholder="Nhập Họ Và Tên Của Bạn" class="cr-form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input name="email" type="email" value="<?= $email ?>" placeholder="Nhập Email Của Bạn" class="cr-form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Số Điện Thoại*</label>
                                    <input name="phone" type="text" value="<?= $phone ?>" placeholder="Nhập Số Điện Thoại Của Bạn" class="cr-form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Địa Chỉ*</label>
                                    <input name="address" type="text" value="<?= $address ?>" placeholder="Địa Chỉ Chi Tiết Số Nhà Ngõ Thôn Xóm..." class="cr-form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tỉnh*</label>
                                    <select name="name_province" class="cr-form-control" id="city" aria-label=".form-select-sm">
                                        <option value="" selected><?= $name_province ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Huyện*</label>
                                    <select name="name_district" class="cr-form-control" id="district" aria-label=".form-select-sm">
                                        <option value="" selected><?= $name_district ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Xã*</label>
                                    <select name="name_ward" class="cr-form-control" id="ward" aria-label=".form-select-sm">
                                        <option value="" selected><?= $name_ward ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="idaccount" value="<?= $idaccount ?>">
                                <!-- <div class="form-group">
                                <label>Nhập Lại Mật Khẩu*</label>
                                <div style="position: relative;">
                                    <input name="repassword" type="password" placeholder="Nhập Lại Mật Khẩu Của Bạn" class="cr-form-control">
                                    <img height="30px" src="view/assets/img/logo/hien.svg" alt="Hiện mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('repassword', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                    <img height="30px" src="view/assets/img/logo/an.svg" alt="Ẩn mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('repassword', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); display: none; cursor: pointer;">
                                </div>
                            </div> -->
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

                                <input type="submit" name="capnhattk" value="Cập Nhật" class="cr-button">
                                <input type="reset" value="Nhập lại" class="cr-button">
                                <a class="cr-button" href="index.php?act=doimk">Đổi Mật Khẩu</a>
                                <a
                                    class="cr-button-danger"
                                    href="index.php?act=xoatk&idaccount=<?= $idaccount ?>"
                                    onclick="return confirm('Bạn có muốn xóa tài khoản này không?')">
                                    Xóa Tài Khoản
                                </a>

                                <!-- <a href="index.php?act=dangnhap" class="link">Have an account?</a> -->
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
        let errorMessage = "";
        let firstInvalidElement = null;

        // Họ và tên không được để trống
        const fullName = document.querySelector("input[name='fullname']");
        if (fullName.value.trim() === "") {
            isValid = false;
            errorMessage = "Họ và tên không được để trống.";
            firstInvalidElement = fullName;
        }

        // Nếu không có lỗi trước đó, kiểm tra Email
        if (isValid) {
            const email = document.querySelector("input[name='email']");
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                isValid = false;
                errorMessage = "Email phải có @ và . ";
                firstInvalidElement = email;
            }
        }

        // Nếu không có lỗi trước đó, kiểm tra Số điện thoại
        if (isValid) {
            const phone = document.querySelector("input[name='phone']");
            const phoneRegex = /^[0-9]{10}$/;
            if (!phoneRegex.test(phone.value)) {
                isValid = false;
                errorMessage = "Số điện thoại phải có đúng 10 ký tự số.";
                firstInvalidElement = phone;
            }
        }

        // Nếu không có lỗi trước đó, kiểm tra Địa chỉ
        if (isValid) {
            const address = document.querySelector("input[name='address']");
            if (address.value.trim() === "") {
                isValid = false;
                errorMessage = "Địa chỉ không được để trống.";
                firstInvalidElement = address;
            }
        }

        // Kiểm tra Tỉnh, Huyện, Xã
        if (isValid) {
            const province = document.querySelector("select[name='name_province']");
            if (province.value === "") {
                isValid = false;
                errorMessage = "Tỉnh không được để trống.";
                firstInvalidElement = province;
            }
        }
        if (isValid) {
            const district = document.querySelector("select[name='name_district']");
            if (district.value === "") {
                isValid = false;
                errorMessage = "Huyện không được để trống.";
                firstInvalidElement = district;
            }
        }
        if (isValid) {
            const ward = document.querySelector("select[name='name_ward']");
            if (ward.value === "") {
                isValid = false;
                errorMessage = "Xã không được để trống.";
                firstInvalidElement = ward;
            }
        }

        // Kiểm tra Mật khẩu
        // if (isValid) {
        //     const password = document.querySelector("input[name='password']");
        //     const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,25}$/;
        //     if (!passwordRegex.test(password.value)) {
        //         isValid = false;
        //         errorMessage = "Mật khẩu phải từ 8-25 ký tự, có ít nhất 1 chữ hoa, 1 ký tự đặc biệt và 1 chữ số.";
        //         firstInvalidElement = password;
        //     }
        // }

        // Kiểm tra Nhập lại mật khẩu
        // if (isValid) {
        //     const repassword = document.querySelector("input[name='repassword']");
        //     const password = document.querySelector("input[name='password']").value;
        //     if (password !== repassword.value) {
        //         isValid = false;
        //         errorMessage = "Nhập lại mật khẩu phải giống mật khẩu.";
        //         firstInvalidElement = repassword;
        //     }
        // }

        // Nếu có lỗi, ngăn submit form, focus vào phần tử đầu tiên có lỗi và hiển thị lỗi
        if (!isValid) {
            event.preventDefault();
            document.getElementById("error-message").innerHTML = errorMessage;
            firstInvalidElement.focus();
        } else {
            document.getElementById("error-message").innerHTML = "";
        }
    });
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