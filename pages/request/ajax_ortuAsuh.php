<?php

    require_once "../includes/connect_pdo.php";
    require_once "../../connection.php";


    $donator = htmlspecialchars($_POST['a']);
    $phone = htmlspecialchars($_POST['k']);
    $id_anak = htmlspecialchars($_POST['r']);
    $amount = htmlspecialchars($_POST['e']);
    $payment = $_FILES['b'] ?? null;

    function checkNumber($numeric_data) {
        if (is_numeric($numeric_data)) {
            return true;
        } else {
            return false;
        }
    }

    function checkFileSize($file_size){
        $original_file_size = $file_size['size'];
        if ($original_file_size < 5242880 && $original_file_size > 1) {
            return true;
        } else {
            return false;
        }
    }

    function checkExtension($file_extension){
        $original_file_name = $file_extension['name'];
        $split_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
        $valid_extensions = array('jpg', 'jpeg', 'png');
        if (in_array(strtolower($split_extension), $valid_extensions)) {
            return true;        
        } else {
            return false;
        }
    }

    function callExtension($call_extension){
        $original_file_name = $call_extension['name'];
        $split_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
        return $split_extension;
    }

    
    function uploadInformation($name, $number, $anak, $total, $file){
        global $pdo;
        $extension = callExtension($file);
        $new_file_name = $name."_".uniqid().".".$extension;
        $new_file_path = $_SERVER["DOCUMENT_ROOT"].'/pages/assets/bukti_transfer_ortuAsuh/'.$new_file_name;
 
        $nama_user = $_SESSION['namaUser'];
        $find_data = $pdo->prepare("SELECT `id` FROM `user_data` WHERE name = ? ORDER BY id ASC");
        $find_data->execute([$nama_user]);
        $data = $find_data->fetch();
        $id_user = $data['id'];

        // $find_anak = $pdo->prepare("SELECT `nama` FROM `profile` WHERE name = ? ORDER BY id ASC");
        // $find_anak->execute([$anak]);
        // $data_anak = $find_data->fetch();
        // $nama_anak = $data_anak['nama'];

        $sql = "INSERT INTO `data_ortuAsuh`(`id`, `nama_donatur`, `nomor_telepon`, `jumlah_donasi`, `bukti_trf`, `idAnak`, `idUser`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $send_data= $pdo->prepare($sql);
        $send_data->execute([$name, $number, $total, $new_file_name, $anak, $id_user]);


        $move = move_uploaded_file($file['tmp_name'], $new_file_path);
    }

    $result = '';

    if (!empty($donator) && !empty($phone) && !empty($id_anak) && !empty($amount) && !is_null($payment)) {
        if (checkNumber($phone) == 1 && checkNumber($amount) == 1) {
            if (checkFileSize($payment) == 1) {
                if (checkExtension($payment) == 1) {
                    uploadInformation($donator, $phone, $id_anak, $amount, $payment);
                    $result = "<div class='col-12 modal-writing mb-3'>
                                    <h3 class='modal-text mb-3'>Orang tua asuh Berhasil!</h3> 
                                    <p class='modal-warning-text'>Terima kasih atas dana yang diberikan, semoga sehat selalu 🙏 </p>
                                </div>
                                <br>
                                <div class='col-12 close-wrapper'>
                                    <button type='button' class='close-button-modal' data-bs-dismiss='modal' id='refresh'>Close</button>
                                </div>";

                } else {
                    $result = "<div class='col-12 modal-writing mb-2'>
                                    <h3 class='modal-text mb-3'>Donasi Gagal!</h3>
                                    <p class='modal-warning-text'>Format File gambar bukti transfer salah! </p>
                                </div>
                                <br>
                                <div class='col-12 close-wrapper'>
                                    <button type='button' class='close-button-modal' data-bs-dismiss='modal' id='refresh'>Close</button>
                                </div>";
                }
            } else {
                $result = "<div class='col-12 modal-writing mb-2'>
                                <h3 class='modal-text mb-3'>Donasi Gagal!</h3>
                                <p class='modal-warning-text'>File gambar bukti transfer terlalu besar! </p>
                            </div>
                            <br>
                            <div class='col-12 close-wrapper'>
                                <button type='button' class='close-button-modal' data-bs-dismiss='modal' id='refresh'>Close</button>
                            </div>";
            }
        } else {
            $result = "<div class='col-12 modal-writing mb-2'>
                            <h3 class='modal-text mb-3'>Donasi Gagal!</h3>
                            <p class='modal-warning-text'>Format data masih ada yang salah! </p>
                        </div>
                        <br>
                        <div class='col-12 close-wrapper'>
                            <button type='button' class='close-button-modal' data-bs-dismiss='modal' id='refresh'>Close</button>
                        </div>";
        }
    } else {
            $result = "<div class='col-12 modal-writing mb-2'>
                            <h3 class='modal-text mb-3'>Donasi Gagal!</h3>
                            <p class='modal-warning-text'>Data masih ada yang belum diisi! </p>
                        </div>
                        <br>
                        <div class='col-12 close-wrapper'>
                            <button type='button' class='close-button-modal' data-bs-dismiss='modal' id='refresh'>Close</button>
                        </div>";
    }   


    echo $result;


















?>