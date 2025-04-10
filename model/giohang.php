<?php
function insert_cart($idaccount, $idproduct, $img, $nameproduct, $color, $screensize, $ram, $quantity, $price) {
    try {
        $subtotal = $price * $quantity; // Tính tổng giá

        // Kết nối cơ sở dữ liệu
        $pdo = pdo_get_connection();

        // Kiểm tra giỏ hàng của tài khoản
        $sql = "SELECT idcart FROM giohang WHERE idaccount = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idaccount]);
        $result = $stmt->fetch();

        if (!$result) {
            // Tạo giỏ hàng mới nếu chưa có
            $sql = "INSERT INTO giohang (idaccount) VALUES (?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idaccount]);
            $idcart = $pdo->lastInsertId(); // Lấy ID giỏ hàng vừa tạo
        } else {
            $idcart = $result['idcart'];
        }

        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
        $sql = "SELECT idchitiet, quantity FROM giohangchitiet WHERE idcart = ? AND idproduct = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idcart, $idproduct]);
        $existingProduct = $stmt->fetch();

        if ($existingProduct) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng và tổng giá
            $newQuantity = $existingProduct['quantity'] + $quantity;
            $newSubtotal = $newQuantity * $price;
            $sql = "UPDATE giohangchitiet 
                    SET quantity = ?, subtotal = ? 
                    WHERE idchitiet = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$newQuantity, $newSubtotal, $existingProduct['idchitiet']]);
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            $sql = "INSERT INTO giohangchitiet (idcart, idproduct, img, nameproduct, color, screensize, ram, quantity, price, subtotal) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idcart, $idproduct, $img, $nameproduct, $color, $screensize, $ram, $quantity, $price, $subtotal]);
        }
    } catch (PDOException $e) {
        echo "Lỗi thêm vào giỏ hàng: " . $e->getMessage();
        die();
    }
}


function get_cart_by_account($idaccount) {
    try {
        $pdo = pdo_get_connection();
        $sql = "SELECT gc.*, gh.idcart 
                FROM giohangchitiet gc 
                INNER JOIN giohang gh ON gc.idcart = gh.idcart 
                WHERE gh.idaccount = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idaccount]);
        return $stmt->fetchAll(); // Trả về danh sách sản phẩm trong giỏ hàng
    } catch (PDOException $e) {
        echo "Lỗi lấy giỏ hàng: " . $e->getMessage();
        return [];
    }
}

function update_cart_quantity($idchitiet, $quantity) {
    // Ép kiểu để đảm bảo dữ liệu an toàn
    $idchitiet = intval($idchitiet);
    $quantity = intval($quantity);

    $sql = "UPDATE giohangchitiet 
            SET quantity = $quantity, subtotal = price * $quantity 
            WHERE idchitiet = $idchitiet";
    pdo_execute($sql);
}



function remove_product_from_cart($idcart) {
    try {
        $pdo = pdo_get_connection();
        $sql = "DELETE FROM giohangchitiet WHERE idcart = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idcart]);
    } catch (PDOException $e) {
        echo "Lỗi xóa sản phẩm khỏi giỏ hàng: " . $e->getMessage();
    }
}
function delete_cart_detail($idchitiet) {
    $sql="DELETE FROm giohangchitiet WHERE idchitiet=".$idchitiet;
    pdo_execute($sql);
}




function delete_cart_item($idchitiet) {
    $sql = "DELETE FROM giohangchitiet WHERE idchitiet = :idchitiet"; // Chỉ xóa theo ID cụ thể
    pdo_execute($sql, ['idchitiet' => $idchitiet]); // Truyền tham số an toàn
}
// Xóa giỏ hàng của người dùng
// Xóa sạch giỏ hàng của người dùng
function delete_cart() {
    // Lấy idaccount từ session
    $idaccount = $_SESSION['taikhoan']['idaccount'];

    // Xóa chi tiết giỏ hàng của người dùng
    $sql = "DELETE FROM giohangchitiet WHERE idcart IN (SELECT idcart FROM giohang WHERE idaccount = $idaccount)";
    pdo_query($sql);

    // Xóa giỏ hàng của người dùng
    $sql = "DELETE FROM giohang WHERE idaccount = $idaccount";
    pdo_query($sql);
}

function loadall_cart() {
    $sql = "SELECT * FROM giohang ORDER BY idcart DESC";
    $listcart = pdo_query($sql);
    return $listcart;
}

function load_cart_orders() {
    // Lấy giỏ hàng và thông tin người dùng từ bảng taikhoan
    $sql = "SELECT * FROM giohang
            JOIN taikhoan ON giohang.idaccount = taikhoan.idaccount";
    $cart_orders = pdo_query($sql);
    
    foreach ($cart_orders as &$cart) {
        // Lấy chi tiết giỏ hàng (sản phẩm)
        $cart['details'] = load_cart_details($cart['idcart']);
        $cart['total'] = calculate_cart_total($cart['idcart']);
    }
    
    return $cart_orders;
}

function load_cart_details($idcart) {
    // Lấy chi tiết sản phẩm trong giỏ hàng
    $sql = "SELECT * FROM giohangchitiet WHERE idcart = ?";
    return pdo_query($sql, $idcart);
}

function calculate_cart_total($idcart) {
    // Tính tổng tiền của giỏ hàng
    $sql = "SELECT SUM(subtotal) as total FROM giohangchitiet WHERE idcart = ?";
    $result = pdo_query_one($sql, $idcart);
    return $result['total'];
}
function delete_cart_admin($idcart) {
    $sql = "DELETE FROM giohang WHERE idcart = ?";
    pdo_execute($sql, $idcart);
}
