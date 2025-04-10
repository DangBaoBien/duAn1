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
                                        // Tính tổng Sub-Total và Delivery Charges
                                        $subTotal = 0;
                                        $totalQuantity = 0; // Biến để lưu tổng số lượng sản phẩm
                                        foreach ($listcart as $item) {
                                            $subTotal += $item['subtotal'];
                                            $totalQuantity += $item['quantity']; // Cộng số lượng sản phẩm
                                        }
                                        $deliveryCharges = isset($_POST['delivery']) && $_POST['delivery'] === 'flat' ? 5 : 0;
                                        $totalAmount = $subTotal + $deliveryCharges;
                                        ?>
                                        <div>
                                            <span class="text-left">Sub-Total</span>
                                            <span class="text-right"><?= number_format($subTotal, 2) ?> $</span>
                                        </div>
                                        <div>
                                            <span class="text-left">Delivery Charges</span>
                                            <span class="text-right"><?= number_format($deliveryCharges, 2) ?> $</span>
                                        </div>
                                        <div class="cr-checkout-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <span class="text-right"><?= number_format($totalAmount, 2) ?> $</span>
                                        </div>
                                        <div class="cr-checkout-summary-total">
                                            <span class="text-left">Total Quantity</span>
                                            <span class="text-right"><?= $totalQuantity ?></span> <!-- Hiển thị tổng số lượng sản phẩm -->
                                        </div>
                                    </div>

                                    <!-- Products in the cart -->
                                    <div class="cr-checkout-pro">
                                        <?php foreach ($listcart as $checkout) :
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
                                                    <div class="cr-pro-content cr-product-details">
                                                        <h5 class="cr-pro-title">
                                                            <a href="<?= $linkpro ?>"><?= $checkout['nameproduct'] ?></a>
                                                        </h5>
                                                        <p class="cr-price">
                                                            <span class="new-price"><?= $checkout['price'] ?> $</span>
                                                        </p>
                                                        <div style="display: flex;">Quantity: <p style="font-weight:bold"><?= $checkout['quantity'] ?></p>
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
                                                        <span class="cr-del-opt-head">Flat Rate</span>
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
                                            <div class="cr-pay-desc">Please select the preferred payment method to use on this
                                                order.</div>
                                            <form action="#" class="payment-options">
                                                <span class="cr-pay-option">
                                                    <span>
                                                        <input type="radio" id="pay1" name="radio-group" checked>
                                                        <label for="pay1">Cash On Delivery</label>
                                                    </span>
                                                </span>
                                                <span class="cr-pay-option">
                                                    <span>
                                                        <input type="radio" id="pay3" name="radio-group">
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
                                        <div class="cr-bl-block-content">
                                            <div class="cr-check-subtitle">Checkout Options</div>
                                            <span class="cr-bill-option">
                                                <span>
                                                    <input type="radio" id="bill1" name="radio-group" onclick="toggleAddressForm('existing')">
                                                    <label for="bill1">I want to use an existing address</label>
                                                </span>
                                                <span>
                                                    <input type="radio" id="bill2" name="radio-group" checked onclick="toggleAddressForm('new')">
                                                    <label for="bill2">I want to use new address</label>
                                                </span>
                                            </span>

                                            <!-- Existing Address Form -->
                                            <div id="existing-address-form" class="cr-check-bill-form mb-minus-24" style="display: none;">
                                                <form action="#" method="post">
                                                    <span class="cr-bill-wrap cr-bill-half">
                                                        <label>Họ và tên*</label>
                                                        <input name="fullname" type="text" value="<?= $fullname ?>" placeholder="Nhập Họ Và Tên Của Bạn" class="cr-form-control">
                                                    </span>
                                                    <span class="cr-bill-wrap cr-bill-half">
                                                        <div class="form-group">
                                                            <label>Số Điện Thoại*</label>
                                                            <input name="phone" type="text" value="<?= $phone ?>" placeholder="Nhập Số Điện Thoại Của Bạn" class="cr-form-control">
                                                        </div>
                                                    </span>
                                                    <span class="cr-bill-wrap">
                                                        <label>Địa Chỉ*</label>
                                                        <input name="address" type="text" value="<?= $address ?>" placeholder="Địa Chỉ Chi Tiết Số Nhà Ngõ Thôn Xóm..." class="cr-form-control">
                                                    </span>
                                                    <span class="cr-bill-wrap cr-bill-half">
                                                        <label>Tỉnh*</label>
                                                        <span class="cr-bl-select-inner">
                                                            <select name="name_province" class="cr-form-control" id="city">
                                                                <option value="" selected><?= $name_province ?></option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="cr-bill-wrap cr-bill-half">
                                                        <label>Huyện*</label>
                                                        <span class="cr-bl-select-inner">
                                                            <select name="name_district" class="cr-form-control" id="district">
                                                                <option value="" selected><?= $name_district ?></option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="cr-bill-wrap cr-bill-half">
                                                        <label>Xã*</label>
                                                        <span class="cr-bl-select-inner">
                                                            <select name="name_ward" class="cr-form-control" id="ward">
                                                                <option value="" selected><?= $name_ward ?></option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                </form>
                                            </div>

                                            <!-- New Address Form -->
                                            <div id="new-address-form" class="cr-check-bill-form mb-minus-24">
                                            </div>
                                        </div>

                                        <script>
                                            function toggleAddressForm(type) {
                                                document.getElementById('existing-address-form').style.display = type === 'existing' ? 'block' : 'none';
                                                document.getElementById('new-address-form').style.display = type === 'new' ? 'block' : 'none';
                                            }
                                        </script>

                                    </div>
                                </div>
                                <span class="cr-check-order-btn">
                                    <a class="cr-button mt-30" href="#">Place Order</a>
                                </span>
                            </div>
                        </div>
                        <!--cart content End -->
                    </div>
                </div>

nếu chọn I want to use an existing address và Cash On Delivery thì khi chọn nút place order thì đẩy dữ liệu lên db ở model/giohang.php
bảng donhang 
idorder	idaccount	subtotal	nameproduct	fullname	name_province	name_district	name_ward	paymentmethod	address	phone	status	oderdate	quantity	

idaccount ở session['taikhoan']['idaccount']

hàm viết thêm vào db dựa theo lệnh này
function insert_giohang($idaccount, $idproduct, $nameproduct, $price, $img, $quantity, $color, $screensize, $ram) {
    $sql = "SELECT * FROM giohang WHERE idaccount = ? AND idproduct = ?";
    $cart_item = pdo_query_one($sql, $idaccount, $idproduct);

    if ($cart_item) {
        // Nếu sản phẩm đã có trong giỏ, cập nhật lại số lượng
        $new_quantity = $cart_item['quantity'] + $quantity;
        $sql = "UPDATE giohang SET quantity = ? WHERE idcart = ?";
        pdo_execute($sql, $new_quantity, $cart_item['idcart']);
    } else {
        // Nếu sản phẩm chưa có trong giỏ, thêm sản phẩm mới vào giỏ và tính subtotal
        $subtotal = $price * $quantity; // Tính subtotal
        
        $sql = "INSERT INTO giohang (idaccount, idproduct, nameproduct, price, img, quantity, color, screensize, ram, subtotal) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $idaccount, $idproduct, $nameproduct, $price, $img, $quantity, $color, $screensize, $ram, $subtotal);
    }
}
gợi ý ctl
        case 'checkout':
            $listcart = loadall_giohang_by_account();
            include "view/checkout.php";
            break;
cuối cùng chuyển hướng sang index.php?act=placeordersuccess