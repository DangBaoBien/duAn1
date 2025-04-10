<?php
    function loadall_taikhoan(){
        $sql="select * from taikhoan order by idaccount  desc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }

    function insert_taikhoan($fullname,$password,$email,$address, $phone, $name_ward, $name_district, $name_province, $created_at ){
        $sql="insert into taikhoan(fullname, password, email, address, phone, name_ward, name_district, name_province, created_at ) values('$fullname', '$password', '$email', '$address', '$phone', '$name_ward', '$name_district', '$name_province', '$created_at')";
        pdo_execute($sql);
    }
    function insert_admin($fullname,$password,$email ,$role, $created_at ){
        $sql="insert into taikhoan(fullname, password, email, created_at ) values('$fullname', '$password', '$email', '$role', '$created_at')";

        pdo_execute($sql);
    }

    function checkuser($email, $password){
        $sql="select * from taikhoan where email='".$email."' AND password='".$password."'";
        $nd=pdo_query_one($sql);
        return $nd;
    }

    function delete_taikhoan($idaccount){
        $sql="delete from taikhoan where idaccount=".$_GET['idaccount'];
        pdo_execute($sql);
    }

    function loadone_taikhoan($idaccount){
        $sql="select * from taikhoan where idaccount =".$_GET['idaccount'];  
        $account=pdo_query_one($sql);
        return $account;
    }

    function update_taikhoan($idaccount, $fullname,$password,$email,$address, $phone, $name_ward, $name_district, $name_province){
        $sql="update taikhoan set email='".$email."', fullname='".$fullname."',password='".$password."', address='".$address."', phone='".$phone."', name_ward='".$name_ward."', name_district='".$name_district."', name_province='".$name_province."' where idaccount=".$idaccount;
        pdo_execute($sql);
    }
    function update_matkhau($idaccount, $password) {
        $sql = "UPDATE taikhoan SET password='" . $password . "' WHERE idaccount=" . $idaccount;
        pdo_execute($sql);
    }
    function check_old_password($idaccount, $oldpassword) {
        $sql = "SELECT * FROM taikhoan WHERE idaccount=" . $idaccount . " AND password='" . $oldpassword . "'";
        return pdo_query_one($sql);
    }
        