<?php
session_start();
include "../model/pdo.php";
include "../model/binhluan.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
// include "../model/binhluan.php";
include "../model/giohang.php";
include "../model/donhang.php";


//Controller DanhMuc
// $latest_orders = load_latest_orders(10);
// $latest_order_details = load_latest_order_details(10); // Lấy 10 sản phẩm mới nhất từ đơn hàng
$listorder = loadall_order();
function get_best_sellers() {
    return load_best_selling_products();
}

function get_all_products_by_views() {
    return load_all_products_by_views();
}
$all_products = get_all_products_by_views();



        
// Lấy chi tiết sản phẩm của từng đơn hàng
$orders_with_details = [];
$last_month_accounts = "";
foreach ($listorder as $order) {
    $idorder = $order['idorder'];
    $order['details'] = load_order_details($idorder); // Gắn chi tiết sản phẩm vào đơn hàng
    $orders_with_details[] = $order;
}
if ($last_month_accounts > 0) {
    $growth_rate = (($current_month_accounts - $last_month_accounts) / $last_month_accounts) * 100;
} else {
    $growth_rate = 0; // Trường hợp tháng trước không có tài khoản nào
}

if (!isset($_SESSION['taikhoan'])) {
    $_SESSION['thongbao'] = "Bạn phải đăng nhập để vào trang admin.";
    header("Location: ../index.php?act=dangnhap");
    exit;
}

