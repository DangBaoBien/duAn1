<?php
// Model functions

// Chèn đơn hàng vào bảng `donhang`
function insert_order($idaccount, $fullname, $name_province, $name_district, $name_ward, $address, $phone, $paymentmethod, $status, $orderdate, $delivery, $subtotal, $comment) {
    $sql = "INSERT INTO donhang (idaccount, fullname, name_province, name_district, name_ward, address, phone, paymentmethod, status, orderdate, delivery, subtotal, comment) 
            VALUES ('$idaccount', '$fullname', '$name_province', '$name_district', '$name_ward', '$address', '$phone', '$paymentmethod', '$status', '$orderdate', '$delivery', '$subtotal', '$comment')";
    pdo_execute($sql);

    // Lấy lại `idorder` từ cơ sở dữ liệu
    $sql = "SELECT idorder FROM donhang 
            WHERE idaccount = '$idaccount' 
            AND fullname = '$fullname' 
            AND orderdate = '$orderdate' 
            ORDER BY idorder DESC LIMIT 1";
    return pdo_query_value($sql); // Hàm này trả về giá trị đầu tiên của cột `idorder`.
}

// Chèn chi tiết đơn hàng vào bảng `chitietdonhang`
function insert_order_details($idorder, $nameproduct, $quantity, $price, $subtotal, $img) {
    try {
        $sql = "INSERT INTO chitietdonhang (idorder, nameproduct, quantity, price, subtotal, img) 
                VALUES ('$idorder', '$nameproduct', '$quantity', '$price', '$subtotal', '$img')";
        pdo_execute($sql);
    } catch (Exception $e) {
        // Log lỗi vào file để kiểm tra
        error_log("Error inserting order details: " . $e->getMessage(), 3, "error_log.txt");
    }
}

// Giảm số lượng sản phẩm trong bảng `sanpham`
function update_product_quantity($idproduct, $quantityOrdered) {
    $sql = "UPDATE sanpham 
            SET quantity = quantity - $quantityOrdered 
            WHERE idproduct = $idproduct AND quantity >= $quantityOrdered";
    pdo_execute($sql);
}

function loadall_order() {
    $sql = "SELECT * FROM donhang ORDER BY idorder DESC";
    return pdo_query($sql);
}

function load_order_details($idorder) {
    $sql = "SELECT * FROM chitietdonhang WHERE idorder = ?";
    return pdo_query($sql, $idorder);
}
function update_order_status($idorder, $status) {
    $sql = "UPDATE donhang SET status = '$status' WHERE idorder = '$idorder'";
    pdo_execute($sql);
}
function load_order_by_id($idorder) {
    $sql = "SELECT * FROM donhang WHERE idorder = '$idorder'";
    return pdo_query_one($sql); // Trả về thông tin chi tiết của đơn hàng
}

function delete_order($idorder) {
    // Xóa chi tiết đơn hàng trước
    $sql_details = "DELETE FROM chitietdonhang WHERE idorder = ?";
    pdo_execute($sql_details, $idorder);

    // Xóa đơn hàng
    $sql_order = "DELETE FROM donhang WHERE idorder = ?";
    pdo_execute($sql_order, $idorder);
}


function load_orders_by_account($idaccount) {
    $sql = "SELECT * FROM donhang WHERE idaccount = ? ORDER BY idorder DESC";
    return pdo_query($sql, $idaccount);
}

function load_order_details_by_idorder($idorder) {
    $sql = "SELECT * FROM chitietdonhang WHERE idorder = ?";
    return pdo_query($sql, $idorder);
}
function load_orders_by_account_and_status($idaccount, $status) {
    $sql = "SELECT * FROM donhang WHERE idaccount = ? AND status = ? ORDER BY idorder DESC";
    return pdo_query($sql, $idaccount, $status);
}


function load_latest_order_details() {
    $sql = "SELECT dh.idorder, dh.fullname, dh.status, dh.orderdate, 
                   ctdh.nameproduct, ctdh.quantity, ctdh.price, ctdh.subtotal
            FROM donhang dh
            JOIN chitietdonhang ctdh ON dh.idorder = ctdh.idorder
            ORDER BY dh.idorder DESC
            LIMIT 0,10";
    return pdo_query($sql);
}

function load_best_selling_products() {
    $sql = "SELECT nameproduct, img, SUM(quantity) as total_quantity, SUM(subtotal) as total_sales
            FROM chitietdonhang
            GROUP BY nameproduct, img
            ORDER BY total_quantity DESC
            LIMIT 5";
    return pdo_query($sql);
}

