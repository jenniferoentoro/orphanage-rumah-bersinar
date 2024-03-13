<?php

require "../connection.php";

$action = "";

$id=$_POST['id'];


$sql = "DELETE FROM `gallery` WHERE id=$id";
$input = mysqli_query($con2, $sql);
if($sql){
    $action .= "success";

} else{
    $action .= "gagal1";
}





echo $action;

?>