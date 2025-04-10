<?php include "view/header.php"; ?>

<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Login</h2>
                        <span> <a href="index.php">Home</a> - Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login -->
<section class="section-login padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Login</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cr-login" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="form-logo">
                        <img src="view/assets/img/logo/logo.png" alt="logo">
                    </div>
                    <form class="cr-content-form" action="index.php?act=dangnhap" method="post">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Email*</label>
                                <!-- <div id="error-message" style="color: red; font-weight: bold;"></div> -->
                                <input name="email" type="text" placeholder="Nhập Email Của Bạn" class="cr-form-control">
                            </div>
                            <div class="form-group">
                                <label>Mật Khẩu*</label>
                                <div style="position: relative;">
                                    <input name="password" type="password" placeholder="Nhập Mật Khẩu Của Bạn" class="cr-form-control">
                                    <img height="30px" src="view/assets/img/logo/hien.svg" alt="Hiện mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                    <img height="30px" src="view/assets/img/logo/an.svg" alt="Ẩn mật khẩu" class="toggle-password" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); display: none; cursor: pointer;">
                                </div>
                            </div>
                            <div class="remember">
                                <!-- <span class="form-group custom">
                                    <input type="checkbox" id="html">
                                    <label for="html">Remember Me</label>
                                </span> -->
                                <a class="link" href="forgot.html">Forgot Password?</a>
                            </div><br>
                            <div class="form-group">
                                <label style="color: red;">
                                    <?php
                                    if (isset($thongbao) && $thongbao != "") {
                                        echo $thongbao;
                                    }

                                    if (isset($_SESSION['thongbao']) && $_SESSION['thongbao'] != "") {
                                        echo $_SESSION['thongbao'];
                                        unset($_SESSION['thongbao']); // Dọn thông báo sau khi hiển thị
                                    }
                                    ?>
                                </label>
                            </div>
                            <div class="login-buttons">
                                <input type="submit" class="cr-button" name="dangnhap" value="Đăng Nhập">
                                <a href="index.php?act=dangky" class="link">
                                    Signup?
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include "view/footer.php"; ?>

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
        const email = document.querySelector("input[name='email']");
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!validateField(email, value => emailRegex.test(value), "Email phải hợp lệ, chỉ có một '@' và phải có phần tên miền.")) {
            event.preventDefault();
            email.focus();
            return;
        }

        const password = document.querySelector("input[name='password']");
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,25}$/;
        if (!validateField(password, value => passwordRegex.test(value), "Mật khẩu phải từ 8-25 ký tự, có ít nhất 1 chữ hoa, 1 ký tự đặc biệt và 1 chữ số.")) {
            event.preventDefault();
            password.focus();
            return;
        }
    });
</script>
