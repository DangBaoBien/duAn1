<?php
    function insert_product($idcategory, $nameproduct, $price,$priceold, $img, $descriptionproduct, $quantity, $color, $screensize,$ram,$releasedate, $views){
        $sql="INSERT INTO sanpham(idcategory,nameproduct,price,priceold,img,descriptionproduct,quantity,color,screensize,ram,releasedate, views) 
            VALUES('$idcategory','$nameproduct','$price','$priceold','$img','$descriptionproduct','$quantity','$color','$screensize','$ram','$releasedate', '$views')";
        pdo_execute($sql);
    }
    function delete_product($idproduct){
        $sql="DELETE FROm sanpham WHERE idproduct=".$idproduct;
        pdo_execute($sql);
    }
    function loadall_product_home(){
        $sql="SELECT * FROM sanpham WHERE 1 order by idproduct desc limit 0,12";
        $listproduct=pdo_query($sql);
        return $listproduct;
    }
    function load_popular_products() {
        $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY views desc LIMIT 0,16";
        $popularProducts = pdo_query($sql);
        return $popularProducts;
    }
    function loadall_product($kyw = "", $idcategory = 0, $price_range = "") {
        $sql = "SELECT * FROM sanpham WHERE 1";
        if ($kyw != "") {
            $sql .= " and nameproduct like '%" . $kyw . "%'";
        }
        if ($idcategory > 0) {
            $sql .= " and idcategory ='" . $idcategory . "'";
        }
        if ($price_range != "") {
            $prices = explode("-", $price_range);
            $min_price = intval($prices[0]);
            $max_price = intval($prices[1]);
            $sql .= " and price BETWEEN $min_price AND $max_price";
        }
        $sql .= " order by idproduct desc limit 0,16";
        $listproduct = pdo_query($sql);
        return $listproduct;
    }    
    function load_name_category($idcategory){
        if($idcategory>0){
        $sql="SELECT * FROM danhmuc WHERE idcategory =".$idcategory;  
        $category=pdo_query_one($sql);
        extract($category);
        return $namecategory;
        }else{
            return "";
        }
    }
    function loadone_product($idproduct){
        $sql="SELECT * FROM sanpham WHERE idproduct =".$idproduct;  
        $product=pdo_query_one($sql);
        return $product;
    }
    function load_product_same($idproduct,$idcategory){
        $sql="SELECT * FROM sanpham WHERE idcategory=".$idcategory." AND idproduct <>".$idproduct;  
        $listproduct=pdo_query($sql);
        return $listproduct;
    }
    function update_product( $nameproduct, $price,$priceold, $img, $descriptionproduct, $quantity, $color, $screensize,$ram,$releasedate,  $idproduct, $views) {
        if ($img != "") {
            $sql = "UPDATE sanpham SET nameproduct='".$nameproduct."', price='".$price."',priceold='".$priceold."', img='".$img."',descriptionproduct='".$descriptionproduct."',quantity='".$quantity."',color='".$color."',screensize='".$screensize."',ram='".$ram."', releasedate='".$releasedate."', views='".$views."' WHERE idproduct=".$idproduct;
        } else {
            $sql = "UPDATE sanpham SET nameproduct='".$nameproduct."', price='".$price."',priceold='".$priceold."', descriptionproduct='".$descriptionproduct."',quantity='".$quantity."',color='".$color."',screensize='".$screensize."',ram='".$ram."', releasedate='".$releasedate."', views='".$views."' WHERE idproduct=".$idproduct;
        }
        pdo_execute($sql);
    }    
      
    function increase_views($idproduct) {
        // Lấy số lượt xem hiện tại từ sản phẩm
        $sql = "SELECT views FROM sanpham WHERE idproduct = ?";
        $product = pdo_query_one($sql, $idproduct);
    
        if ($product) {
            // Tăng lượt xem thêm 1
            $new_views = $product['views'] + 1;
    
            // Cập nhật lại số lượt xem vào cơ sở dữ liệu
            $sql = "UPDATE sanpham SET views = ? WHERE idproduct = ?";
            pdo_execute($sql, $new_views, $idproduct);
        }
    }

    function load_all_products_by_views() {
        $sql = "SELECT idproduct, nameproduct, price, img, views, quantity
                FROM sanpham
                ORDER BY views DESC";
        return pdo_query($sql);
    }
    
?>