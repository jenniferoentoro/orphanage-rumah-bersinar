<?php
    require_once "../includes/connect_pdo.php";
    require_once "../includes/secure_check.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $find_data_pantiA = $pdo->prepare("SELECT SUM(jumlah_donasi) AS 'donasi_a' FROM `data_donasi` WHERE lokasi_donasi LIKE 'Panti Asuhan Rumah Bersinar'");
        $find_data_pantiA ->execute();
        $data_A = $find_data_pantiA->fetch();
        

        $find_data_pantiB = $pdo->prepare("SELECT SUM(jumlah_donasi) AS 'donasi_b' FROM `data_donasi` WHERE lokasi_donasi LIKE 'Panti Asuhan Saluran Berkat'");
        $find_data_pantiB ->execute();
        $data_B = $find_data_pantiB->fetch();

        $array_result = array('donasi_a'=>$data_A['donasi_a'], 'donasi_b'=>$data_B['donasi_b']);

        echo json_encode($array_result); 
    }
?>