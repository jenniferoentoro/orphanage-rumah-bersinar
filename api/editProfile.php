<?php

require "../connection.php";

$action = "";

$deskripsiE = $_POST['deskripsiE'];
$tanggallahirE = $_POST['tanggallahirE'];
$namaE = $_POST['namaE'];
$asalE=$_POST['asalE'];
$id=$_POST['id'];


$sql = "UPDATE `profile` SET `deskripsi` = '$deskripsiE',`asal` = '$asalE', `tanggallahir` = '$tanggallahirE',`nama` = '$namaE' WHERE id=$id";
$input = mysqli_query($con2, $sql);
if($sql){
    $action .= "success";

} else{
    $action .= "gagal1";
}





echo $action;

?>