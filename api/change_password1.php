<?php
include '../connection.php';
require '../library/PHPMailer.php';
require '../library/SMTP.php';
require '../library/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function generateRandomNumber($length = 8) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// POST METHOD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'])) {
        echo json_encode(array('status' => 400, 'message' => 'Email is required'));
    } else {
        $email = $_POST['email'];
        $select_query = "SELECT * FROM user_data WHERE email='$email';";
        $result = mysqli_query($con, $select_query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $random_number = generateRandomNumber();
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->Username = "twister.web.official@gmail.com";
            $mail->Password = "ahsborqqqssumpis";
            $mail->Subject = "Forget Password";
            $mail->setFrom("twister.web.official@gmail.com");
            $mail->isHTML(true);
            $mail->Body = "<div><h2>This will be valid for 5 minutes</h2><h1>Your special code is: <span style='color: #fc9803'>$random_number</span></h1></div>";
            $mail->addAddress($email);
            if ($mail->Send()) {
                $_SESSION['change_password_email'] = $email;
                $data_valid_until = date('Y-m-d H:i:s', strtotime('+5 minutes'));
                $insert_query = "INSERT INTO change_password (email, special_code, date_valid_until) VALUES ('$email', '$random_number', '$data_valid_until');";
                $result = mysqli_query($con, $insert_query);
                echo json_encode(array('status' => 200, 'message' => 'Please check your email for Special Code!'));
            } else {
                echo json_encode(array('status' => 500, 'message' => 'Mail Server Error!'));

            }
            $mail->smtpClose();
        } else {
            echo json_encode(array('status' => 400, 'message' => 'Email is not registered'));
        }
    }
}



?>