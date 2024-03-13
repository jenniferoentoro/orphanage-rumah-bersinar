<?php
    require_once "../includes/connect_pdo.php";
    require_once "../includes/secure_check.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $donasi = decrypt($_POST["donation_id"]);
        $find_pic = $pdo->prepare("SELECT `bukti_trf` FROM `data_donasi` WHERE id=?");
        $find_pic ->execute([$donasi]);
        $data_pic = $find_pic->fetch();

        $old = getcwd();
        chdir("../assets/bukti_transfer/");
        unlink($data_pic['bukti_trf']);
        chdir($old);

        $find_data = $pdo->prepare("DELETE FROM `data_donasi` WHERE id=?");
        $find_data ->execute([$donasi]);
        $data = $find_data->fetch();
        
        echo "success";
    }
?>