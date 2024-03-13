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
<?php
session_start();
if (isset($_SESSION['change_password_email'])) {
    header("Location: change_password2.php");
}
if (isset($_SESSION['refresh_expired'])) {
    echo '<script>
    $(document).ready(function(){
        swal.fire({
            title: "Error",
            text: "Your Special Code has expired. Please request a new one.",
            icon: "error",
            confirmButtonText: "OK"
        });
    }); 
    </script>';
    unset($_SESSION['refresh_expired']);
}
?>



<body class="container">

    <form>
        <div class="center mb-3">
            <!-- <label for="exampleInputEmail1" class="form-label ms-2">Forgot Password</label>
            <div class="input-group">
                <input type="email" id="email" placeholder="Email address" style="border-radius: 20px 0 0 20px;"
                    class="form-control m-auto" name="email" aria-describedby="emailHelp">

                <button style="border-radius: 0 20px 20px 0;" type="submit" id="submit"
                    class="btn btn-primary">Submit</button>
            </div> -->

            <div class="card mb-3" style="max-width: 40rem; border: 0; border-radius: 20px">
                <div style="border-radius: 20px 20px 0 0; padding: 12px;" class="card-header text-white bg-dark">Forgot
                    Password!</div>
                <div style="padding: 20px;" class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-dark">Email</label>
                            <input name="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mt-2">
                            <a href="login.php" style="text-decoration: none; color: #ebbc50;">Back to
                                login!</a>
                        </div>

                        <button type="submit" style="width: 100%;" id="submit" class="btn btn-dark mt-2">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </form>




    <!-- Vertically centered modal -->

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
    //ajax
    $('#submit').click(function(e) {
        $("#submit").attr("disabled", true);
        e.preventDefault();
        let email = $('#email').val();
        let password = $('#password').val();
        $.ajax({
            url: '../api/change_password1.php',
            type: 'POST',
            data: {
                email: email,
            },
            success: function(data) {
                $("#submit").attr("disabled", false);
                let parsed = JSON.parse(data);
                if (parsed.status == 400 || parsed.status == 500) {
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
                        window.location.href = "./change_password2.php";
                    });
                }
            }
        });
    });
    </script>

</body>

</html>