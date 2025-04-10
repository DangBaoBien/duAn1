<?php
function insert_binhluan($idaccount, $idproduct, $date, $content, $rating, $fullname) {
    $sql = "INSERT INTO binhluan (idaccount, idproduct, date, content, rating, fullname) 
            VALUES ('$idaccount', '$idproduct', '$date', '$content', '$rating', '$fullname')";
    pdo_execute($sql);
}

function loadall_binhluan() {
    $sql = "SELECT * FROM binhluan";
    $listcategory = pdo_query($sql); 
    return $listcategory;
}
function load_all_binhluan($idproduct) {
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM binhluan WHERE idproduct = :idproduct ORDER BY date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':idproduct' => $idproduct]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function delete_comment($idcomment){
    $sql="delete from binhluan where idcomment=".$_GET['idcomment'];
    pdo_execute($sql);
}
function delete_comment_account($idaccount){
    $sql="delete from binhluan where idaccount=".$_GET['idaccount'];
    pdo_execute($sql);
}
function update_binhluan($idcomment, $content) {
    $sql = "UPDATE binhluan SET content = ? WHERE idcomment = ?";
    pdo_execute($sql, $content, $idcomment);
}
