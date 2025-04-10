<?php include "view/header.php" ?>
<section class="section-popular-product-shape padding-b-100">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="product-content row mb-minus-24 " id="MixItUpDA2FB7">
            <div class="col-xl-3 col-lg-4 col-12 mb-24">
                <div class="row mb-minus-24 sticky mt-30">
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

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-12 mb-4">
            <div class="mb-30">
                    <div class="cr-banner mt-5" style="text-align: center;">
                        <h2>Bạn Không Có Quyền Truy Cập</h2>
                    </div>
                </div>
                    <div style="color: red; font-size: 18px; text-align: center;">
                        <?php echo $_SESSION['thongbao']; ?>
                    </div>
                    <div style="text-align: center; margin-top: 20px;">
                        <a href="../index.php" style="text-decoration: underline;"> Quay lại trang chủ</a>
                    </div>
                

            </div>
        </div>
    </div>
</section>
<?php include "view/footer.php" ?>