<?php
    require_once "../connection.php";

    if(isset($_GET)){
        $q = mysqli_query($con2, "SELECT id, nama FROM profile");
    }
    $arr = [];
    while($res = mysqli_fetch_assoc($q)){
        array_push($arr, $res);
    }
    echo json_encode($arr);
?>