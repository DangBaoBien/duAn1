<?php include "header.php" ?>

<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Product</h2>
                        <span> <a href="home.php">Home</a> - product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product -->
<section class="section-product padding-t-100">
        <div class="container">
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-xxl-4 col-xl-5 col-md-6 col-12 mb-24">
                    <div class="vehicle-detail-banner banner-content clearfix">
                        <div class="banner-slider">
                            <div class="slider slider-for">
                                <div class="slider-banner-image">
                                    <div class="zoom-image-hover">
                                        <img src="<?php echo $img_path . $img; ?>" alt="product-1" class="product-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-7 col-md-6 col-12 mb-24">
                    <div class="cr-size-and-weight-contain">
                        <h2 class="heading"><?= $nameproduct ?></h2>
                    </div>
                    <div class="cr-size-and-weight">
                        <div class="cr-review-star">
                            <div class="cr-star">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p>( 75 Review )</p>
                        </div>
                        <div class="list">
                            <ul>
                                <li><label>Quantity <span>:</span></label><?= $quantity ?></li>
                                <li><label>Color <span>:</span></label><?= $color ?></li>
                                <li><label>Screensize <span>:</span></label><?= $screensize ?> </li>
                                <li><label>Ram <span>:</span></label><?= $ram ?></li>
                                <li><label>Views <span>:</span></label><?= $views ?></li>
                            </ul>
                        </div>
                        <div class="cr-product-price">
                            <span class="new-price">$<?= $price ?></span>
                            <span class="old-price">$<?= $priceold ?></span>
                        </div>
                        <form id="myForm" action="index.php?act=addtocart" method="post">

                            <input type="hidden" name="idproduct" value="<?php echo $idproduct; ?>" />
                            <input type="hidden" name="img" value="<?php echo $img; ?>" />
                            <input type="hidden" name="nameproduct" value="<?php echo $nameproduct; ?>" />
                            <input type="hidden" name="price" value="<?php echo $price; ?>" />
                            <input type="hidden" name="quantity" value="1" id="quantityInput" /> <!-- Quantity hidden input -->
                            <input type="hidden" name="color" value="<?php echo $color; ?>" />
                            <input type="hidden" name="screensize" value="<?php echo $screensize; ?>" />
                            <input type="hidden" name="ram" value="<?php echo $ram; ?>" />
                            <div class="cr-add-card">


                                <?php if (isset($_SESSION['taikhoan'])): ?>
                                    <!-- <div class="cr-qty-main">
                                        <input type="text" placeholder="." value="1" minlength="1" maxlength="20"
                                            class="quantity">
                                        <button type="button" id="add" class="plus">+</button>
                                        <button type="button" id="sub" class="minus">-</button>
                                    </div> -->
                                    <div class="cr-add-button">
                                        <button type="submit" name="addtocart" value="1" class="cr-button cr-shopping-bag">Add to cart</button>
                                    </div>
                                    
                                <?php else: ?>
                                    <!-- Nếu chưa đăng nhập, ẩn phần chọn số lượng và hiển thị cảnh báo -->
                                    <p style="font-size: 14px; color: #64b496;">Vui lòng <a href="index.php?act=dangnhap" style=" color: red; text-decoration: underline;">Đăng nhập</a> để thêm sản phẩm vào giỏ hàng</p>
                                <?php endif; ?>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-12">
                    <div class="cr-paking-delivery">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                    aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="additional-tab" data-bs-toggle="tab"
                                    data-bs-target="#additional" type="button" role="tab" aria-controls="additional"
                                    aria-selected="false">Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                    type="button" role="tab" aria-controls="review"
                                    aria-selected="false">Review</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p><?= $descriptionproduct ?></p>
                                    </div>
                                    <h4 class="heading">Packaging & Delivery</h4>
                                    <div class="cr-description">
                                        <p><?= $descriptionproduct ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p><?= $descriptionproduct ?></p>
                                    </div>
                                    <div class="list">
                                        <ul>
                                            <li><label>Quantity <span>:</span></label><?= $quantity ?></li>
                                            <li><label>Color <span>:</span></label><?= $color ?></li>
                                            <li><label>Screensize <span>:</span></label><?= $screensize ?> </li>
                                            <li><label>Ram <span>:</span></label><?= $ram ?></li>
                                            <li><label>Views <span>:</span></label><?= $views ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="cr-tab-content-from">
                                    <div class="post">
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $("#binhluan").load("view/binhluanform.php", {
                                                    idproduct: <?= $idproduct ?>
                                                });
                                            });
                                        </script>
                                        <div class=" row" id="binhluan">
    
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Popular products -->
<section class="section-popular-products py-5" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-5">
                    <div class="cr-banner">
                        <h2>Similar Products</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Similar products are designed to meet the same needs, offering comparable features and benefits. Whether you're looking for alternatives or complementary options, you can find the perfect match with ease.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4">
            <?php
            foreach ($product_same as $product_same) {
                extract($product_same);
                $linkproduct = "index.php?act=productdetails&idproduct=" . $idproduct;
                echo '
                <div class="col">
                    <div class="cr-product-card">
                        <div class="cr-product-image">
                            <div class="cr-image-inner zoom-image-hover">
                                <img src="' . $img_path . $img . '" alt="product-1" class="img-fluid">
                            </div>
                           
                            <a class="cr-shopping-bag" href="javascript:void(0)">
                                <i class="ri-shopping-bag-line"></i>
                            </a>
                        </div>
                        <div class="cr-product-details">
                            <div class="cr-brand">
                                <a href="shop-left-sidebar.html">Snacks</a>
                                <div class="cr-star">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                    <p>(4.5)</p>
                                </div>
                            </div>
                            <a href="' . $linkproduct . '" class="title">' . $nameproduct . '</a>
                            <p class="cr-price"><span class="new-price">$' . $price . '</span> <span class="old-price">$' . $priceold . '</span></p>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Footer -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const stars = document.querySelectorAll('.cr-t-review-rating i');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = star.getAttribute('data-value');
                ratingInput.value = value;

                // Đổi màu các sao
                stars.forEach(s => {
                    if (s.getAttribute('data-value') <= value) {
                        s.classList.remove('ri-star-s-line');
                        s.classList.add('ri-star-s-fill');
                    } else {
                        s.classList.remove('ri-star-s-fill');
                        s.classList.add('ri-star-s-line');
                    }
                });
            });
        });
    });
</script>
<?php include "footer.php"; ?>