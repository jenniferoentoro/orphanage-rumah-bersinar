<?php

require "../connection.php";

$action = "";

$deskripsiE = $_POST['deskripsiE'];
$tanggalE = $_POST['tanggalE'];
$judulE = $_POST['judulE'];
$id=$_POST['id'];


$sql = "UPDATE `gallery` SET `deskripsi` = '$deskripsiE', `tanggal` = '$tanggalE',`judul` = '$judulE' WHERE id=$id";
$input = mysqli_query($con2, $sql);
if($sql){
    $action .= "success";

} else{
    $action .= "gagal1";
}





echo $action;

?>