<?php
include '../connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['change_password_email'])) {
    $change_password_email = $_SESSION['change_password_email'];
    $select_query = "SELECT special_code, date_valid_until FROM change_password WHERE email='$change_password_email';";
    $result = mysqli_query($con, $select_query)->fetch_all();
    $result_length = count($result);
    if ($result[$result_length-1][1] < date('Y-m-d H:i:s')) {
        unset($_SESSION['change_password_email']);
        echo json_encode(array('status' => 469, 'message' => 'Your Special Code has expired. Please request a new one.'));
    }
    if (isset($_SESSION['change_password_email'])) {
        if ($result[$result_length-1][0] == $_POST['special_code']) {
            if (strlen($_POST['new_password']) >= 8) {
                if ($_POST['new_password'] == $_POST['password_confirm']) {
                    $password = $_POST['new_password'];
                    //bcrypt password
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $update_query = "UPDATE user_data SET password='$password' WHERE email='$change_password_email';";
                    $result = mysqli_query($con, $update_query);
                    unset($_SESSION['change_password_email']);
                    echo json_encode(array('status' => 200, 'message' => 'Your password has been changed.'));
                } else {
                    echo json_encode(array('status' => 400, 'message' => 'New password and password confirmation do not match.'));
                }
            } else {
                echo json_encode(array('status' => 400, 'message' => 'New password must be at least 8 characters long.'));
            }
        } else {
            echo json_encode(array('status' => 400, 'message' => 'Your Special Code is incorrect.'));
        }
    }
    

}
?>