<?php
include "header.php";
?>

<!-- Hero slider -->
<section class="section-hero padding-b-100 next">
    <div class="cr-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="cr-hero-banner cr-banner-image-two">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div class="cr-left-side-contain slider-animation">
                                        <h5><span>100%</span> Organic Fruits</h5>
                                        <h1>Explore fresh & juicy fruits.</h1>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis
                                            beatae consequuntur.</p>
                                        <div class="cr-last-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">
                                                shop now
                                            </a>
                                        </div>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="cr-hero-banner cr-banner-image-one">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div class="cr-left-side-contain slider-animation">
                                        <h5><span>100%</span> Organic Vegetables</h5>
                                        <h1>The best way to stuff your wallet.</h1>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis
                                            beatae consequuntur.</p>
                                        <div class="cr-last-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">
                                                shop now
                                            </a>
                                        </div>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Categories -->


<!-- Popular product -->
<section class="section-popular-product-shape padding-b-100">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30">
                    <div class="cr-banner">
                        <h2>Popular Products</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
            <div class="col-xl-3 col-lg-4 col-12 mb-24">
                <div class="row mb-minus-24 sticky">
                    <div class="col-lg-12 col-sm-6 col-6 cr-product-box mb-24">
                        <div class="cr-product-tabs">
                            <ul>
                                <li class="active" data-filter="all"><a href="index.php?act=home.php">All</a></li>
                                <?php
                                foreach ($listcategory as $category) {
                                    extract($category);
                                    $linkcategory = "index.php?act=product&idcategory=" . $idcategory;
                                    echo '<li data-filter=".snack"><a href="' . $linkcategory . '">' . $namecategory . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="cr-shop-price">
                        <h4 class="cr-shop-sub-title">Price</h4>
                        <div class="price-range-slider">
                            <!-- Slider -->
                            <div id="slider-range" class="range-bar"></div>
                            <p class="range-value">
                                <label>Price :</label>
                                <input type="text" id="amount" readonly>
                            </p>
                            <!-- Button Filter -->
                            <button type="button" class="cr-button mb-3" id="filter-price">Filter</button>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6 col-6 cr-product-box banner-480 mb-24">
                        <div class="cr-ice-cubes">
                            <img src="view/assets/img/product/product-banner.jpg" alt="product banner">
                                                            <div class="cr-ice-cubes-contain">
                                    <h4 class="title">QBS Shop</h4>
                                    <h5 class="sub-title">Phone</h5>
                                    <span>Uy Tín - Chất lượng</span>
                                    <a href="index.php?act=cart" class="cr-button">Shop Now</a>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-12 mb-4">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    <?php
                    foreach ($list_product_popular as $product) {
                        extract($product);
                        $linkproduct = "index.php?act=productdetails&idproduct=" . $idproduct;
                        $img = $img_path . $img;
                        $linkAddToCart = "index.php?act=addtocart"; // Link thêm vào giỏ hàng

                        echo '
            <div class="col">
                <a href="' . $linkproduct . '" class="no-underline">
                    <div class="cr-product-card">
                        <div class="cr-product-image">
                            <div class="cr-image-inner zoom-image-hover">
                                <img src="' . $img . '" alt="product-1" style="width: 100%; height: 200px; object-fit: cover; object-position: center;">
                            </div>
                           
                            <!-- Nút thêm vào giỏ hàng -->
                            
                        </div>
                        <div class="cr-product-details">
                            <div class="cr-brand">
                                <div class="cr-star">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                    <p>(4.5)</p>
                                </div>
                            </div>
                            <a href="' . $linkproduct . '" class="text-start d-block">' . $nameproduct . '</a>
                            <p class="cr-price"><span class="new-price">$' . $price . '</span> <span class="old-price">$' . $priceold . '</span></p>
                        </div>
                    </div>
                </a>
            </div>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Product banner -->


<!-- Services -->


<!-- Deal -->


<!-- Popular product -->


<!-- Testimonial -->


<!-- Blog -->
<section class="section-popular-product-shape padding-b-100">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30">
                    <div class="cr-banner">
                        <h2>Latest Products</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">


                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    <?php
                    foreach ($newproduct as $product) {
                        extract($product);
                        $linkproduct = "index.php?act=productdetails&idproduct=" . $idproduct;
                        $img = $img_path . $img;
                        $linkAddToCart = "index.php?act=addtocart"; // Link thêm vào giỏ hàng

                        echo '
            <div class="col">
                <a href="' . $linkproduct . '" class="no-underline">
                    <div class="cr-product-card">
                        <div class="cr-product-image">
                            <div class="cr-image-inner zoom-image-hover">
                                <img src="' . $img . '" alt="product-1" style="width: 100%; height: 200px; object-fit: cover; object-position: center;">
                            </div>
                            <div class="cr-side-view">
                                <a href="javascript:void(0)" class="wishlist">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                    <i class="ri-eye-line"></i>
                                </a>
                            </div>
                            <!-- Nút thêm vào giỏ hàng -->
                            <a class="cr-shopping-bag" href="' . $linkAddToCart . '">
                                <i class="ri-shopping-bag-line"></i>
                            </a>
                        </div>
                        <div class="cr-product-details">
                            <div class="cr-brand">
                                <div class="cr-star">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                    <p>(4.5)</p>
                                </div>
                            </div>
                            <a href="' . $linkproduct . '" class="text-start d-block">' . $nameproduct . '</a>
                            <p class="cr-price"><span class="new-price">$' . $price . '</span> <span class="old-price">$' . $priceold . '</span></p>
                        </div>
                    </div>
                </a>
            </div>';
                    }
                    ?>
                </div>

           
        </div>
    </div>
</section>

<?php
include "footer.php";
?>