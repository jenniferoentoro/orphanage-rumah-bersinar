<?php
include '../connection.php';
$email = $_SESSION['change_password_email'];
$select_query = "SELECT special_code, date_valid_until FROM change_password WHERE email='$email';";
$result = mysqli_query($con, $select_query)->fetch_all();
$result_length = count($result);
if ($result[$result_length-1][1] < date('Y-m-d H:i:s')) {
    unset($_SESSION['change_password_email']);
    $_SESSION['refresh_expired'] = 1;
}
if (!isset($_SESSION['change_password_email'])) {
    header('Location: change_password1.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <?php include './templates/head.php' ?>
    <link rel="stylesheet" href="css/change_password.css" />

</head>

<body class="container">
    <form class="center change_password2">
        <!-- <div class="mb-3">
            <label class="form-label ms-2">Special Code</label>
            <input type="text" class="form-control" id="special_code" name="special_code" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label ms-2">New Password</label>
            <input type="password" class="form-control" id="new_password" name="password" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label ms-2">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                aria-describedby="emailHelp">
        </div> -->
        <div class="card mb-3" style="max-width: 40rem; border: 0; border-radius: 20px">
            <div style="border-radius: 20px 20px 0 0; padding: 12px;" class="card-header text-white bg-dark">Change
                Password!</div>
            <div style="padding: 20px;" class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-dark">Special Code</label>
                        <input name="special_code" class="form-control" id="special_code" aria-describedby="emailHelp">

                    </div>
                    <div class="form-group mt-3">
                        <label class="text-dark" for="exampleInputPassword1">New Password</label>
                        <input type="password" name="password" class="form-control" id="new_password">
                    </div>
                    <div class="form-group mt-3">
                        <label class="text-dark" for="exampleInputPassword1">Password Confirm</label>
                        <input type="password" name="password_confirm" class="form-control" id="password_confirm">
                    </div>
                    <button type="submit" style="width: 100%;" id="submit" class="btn btn-dark mt-3">Submit</button>
                </form>
            </div>
        </div>

        <!-- <button type="submit" id="submit" class="btn btn-primary">Submit</button> -->
    </form>

    <!-- Modal -->
    <div id="modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="text-center modal-content d-block">
                <div id="loader" class="loadingio-spinner-bean-eater-r6euvkiv4n">
                    <div class="ldio-02s68rsip98r">
                        <div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
    // loading screen
    $(document).ajaxStart(function() {
        // Show image container
        $("#modal").modal('show');
    });
    $(document).ajaxComplete(function() {
        // Hide image container
        $("#modal").hide();
    });
    $('#submit').click(function(e) {
        $("#submit").attr("disabled", true);
        e.preventDefault();
        let special_code = $('#special_code').val();
        let new_password = $('#new_password').val();
        let password_confirm = $('#password_confirm').val();
        $.ajax({
            url: '../api/change_password2.php',
            type: 'POST',
            data: {
                special_code: special_code,
                new_password: new_password,
                password_confirm: password_confirm
            },
            success: function(data) {
                $("#submit").attr("disabled", false);
                let parsed = JSON.parse(data);
                if (parsed.status == 400) {
                    swal.fire({
                        title: "Error",
                        text: parsed.message,
                        icon: "error",
                        confirmButtonText: "OK"
                    }).then(function() {
                        $("#modal").modal('hide');
                    });
                } else if (parsed.status == 200) {
                    swal.fire({
                        title: "Success",
                        text: parsed.message,
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location.href = "change_password1.php";
                    });
                } else if (parsed.status == 469) { //special code expired
                    swal.fire({
                        title: "Error",
                        text: parsed.message,
                        icon: "error",
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location.href = "change_password1.php";
                    });
                }
            }
        });
    });
    </script>
</body>

</html>