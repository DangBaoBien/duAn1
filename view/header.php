<!-- ========================================================= 
    Item Name: Carrot - Multipurpose eCommerce HTML Template.
    Author: ashishmaraviya
    Version: 2.1
    Copyright 2024
 ============================================================-->
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:29:37 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
    <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
    <meta name="author" content="ashishmaraviya">

    <title>Carrot - Multipurpose eCommerce HTML Template</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="view/assets/img/logo/favicon.png">

    <!-- Icon CSS -->
    <link rel="stylesheet" href="view/assets/css/vendor/materialdesignicons.min.css">
    <link rel="stylesheet" href="view/assets/css/vendor/remixicon.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="view/assets/css/vendor/animate.css">
    <link rel="stylesheet" href="view/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="view/assets/css/vendor/aos.min.css">
    <link rel="stylesheet" href="view/assets/css/vendor/range-slider.css">
    <link rel="stylesheet" href="view/assets/css/vendor/swiper-bundle.min.css">
    <link rel="stylesheet" href="view/assets/css/vendor/jquery.slick.css">
    <link rel="stylesheet" href="view/assets/css/vendor/slick-theme.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="view/assets/css/style.css">
</head>

<body class="body-bg-6">

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-header">
                        <a href="index.php" class="cr-logo">
                            <img src="view/assets/img/logo/logo.png" alt="logo" class="logo">
                            <img src="view/assets/img/logo/dark-logo.png" alt="logo" class="dark-logo">
                        </a>
                        <form class="cr-search" action="index.php?act=product" method="post" onsubmit="return validateForm()">
                            <input
                                class="search-input"
                                id="kyw"
                                name="kyw"
                                type="text"
                                placeholder="Tìm kiếm....."
                                style="border: 1px solid #ccc; padding: 8px; font-size: 14px;">
                            <button class="search-btn" type="submit">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>
                        <div class="cr-right-bar">
                            <?php
                            if (isset($_SESSION['taikhoan'])) {
                                extract($_SESSION['taikhoan']);
                            ?>
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                            <i class="ri-user-3-line"></i>
                                            <span>Account</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item">Xin chào: <b> <?= $fullname ?></b> <br></a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.php?act=mya">Tài Khoản Của Tôi</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.php?act=checkout">Checkout</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.php?act=orderhistory">My Order</a>
                                            </li>
                                            <?php if ($role == 1) { ?>
                                                <li>
                                                    <a class="dropdown-item" href="admin/index.php">Admin</a>
                                                </li>
                                            <?php } ?>
                                            <li>
                                                <a class="dropdown-item" href="index.php?act=dangxuat">Đăng Xuất</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php
                            } else {

                            ?>
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                            <i class="ri-user-3-line"></i>
                                            <span>Account</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="index.php?act=dangky">Register</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.php?act=dangnhap">Login</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php } ?>
                        
                            <a href="index.php?act=cart" class="cr-right-bar-item Shopping-toggle">
                                <i class="ri-shopping-cart-line"></i>
                                <span>Cart</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cr-fix" id="cr-main-menu-desk">
            <div class="container">
                <div class="cr-menu-list">
                    <div class="cr-category-icon-block">
                        <div class="cr-category-menu">
                            <div class="cr-category-toggle">
                                <i class="ri-menu-2-line"></i>
                            </div>
                        </div>
                        <div class="cr-cat-dropdown">
                            <div class="cr-cat-block">
                                <div class="cr-cat-tab">
                                    <div class="cr-tab-list nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical" style="text-align: center;">
                                        <?php
                                        foreach ($listcategory as $category) {
                                            extract($category);
                                            $linkcategory = "index.php?act=product&idcategory=" . $idcategory;
                                            echo '
                                                <button class="nav-link active" type="button" ><a href="' . $linkcategory . '">' . $namecategory . '</a></button>
                                                    ';
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg">
                        <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                            <i class="ri-menu-3-line"></i>
                        </a>
                        <div class="cr-header-buttons">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="index.php?act=dangky">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="index.php?act=dangnhap">Login</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="wishlist.html" class="cr-right-bar-item">
                                <i class="ri-heart-line"></i>
                            </a>
                            <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                                <i class="ri-shopping-cart-line"></i>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Category
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($listcategory as $category) {
                                            extract($category);
                                            $linkcategory = "index.php?act=product&idcategory=" . $idcategory;
                                            echo '
                                               <a class="dropdown-item" href="' . $linkcategory . '">' . $namecategory . '</a>
                                                    ';
                                        }
                                        ?>
                                        
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                    </nav>
                    <div class="cr-calling">
                        <i class="ri-phone-line"></i>
                        <a href="javascript:void(0)">+123 ( 456 ) ( 7890 )</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile menu -->
    <div class="cr-sidebar-overlay"></div>
    <div id="cr_mobile_menu" class="cr-side-cart cr-mobile-menu">
        <div class="cr-menu-title">
            <span class="menu-title">My Menu</span>
            <button type="button" class="cr-close">×</button>
        </div>
        <div class="cr-menu-inner">
            <div class="cr-menu-content">
                <ul>
                    <li class="dropdown drop-list">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">Category</a>
                        <ul class="sub-menu">
                            <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                            <li><a href="shop-right-sidebar.html">Shop Right sidebar</a></li>
                            <li><a href="shop-full-width.html">Full Width</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">product</a>
                        <ul class="sub-menu">
                            <li><a href="product-left-sidebar.html">product Left sidebar</a></li>
                            <li><a href="product-right-sidebar.html">product Right sidebar</a></li>
                            <li><a href="product-full-width.html">Product Full Width </a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="index.php?act=cart">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="track-order.html">Track Order</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="index.php?act=dangnhap">Login</a></li>
                            <li><a href="index.php?act=dangky">Register</a></li>
                            <li><a href="policy.html">Policy</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                            <li><a href="blog-full-width.html">Full Width</a></li>
                            <li><a href="blog-detail-left-sidebar.html">Detail Left Sidebar</a></li>
                            <li><a href="blog-detail-right-sidebar.html">Detail Right Sidebar</a></li>
                            <li><a href="blog-detail-full-width.html">Detail Full Width</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)">Element</a>
                        <ul class="sub-menu">
                            <li><a href="elements-products.html">Products</a></li>
                            <li><a href="elements-typography.html">Typography</a></li>
                            <li><a href="elements-buttons.html">Buttons</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>