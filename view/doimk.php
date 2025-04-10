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
                    <form class="cr-content-form" action="index.php?act=doimk" method="post" onsubmit="return validateForm()">
                        <div class="row">
                            <!-- Thông báo lỗi -->
                            <div class="col-12">
                                <div class="form-group">
                                    <div id="error-message" style="color: red; font-weight: bold;"></div>

                                </div>
                            </div>

                            <!-- Mật khẩu cũ -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mật Khẩu Cũ*</label>
                                    <div style="position: relative;">
                                        <input name="oldpassword" id="oldpassword" type="password" placeholder="Nhập Mật Khẩu Cũ" class="cr-form-control">
                                        <img height="30px" src="view/assets/img/logo/hien.svg" alt="Hiện mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('oldpassword', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                        <img height="30px" src="view/assets/img/logo/an.svg" alt="Ẩn mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('oldpassword', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); display: none; cursor: pointer;">
                                    </div>
                                </div>
                            </div>

                            <!-- Mật khẩu mới -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mật Khẩu Mới*</label>
                                    <div style="position: relative;">
                                        <input name="password" id="password" type="password" placeholder="Nhập Mật Khẩu Mới" class="cr-form-control">
                                        <img height="30px" src="view/assets/img/logo/hien.svg" alt="Hiện mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                        <img height="30px" src="view/assets/img/logo/an.svg" alt="Ẩn mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); display: none; cursor: pointer;">
                                    </div>
                                </div>
                            </div>

                            <!-- Nhập lại mật khẩu -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nhập Lại Mật Khẩu*</label>
                                    <div style="position: relative;">
                                        <input name="repassword" id="repassword" type="password" placeholder="Nhập Lại Mật Khẩu" class="cr-form-control">
                                        <img height="30px" src="view/assets/img/logo/hien.svg" alt="Hiện mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('repassword', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                        <img height="30px" src="view/assets/img/logo/an.svg" alt="Ẩn mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('repassword', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); display: none; cursor: pointer;">
                                    </div>
                                </div>
                            </div>

                            <!-- Hiển thị thông báo -->
                            <div class="col-12">
    <?php if (isset($_SESSION['thongbao']) && !empty($_SESSION['thongbao'])) : ?>
        <div class="form-group" style="color: green; font-weight: bold;">
            <label style="color: green;"><?php echo htmlspecialchars($_SESSION['thongbao']); ?></label>
        </div>
        <?php unset($_SESSION['thongbao']); // Xóa thông báo sau khi hiển thị ?>
    <?php endif; ?>
</div>


                            <input type="hidden" name="idaccount" value="<?= $idaccount ?>">

                            <!-- Nút đổi mật khẩu -->
                            <div class="cr-register-buttons">
                                <input type="submit" name="doimk" value="Đổi Mật Khẩu" class="cr-button">
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

        // Kiểm tra Mật khẩu cũ
        if (isValid) {
            const oldpassword = document.querySelector("input[name='oldpassword']");
            if (oldpassword.value.trim() === "") {
                isValid = false;
                errorMessage = "Vui lòng nhập mật khẩu cũ.";
                firstInvalidElement = oldpassword;
            }
        }

        // Kiểm tra Mật khẩu mới
        if (isValid) {
            const password = document.querySelector("input[name='password']");
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,25}$/;
            if (!passwordRegex.test(password.value)) {
                isValid = false;
                errorMessage = "Mật khẩu phải từ 8-25 ký tự, có ít nhất 1 chữ hoa, 1 ký tự đặc biệt và 1 chữ số.";
                firstInvalidElement = password;
            }
        }

        // Kiểm tra Nhập lại mật khẩu
        if (isValid) {
            const repassword = document.querySelector("input[name='repassword']");
            const password = document.querySelector("input[name='password']").value;
            if (password !== repassword.value) {
                isValid = false;
                errorMessage = "Nhập lại mật khẩu phải giống mật khẩu.";
                firstInvalidElement = repassword;
            }
        }

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