<?php
    require_once "../includes/connect_pdo.php";
    require_once "../includes/secure_check.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $donasi = decrypt($_POST["donation_id"]);
        $find_data = $pdo->prepare("SELECT `bukti_trf` FROM `data_donasi` WHERE id=?");
        $find_data ->execute([$donasi]);
        $data = $find_data->fetch();
        
        echo "  <div class='row modalcontent' align='center'>
                    <div class='col-12'>  <img style='width: 100%;' src='https://rumahbersinar.com/pages/assets/bukti_transfer/".$data['bukti_trf']."'></div>
                </div>"; 
    }
?>


