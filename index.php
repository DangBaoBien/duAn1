<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "global.php";
include "model/binhluan.php";
include "model/giohang.php";
include "model/donhang.php";

// if(!isset($_SESSION['qdt'])) $_SESSION['qdt']=[];
//  var_dump($_SESSION['qdt']);

// var_dump($giohang);

$listtaikhoan = loadall_taikhoan();
$lisproduct = loadall_product();
$newproduct = loadall_product_home();
$listcategory = loadall_category();
$listbinhluan = loadall_binhluan();
$list_product_popular = load_popular_products();
// var_dump($list_product_popular);
$giohang = [];
if (isset($_SESSION['taikhoan']) && isset($_SESSION['taikhoan']['idaccount'])) {
    $giohang = get_cart_by_account($_SESSION['taikhoan']['idaccount']);
} else {
    // Nếu không có tài khoản trong session, $giohang giữ giá trị mặc định là mảng rỗng
    $giohang = [];
}
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'noacess':
            include "view/noaccess.php";
            break;
        case 'product':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['idcategory']) && ($_GET['idcategory'] > 0)) {
                $idcategory = $_GET['idcategory'];
            } else {
                $idcategory = 0;
            }
            $listproduct = loadall_product($kyw, $idcategory);
            $namecategory = load_name_category($idcategory);
            include "view/product.php";
            break;
        case 'productdetails':
            if (isset($_GET['idproduct']) && ($_GET['idproduct'] > 0)) {
                $idproduct = $_GET['idproduct'];
                increase_views($idproduct);
                $oneproduct = loadone_product($idproduct);
                extract($oneproduct);
                $product_same = load_product_same($idproduct, $idcategory);
                include "view/productdetails.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $fullname = $_POST['fullname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $name_ward = $_POST['name_ward'];
                $name_district = $_POST['name_district'];
                $name_province = $_POST['name_province'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $created_at = date('H:i d-m-Y');
                insert_taikhoan($fullname, $password, $email, $address, $phone, $name_ward, $name_district, $name_province, $created_at);
                $thongbao = "Đã đăng ký thành công. Bạn có thể đăng nhập";
            }
            include "view/dangky.php";
            break;
        case 'mya':
            if (isset($_POST['capnhattk']) && ($_POST['capnhattk'])) {
                $idaccount = $_POST['idaccount'];
                $fullname = $_POST['fullname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $name_ward = $_POST['name_ward'];
                $name_district = $_POST['name_district'];
                $name_province = $_POST['name_province'];
                update_taikhoan($idaccount, $fullname, $password, $email, $address, $phone, $name_ward, $name_district, $name_province);
                $thongbao = "Đã cập nhật thành công. Thông tin của bạn đã được lưu";
                if (is_array($checkuser)) {
                    $_SESSION['taikhoan'] = $checkuser;
                }
                header('Location: index.php?act=mya');
            }
            include "view/mya.php";
            break;
        case 'doimk':
            $thongbao = "";

            if (isset($_POST['doimk']) && ($_POST['doimk'])) {
                $idaccount = $_POST['idaccount'];
                $oldpassword = $_POST['oldpassword']; // Mật khẩu cũ
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];

                // Kiểm tra mật khẩu cũ có khớp không
                $checkuser = check_old_password($idaccount, $oldpassword);
                if ($checkuser) {
                    if ($password === $repassword) {
                        update_matkhau($idaccount, $password);
                        $_SESSION['thongbao'] = "Đã đổi mật khẩu thành công.";  // Lưu thông báo vào session
                        $_SESSION['taikhoan'] = $checkuser;
                        header("Location: index.php?act=doimk");
                        exit();
                    } else {
                        $_SESSION['thongbao'] = "Mật khẩu mới và xác nhận không trùng khớp.";
                        header("Location: index.php?act=doimk");
                        exit();
                    }
                } else {
                    $_SESSION['thongbao'] = "Mật khẩu cũ không chính xác.";
                    header("Location: index.php?act=doimk");
                    exit();
                }
            }
            include "view/doimk.php";
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $checkuser = checkuser($email, $password);
                if (is_array($checkuser)) {
                    $_SESSION['taikhoan'] = $checkuser;
                    header('Location: index.php');
                } else {
                    $thongbao = "Tài khoản hoặc mật khẩu khong chính xác.";
                }
            }
            include "view/login.php";
            break;
        case 'xoatk':
            if (isset($_GET['idaccount']) && ($_GET['idaccount'] > 0)) {
                delete_taikhoan($_GET['idaccount']);
            }
            header("Location: index.php?act=dangxuat");
            break;
        case 'dangxuat':
            session_unset();
            header('Location: index.php');
            break;


        case 'addtocart':
            if (isset($_POST['addtocart']) && $_POST['addtocart'] == 1) {
                $idaccount = $_SESSION['taikhoan']['idaccount'];
                $idproduct = $_POST['idproduct'];
                $img = $_POST['img'];
                $nameproduct = $_POST['nameproduct'];
                $color = $_POST['color'];
                $screensize = $_POST['screensize'];
                $ram = $_POST['ram'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];

                insert_cart($idaccount, $idproduct, $img, $nameproduct, $color, $screensize, $ram, $quantity, $price);
                header("Location: index.php?act=viewcart"); // Chuyển hướng về trang giỏ hàng
                exit();
            }
            break;

        case 'viewcart':
            $giohang = get_cart_by_account($_SESSION['taikhoan']['idaccount']);
            include "view/cart.php";
            break;

        case 'deletecart':
            if (isset($_GET['idchitiet']) && !empty($_GET['idchitiet'])) {
                $idchitiet = intval($_GET['idchitiet']); // Lấy idchitiet từ URL và chuyển thành số nguyên
                delete_cart_detail($idchitiet); // Gọi hàm xóa trong model
                header("Location: index.php?act=viewcart"); // Chuyển hướng lại trang giỏ hàng
                exit();
            } else {
                echo "ID chi tiết giỏ hàng không hợp lệ!";
            }
            break;


            // Controller xử lý khi người dùng nhấn nút "Save Changes"
        case 'updatecart':
            if (isset($_POST['quantity'])) {
                foreach ($_POST['quantity'] as $idchitiet => $quantity) {
                    // Kiểm tra số lượng hợp lệ
                    if ($quantity < 1) $quantity = 1;

                    // Cập nhật số lượng trong giỏ hàng
                    update_cart_quantity($idchitiet, $quantity);
                }
            }
            header('Location: index.php?act=viewcart'); // Chuyển hướng lại trang giỏ hàng
            break;

        case 'checkout':
            if (!isset($_SESSION['taikhoan'])) {
                header('Location: index.php?act=dangnhap');
                exit();
            }
            include 'view/checkout.php'; // Gửi thông tin đến file view
            break;

        case 'placeorder':
            if (isset($_SESSION['taikhoan']['idaccount'])) {
                // Lấy thông tin từ form
                $idaccount = $_SESSION['taikhoan']['idaccount'];
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $name_province = $_POST['name_province'];
                $name_district = $_POST['name_district'];
                $name_ward = $_POST['name_ward'];
                $paymentmethod = $_POST['paymentmethod'];
                $delivery = $_POST['delivery'];
                $subtotal = $_POST['subtotal'];
                $comment = $_POST['comment'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $orderdate = date('H:i d-m-Y');
                $status = 'Pending'; // Đơn hàng mới sẽ có trạng thái là 'pending'
                $idorder = insert_order($idaccount, $fullname, $name_province, $name_district, $name_ward, $address, $phone, $paymentmethod, $status, $orderdate, $delivery, $subtotal, $comment);

                // Thêm chi tiết đơn hàng vào bảng `chitietdonhang`
                if (!empty($giohang)) {
                    foreach ($giohang as $item) {
                        $idproduct = $item['idproduct'];
                        $nameproduct = $item['nameproduct'];
                        $quantity = $item['quantity'];
                        $price = $item['price'];
                        $subtotal = $item['subtotal'];
                        $img = $item['img'];


                        // Thêm chi tiết đơn hàng
                        insert_order_details($idorder, $nameproduct, $quantity, $price, $subtotal, $img);

                        // Giảm số lượng sản phẩm trong bảng `sanpham`
                        update_product_quantity($idproduct, $quantity);
                    }
                }
                delete_cart($idaccount);
                // Chuyển hướng tới trang thành công
                header("Location: index.php?act=ordersuccess&idorder=$idorder");

                exit;
            } else {
                // Nếu người dùng chưa đăng nhập, chuyển hướng tới trang đăng nhập
                header("Location: index.php?act=dangnhap");
                exit;
            }
            break;



        case 'ordersuccess':
            include "view/ordersuccess.php";
            break;

            case 'deletecomment':
            if (isset($_GET['idcomment']) && ($_GET['idcomment'] > 0)) {
                delete_comment($_GET['idcomment']);
            }
            $idproduct = $_GET['idproduct'];
            $list_binhluan = loadall_binhluan();
            header("Location: index.php?act=productdetails&idproduct=" . $idproduct);
            break;
        case 'suabinhluan':
            if (isset($_POST['suabinhluan']) && ($_POST['suabinhluan'])) {
                $idcomment = $_POST['idcomment'];
                $content = $_POST['content'];
            
                // Gọi hàm model để cập nhật bình luận
                update_binhluan($idcomment, $content);
            
                // Chuyển hướng sau khi cập nhật
                header("Location: index.php?act=productdetails&idproduct=" . $_POST['idproduct']);
                exit;
            }
            break;
            
            case 'orderhistory':
                if (isset($_SESSION['taikhoan']['idaccount'])) {
                    $idaccount = $_SESSION['taikhoan']['idaccount'];
                    $status_filter = isset($_GET['status']) ? $_GET['status'] : '';
                    
                    if ($status_filter) {
                        $orders = load_orders_by_account_and_status($idaccount, $status_filter);
                    } else {
                        $orders = load_orders_by_account($idaccount);
                    }
                } else {
                    header('Location: index.php?act=dangnhap'); // Chuyển hướng nếu chưa đăng nhập
                    exit();
                }
                include 'view/orderhistory.php';
                break;
                case 'cancelorder':
                    if (isset($_POST['idorder'])) {
                        $idorder = $_POST['idorder'];
                        update_order_status($idorder, 'Cancelled');
                        header('Location: index.php?act=orderhistory');
                        exit();
                    }
                    break;
                            

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
