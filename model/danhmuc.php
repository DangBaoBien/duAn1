<?php
    function insert_danhmuc($namecategory){
        $sql="insert into danhmuc(namecategory) value('$namecategory')";
        pdo_execute($sql);
    }
    function loadall_category() {
        $sql = "SELECT * FROM danhmuc ORDER BY idcategory DESC";
        $listcategory = pdo_query($sql); 
        return $listcategory;
    }

    function delete_category($idcategory){
        $sql="delete from danhmuc where idcategory=".$_GET['idcategory'];
        pdo_execute($sql);
    }
    function loadone_category($idcategory){
        $sql="select * from danhmuc where idcategory =".$_GET['idcategory'];  
        $category=pdo_query_one($sql);
        return $category;
    }
    function update_category($idcategory, $namecategory){
        $sql="update danhmuc set namecategory='".$namecategory."' where idcategory=".$idcategory;
        pdo_execute($sql);
    }
?>