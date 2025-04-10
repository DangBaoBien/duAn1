<?php
include "header.php";
?>
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Cart</h2>
                        <span> <a href="index.php">Home</a> / Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cart -->
<section class="section-cart padding-t-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Cart</h2>
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
                <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <?php if (!empty($giohang)): ?>
                        <?php
                        // Kiểm tra xem người dùng đã đăng nhập chưa
                        if (!isset($_SESSION['taikhoan'])) {
                            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
                        ?> <h3 class="cr-sidebar-title">Vui lòng đăng nhập để xem giỏ hàng <a href="index.php?act=dangnhap"></a></h3>
                        <?php exit();
                        } ?>
                        <div class="row">
                            <form action="index.php?act=updatecart" method="post">
                                <div class="cr-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th></th>
                                                <th>Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th>Color</th>
                                                <th>Screensize</th>
                                                <th>Ram</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <form action="index.php?act=updatecart" method="POST">
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($giohang as $cart):
                                                    $subtotal = $cart['price'] * $cart['quantity'];
                                                    $total += $subtotal;
                                                    $img = "upload/" . $cart['img']; // Đường dẫn ảnh
                                                ?>
                                                    <tr>
                                                        <td class="cart-img">
                                                            <a href="index.php?act=productdetails&idproduct=<?php echo $cart['idproduct']; ?>">
                                                                <img src="<?php echo $img; ?>" alt="product" width="50px">
                                                            </a>
                                                        </td>
                                                        <td class="cart-name"><?php echo $cart['nameproduct']; ?></td>
                                                        <td class="cart-price">$<?php echo $cart['price']; ?></td>
                                                        <td class="cart-qty">
                                                            <div class="cart-qty-plus-minus">
                                                                <button type="button" class="plus">+</button>
                                                                <input type="text" name="quantity[<?php echo $cart['idchitiet']; ?>]" value="<?php echo $cart['quantity']; ?>" class="quantity" min="1">
                                                                <button type="button" class="minus">-</button>
                                                            </div>
                                                        </td>
                                                        <td class="cart-color"><?php echo $cart['color']; ?></td>
                                                        <td class="cart-screensize"><?php echo $cart['screensize']; ?></td>
                                                        <td class="cart-ram"><?php echo $cart['ram']; ?></td>
                                                        <td class="cart-subtotal">$<?php echo $subtotal; ?></td>
                                                        <td class="cart-remove">
                                                            <a href="index.php?act=deletecart&idchitiet=<?php echo $cart['idchitiet']; ?>" class="remove-btn">
                                                                <i class="ri-delete-bin-line"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </form>

                                    </table>
                                </div>

                                <div class="cr-cart-total mb-3 mt-3">
                                    <h3 class="mb-3">Total: $<?php echo $total; ?></h3>
                                    <div class="total mb-3">
                                        <button class="cr-button "><a style="color: #FFF;" href="index.php">Continue Shopping</a></button>
                                        <div class="savecart">
                                            <button type="submit" name="updatecart" class="cr-button" style="margin: 0 20px 0 0;">Save Changes</button>
                                            <button class="cr-button"><a style="color: #FFF;" href="index.php?act=checkout">Proceed to Checkout</a></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <style>
                                .savecart {
                                    display: flex;
                                }

                                .total {
                                    display: flex;
                                    justify-content: space-between;
                                }
                            </style>

                        </div>
                        <!--  -->
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
                                    </a></button></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>