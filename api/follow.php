<?php 

include '../connection.php';
$email = $_SESSION['email'];

$sql = "SELECT * FROM user_data WHERE email='$email'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);
$iduser = $row['id'];

$id = $_POST['id'];


$sql2 = "SELECT * FROM `user_follow` WHERE id_user_follower = '$iduser' && id_user_following = '$id'";

$result2 = mysqli_query($con, $sql2);





if ($result2->num_rows > 0) {
    $sql_img_2 =  "DELETE FROM `user_follow` WHERE id_user_follower = '$iduser' && id_user_following = '$id'";
    $inserted_3 = mysqli_query($con, $sql_img_2);


    $sql4 = "SELECT * FROM `user_follow` WHERE id_user_follower = '$id'";
$result4 = mysqli_query($con, $sql4);

$following = 0;
while ($res= mysqli_fetch_assoc($result4)){
    $following++;
}


$sql5 = "SELECT * FROM `user_follow` WHERE id_user_following = '$id'";
$result5 = mysqli_query($con, $sql5);

$followers = 0;
while ($res= mysqli_fetch_assoc($result5)){
    $followers++;
}

    if($inserted_3){
        echo "1-".$followers."-".$following;
    }else{
        echo '3-'.$followers."-".$following;
    }

}
else{
    $sql_img_2 =  "INSERT INTO `user_follow`(`id`, `id_user_follower`, `id_user_following`) VALUES (null,'$iduser','$id')";
    $inserted_3 = mysqli_query($con, $sql_img_2);


    $sql4 = "SELECT * FROM `user_follow` WHERE id_user_follower = '$id'";
$result4 = mysqli_query($con, $sql4);

$following = 0;
while ($res= mysqli_fetch_assoc($result4)){
    $following++;
}


$sql5 = "SELECT * FROM `user_follow` WHERE id_user_following = '$id'";
$result5 = mysqli_query($con, $sql5);

$followers = 0;
while ($res= mysqli_fetch_assoc($result5)){
    $followers++;
}

    if($inserted_3){
        echo "2-".$followers."-".$following;
    }else{
        echo '4-'.$followers."-".$following;
    }

}







?>