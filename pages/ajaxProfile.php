<?php

require "../connection.php";

$action = "";

$deskripsi = $_POST['deskripsi'];
$tanggallahir = $_POST['tanggallahir'];
$namaanak = $_POST['nama'];
$asal = $_POST['asal'];
$pic = $_FILES['profilePic'];
// echo $_FILES["profilePic"]["tmp_name"][0] ;


$date = date('y-m-d');
$time = date("Hisa");
$nama = $pic['name'][0];
$extension = pathinfo($nama, PATHINFO_EXTENSION);
$root = $date."_".$time."_".uniqid().".".$extension;
$nama_foto = $_SERVER["DOCUMENT_ROOT"].'/pages/profileUpload/'.$root;
$file_foto = 'http://rumahbersinar.com/pages/profileUpload/'.$root;

    
    $valid_extensions = array('jpg', 'jpeg', 'png');
    $moved = move_uploaded_file($_FILES["profilePic"]["tmp_name"][0], $nama_foto );

    if ($_FILES['profilePic']['size'][0] <= 15242880) {
        if (in_array(strtolower($extension), $valid_extensions)) {
            if($moved) {

              


                        $sql = "INSERT INTO `profile`(`id`, `tanggallahir`, `nama`, `asal`, `deskripsi`, `filePath`) VALUES (null,'$tanggallahir','$namaanak','$asal','$deskripsi','$file_foto')";
                        $input = mysqli_query($con2, $sql);
                        if($sql){
                            $action .= "success";

                        } else{
                            $action .= "gagal1";
                        }
                   
                


                     
            

            } else {
                $action .= "gagal2";
            }
        }else{
            $action .= "gagal3";
        }
    } else {
        $action .= "gagal4";
    }
    



// }


echo $action;

?>