// Kiểm tra quyền người dùng
if (!isset($_SESSION['taikhoan']['role']) || $_SESSION['taikhoan']['role'] != 1) {
    $_SESSION['thongbao'] = "Bạn không có quyền truy cập vào trang admin.";
    header("Location: ../index.php?act=noacess");
    exit;
}


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'addcategory':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $namecategory = $_POST['namecategory'];
                insert_danhmuc($namecategory);
                $thongbao = "Thêm Thành Công";
            }
            include "danhmuc/addcategory.php";
            break;
        case 'listcategory':
            $listcategory = loadall_category();
            include "danhmuc/listcategory.php";
            break;
        case 'deletecategory':
            if (isset($_GET['idcategory']) && ($_GET['idcategory'] > 0)) {
                delete_category($_GET['idcategory']);
            }
            $listcategory = loadall_category();
            include "danhmuc/listcategory.php";
            break;
        case 'editcategory':
            if (isset($_GET['idcategory']) && ($_GET['idcategory'] > 0)) {
                $category = loadone_category($_GET['idcategory']);
            }
            include "danhmuc/updatecategory.php";
            break;
        case 'updatecategory':
            if (isset($_POST['updatecategory']) && ($_POST['updatecategory'])) {
                $namecategory = $_POST['namecategory'];
                $idcategory = $_POST['idcategory'];
                update_category($idcategory, $namecategory);
            }
            $sql = "select * from danhmuc order by idcategory desc";
            $listcategory = loadall_category();
            include "danhmuc/listcategory.php";
            break;

            // Controller San Pham
        case 'addproduct':
            if (isset($_POST['submit']) && $_POST['submit']) {
                $idcategory = $_POST['idcategory'];
                $nameproduct = $_POST['nameproduct'];
                $price = $_POST['price'];
                $priceold = $_POST['priceold'];
                $descriptionproduct = $_POST['descriptionproduct'];
                $quantity = $_POST['quantity'];
                $color = $_POST['color'];
                $screensize = $_POST['screensize'];
                $ram = $_POST['ram'];
                $releasedate = $_POST['releasedate'];
                $views = 0;
                $img = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_product($idcategory, $nameproduct, $price, $priceold, $img, $descriptionproduct, $quantity, $color, $screensize, $ram, $releasedate, $views);
            }
            $listcategory = loadall_category();
            include "sanpham/addproduct.php";
            break;

        case 'listproduct':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $idcategory = $_POST['idcategory'];
            } else {
                $kyw = "";
                $idcategory = 0;
            }
            $listcategory = loadall_category();
            $listproduct = loadall_product($kyw, $idcategory);
            include "sanpham/listproduct.php";
            break;
        case 'deleteproduct':
            if (isset($_GET['idproduct']) && ($_GET['idproduct'] > 0)) {
                delete_product($_GET['idproduct']);
            }
            $listproduct = loadall_product();
            include "sanpham/listproduct.php";
            break;
        case 'editproduct':
            if (isset($_GET['idproduct']) && ($_GET['idproduct'] > 0)) {
                $product = loadone_product($_GET['idproduct']);
            }
            $listcategory = loadall_category();
            include "sanpham/updateproduct.php";
            break;
        case 'updateproduct':
            if (isset($_POST['updateproduct']) && $_POST['updateproduct'] !== "") {
                // $idcategory = $_POST['idcategory'];
                $nameproduct = $_POST['nameproduct'];
                $price = $_POST['price'];
                $priceold = $_POST['priceold'];
                $descriptionproduct = $_POST['descriptionproduct'];
                $quantity = $_POST['quantity'];
                $color = $_POST['color'];
                $screensize = $_POST['screensize'];
                $ram = $_POST['ram'];
                $releasedate = $_POST['releasedate'];
                $img = '';
                $idproduct = $_POST['idproduct'];
                $views = $_POST['views'];


                if (!empty($_FILES['img']['name'])) {
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        $img = $_FILES['img']['name'];
                    }
                }

                update_product($nameproduct, $price, $priceold, $img, $descriptionproduct, $quantity, $color, $screensize, $ram, $releasedate, $idproduct,$views);
                $thongbao = "Cập Nhật Thành Công";
            }

            $listcategory = loadall_category();
            $listproduct = loadall_product();
            include "sanpham/listproduct.php";
            break;

        case 'listaccount':
            $listaccount = loadall_taikhoan();
            include "taikhoan/listaccount.php";
            break;
        case 'deleteaccount':
            if (isset($_GET['idaccount']) && ($_GET['idaccount'] > 0)) {
                delete_taikhoan($_GET['idaccount']);
                $listaccount = loadall_taikhoan();
                include "taikhoan/listaccount.php";
                break;
            }
            $listaccount = loadall_taikhoan();
            include "taikhoan/listaccount.php";
            break;
        case 'listcomment':
            $list_binhluan = loadall_binhluan();
            include "binhluan/listbinhluan.php";
            break;
        default:
            include "home.php";
            break;
        case 'deletecomment':
            if (isset($_GET['idcomment']) && ($_GET['idcomment'] > 0)) {
                delete_comment($_GET['idcomment']);
            }
            $list_binhluan = loadall_binhluan();
            include "binhluan/listbinhluan.php";
            break;
            case 'listorder':
                // Lấy danh sách đơn hàng
                $listorder = loadall_order();
        
                // Lấy chi tiết sản phẩm của từng đơn hàng
                $orders_with_details = [];
                foreach ($listorder as $order) {
                    $idorder = $order['idorder'];
                    $order['details'] = load_order_details($idorder); // Gắn chi tiết sản phẩm vào đơn hàng
                    $orders_with_details[] = $order;
                }
                include "donhang/listorder.php";
                break;
                case 'editorder':
                    if (isset($_GET['idorder']) && !empty($_GET['idorder'])) {
                        $idorder = $_GET['idorder'];
            
                        // Lấy thông tin chi tiết đơn hàng
                        $order = load_order_by_id($idorder);
            
                        if (!$order) {
                            $message = "Order not found!";
                            include "donhang/listorder.php"; // Nếu không tìm thấy đơn hàng, quay lại danh sách
                            break;
                        }
            
                        // Hiển thị form chỉnh sửa
                        include "donhang/updateorder.php";
                    }
                    break;
            
                case 'updateorder':
                    if (isset($_POST['idorder']) && isset($_POST['status'])) {
                        $idorder = $_POST['idorder'];
                        $status = $_POST['status'];
            
                        // Cập nhật trạng thái đơn hàng
                        update_order_status($idorder, $status);
            
                        // Quay lại danh sách đơn hàng
                        $message = "Order updated successfully!";
                        header("Location: index.php?act=listorder");
                        exit();
                    } else {
                        $message = "Invalid request!";
                        include "donhang/listorder.php";
                    }
                    break;
                
                case 'deleteorder':
                    if (isset($_GET['idorder'])) {
                        $idorder = $_GET['idorder'];
                        delete_order($idorder); // Gọi hàm xóa
                    }
                    header("Location: index.php?act=listorder"); // Quay lại danh sách đơn hàng
                    break;
                    case 'listcart':
                        $cart_orders = load_cart_orders(); // Hàm lấy dữ liệu giỏ hàng
                        include "giohang/listcart.php";
                        break;
                    
                    
                    case 'deletecart':
                        if (isset($_GET['idcart']) && $_GET['idcart'] > 0) {
                            delete_cart_admin($_GET['idcart']);
                        }
                        header("Location: index.php?act=listcart");
                        break;
                    
                
    }
} else {
    include "home.php";
}
