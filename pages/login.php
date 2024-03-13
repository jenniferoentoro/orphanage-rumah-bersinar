<?php
include "../connection.php";
if (isset($_SESSION['email'])) {
    //redirect to home.php
    header("Location: gallery.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <link rel="icon" href="assets\logo.png" sizes="20">


    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- SWIPER JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Panti Asuhan</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@500;800&display=swap');
    a {
        text-decoration: none;
        color: white;
    }

    .backToHome:hover {
        color: #A2DBFA;
    }

    .backToHome i {
        display: inline-block;
        padding-left: 5px;
        -webkit-transition: all 0.3s ease-out 0s;
        transition: all 0.3s ease-out 0s;
    }

    .backToHome:hover i {
        margin-left: -20px;
        padding-right: 20px;
    }

    .swal2-styled.swal2-confirm {
        background: initial;
        background-color: #ffffff;
        color: #fff;
    }

    .swal2-popup {
        background-color: #1a1a1a;
    }

    .swal2-title {
        color: #ffffff;
    }

    .swal2-content {
        color: #ffffff;
    }

    

        .pc {
            display: none;
        }

        input,
        textarea {
            padding: 0px;
        }

        .hp {
            height: 100%;
            width: 100%;
            place-items: center;
            display: grid;
            text-align: center;
            position: absolute;
            
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

    /*    body {
            place-items: center;
            display: grid;
            text-align: center;
            height: 100%;
            position: absolute;
            width: 100%;
            background-color: #ffffff;
        }*/

        .content {
            margin-top: -50px;
            max-width: 532px;
            width: 66vw;
            padding: 40px 30px;
            border-radius: 10px;
        }

        .content .text {
            font-size: 33px;
            color: #9D3B2F;
            margin-bottom: 20px;
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
            text-align: left;
            border-bottom: dashed 1.5px #9D3B2F;
            padding-bottom: 3px;
            width: fit-content;
        }

        form .field {
            height: 50px;
            width: 100%;
            display: flex;
            margin-top: 20px;
            font-family: 'Raleway', sans-serif;
            font-weight: 500;
        }

        .field input {
            height: 100%;
            width: 100%;
            border: 2px solid #9D3B2F;
            background: #FFE5DB;;
            padding-left: 12px;
            color: #9D3B2F;
            font-size: 17px;
        }

        .member .field input:focus {
            border-color: #9D3B2F;
        }

        .regist .field input:focus {
            border-color: #9D3B2F;
        }

        input::placeholder {
            color: #9D3B2F;
        }

        input:focus-visible {
            outline:none;
        }

        .field span {
            position: absolute;
            width: 50px;
            color: #8c8c8c;
            line-height: 50px;
        }

        form .forgot-pass {
            text-align: right;
            margin: 10px 0 10px 5px;
        }

        form .forgot-pass a {
            color: #9D3B2F;
            font-size: 16px;
            text-decoration: none;
        }

        form .forgot-pass a:hover {
            text-decoration: underline;
            transition-duration: 0.5s;
            transition-timing-function: ease;
        }

        form #LoginP, form #RegisterP, form #activationP{
            /* margin: 15px 0; */
            width: 100%;
            height: 50px;
            font-size: 18px;
            background: #9D3B2F;
            border: none;
            border-radius: 40px;
            outline: none;
            color: #ffffff;
            cursor: pointer;
            font-weight: 600;
            transition-duration: 0.5s;
            transition-timing-function: ease;
            font-family: 'Raleway', sans-serif;
            font-weight: 500;
        }

        form #LoginP:hover, form #RegisterP:hover, form #activationP:hover {
            background-color: #d8887e;
            transition-duration: 0.5s;
            transition-timing-function: ease;
        }

        form .signup-link {
            margin: 10px 0;
            color: #9d3b2f;
            font-size: 16px;
        }

        #show a, #hide a{
            color: #00C9D3;
            font-size: 16px;
            text-decoration: none;
            transition-duration: 0.5s;
            transition-timing-function: ease;
        }

        #show a:hover, #hide a:hover {
            text-decoration: underline;
            transition-duration: 0.5s;
            transition-timing-function: ease;

        }

    .regist {
        display: none;
    }
    </style>
    <script>
    $(document).ready(function() {
        $("#hide").click(function() {
            $(".regist").hide(500);
            $(".member").show(500);
        });
        $("#show").click(function() {
            $(".member").hide(500);
            $(".regist").show(500);
        });
    });
    </script>
</head>

<body style="background-color: #FFE5DB;
            opacity: 1;
            background-image: radial-gradient(#9d3b2f 0.9px, #FFE5DB 0.9px);
            background-size: 18px 18px;">
    <?php   include 'navbar.php'; ?>

   <!--  <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets\logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Twister
            </a>
        </div>
    </nav> -->


 
    <div class="hp">
     
        <div class="content member">
            <div class="text" data-aos="fade-left">Login Form</div>
            <form action="">
                <div class="field" data-aos="zoom-in-down">
                    <input type="email" placeholder="Email" id="emailLP" required>
                </div>
                <div class="field" data-aos="zoom-in-down">
                    <input type="password" placeholder="Password" id="passwordLP" required>
                </div>
                <div class="forgot-pass"><a href="change_password1.php" class="forgot mt-3" data-aos="fade-left">Forgot Password?</a></div>
                <input type="button" value="Login" id="LoginP" data-aos="zoom-in">
                <div class="signup-link" id="show"  data-aos="fade-left" >Dont have an account?
                    <a href="#">Sign Up</a>
                </div>
            </form>
        </div>

        <div class="content regist"
            style="margin-bottom: 20px;">
            <div class="text" data-aos="fade-left">Sign up</div>
            <form action="">
                <div class="field" data-aos="zoom-in-down">
                    <input type="text" placeholder="Name" id="nameRP" required>
                </div>
                <div class="field" data-aos="zoom-in-down">
                    <input type="email" placeholder="Email" id="emailRP" required>
                </div>
                <div class="field" data-aos="zoom-in-down">
                    <input type="password" placeholder="Password" id="passwordRP" required>
                </div>
                <div class="field" data-aos="zoom-in-down">
                    <input type="text" placeholder="Special Code" id="special_codeRP" required>
                </div>
                <input type="button" style="float: left;" value="Request Code" class="mt-3" id="activationP" data-aos="zoom-in">
                <input type="button" value="Register" class="mt-3" id="RegisterP" data-aos="zoom-in">
                <div class="signup-link" id="hide"  data-aos="fade-left">Already have an account?
                    <a href="#">Log In</a>
                </div>
            </form>

        </div>

    </div>
    <script>
    //activation on click

    $("#activation").click(function() {
        $("#activation").attr("disabled", true);
        var email = $("#emailReg").val();
        var name = $("#nameReg").val();
        var password = $("#pwReg").val();

        $.ajax({
            url: "../api/activation.php",
            method: "POST",
            data: {
                email: email,
                name: name,
                password: password
            },
            success: function(data) {
                $("#activation").attr("disabled", false);
                let parsed = JSON.parse(data);
                if (parsed.status == 400 || parsed.status == 500 || parsed.status == 469) {
                    swal.fire({
                        title: "Error",
                        text: parsed.message,
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                } else if (parsed.status == 200) {
                    swal.fire({
                        title: "Success",
                        text: parsed.message,
                        icon: "success",
                        confirmButtonText: "OK"
                    })
                }
            }
        });
    });

    $("#activationP").click(function() {
        $("#activationP").attr("disabled", true);
        var email = $("#emailRP").val();
        var name = $("#nameRP").val();
        var password = $("#passwordRP").val();

        $.ajax({
            url: "../api/activation.php",
            method: "POST",
            data: {
                email: email,
                name: name,
                password: password
            },
            success: function(data) {
                $("#activationP").attr("disabled", false);
                let parsed = JSON.parse(data);
                if (parsed.status == 400 || parsed.status == 500 || parsed.status == 469) {
                    swal.fire({
                        title: "Error",
                        text: parsed.message,
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                } else if (parsed.status == 200) {
                    swal.fire({
                        title: "Success",
                        text: parsed.message,
                        icon: "success",
                        confirmButtonText: "OK"
                    })
                }
            }
        });
    });

    $(document).ready(function() {
        $('.login-Box').fadeOut();
        $('.login-show').addClass('show-log-panel');
        $('.vertical-box input[type="radio"]').on('change', function() {
            if ($('#log-login-show').is(':checked')) {
                $('.register-Box').fadeOut();
                $('.login-Box').fadeIn();

                $('.slidingss').addClass('right-log');
                $('.register-show').addClass('show-log-panel');
                $('.login-show').removeClass('show-log-panel');

            } else if ($('#log-reg-show').is(':checked')) {
                $('.register-Box').fadeIn();
                $('.login-Box').fadeOut();

                $('.slidingss').removeClass('right-log');

                $('.login-show').addClass('show-log-panel');
                $('.register-show').removeClass('show-log-panel');
            }
        });
        



        $('#LoginP').on('click', function() {
            var email = $('#emailLP').val();
            var password = $('#passwordLP').val();
            if (typeof(email) != "undefined" && email != null && email != "" && typeof(password) !=
                "undefined" && password != null && password != "") {
                $.ajax({
                    url: "../api/login.php",
                    method: "POST",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(result) {
                        

                        if (result == 7) {
                            window.location.href = "adminGallery.php";
                        }
                        if (result == 0) {
                            window.location.href = "ortuAsuh.php";
                        } else if (result == 1) {
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Email tidak boleh kosong!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 2) {
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Password tidak boleh kosong',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 3) {
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Password salah!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 4) {
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Account tidak ditemukan!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 5) {
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Session anda expired',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 6) {
                            Swal.fire({
                                title: 'Login Failed !',
                                text: 'Email harus mengandung titik (.) dan (add) @',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    },
                });

            } else {
                Swal.fire({
                    title: 'Login Failed !',
                    text: 'Data belum lengkap!',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        });



      

        $('#RegisterP').on('click', function() {
            var name = $('#nameRP').val();
            var email = $('#emailRP').val();
            var password = $('#passwordRP').val();
            var special_code = $('#special_codeRP').val();
            if (typeof(email) != "undefined" && email != null && email != "" && typeof(password) !=
                "undefined" && password != null && password != "" && typeof(name) != "undefined" &&
                name != null && name != "") {
                $.ajax({
                    url: "../api/add_user.php",
                    method: "POST",
                    data: {
                        name: name,
                        email: email,
                        password: password,
                        special_code: special_code
                    },
                    success: function(result) {
                        if (result == 200) {
                            Swal.fire({
                                title: 'Register success !',
                                text: 'Silahkan login!',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            })
                            $('#nameRP').val('');
                            $('#emailRP').val('');
                            $('#passwordRP').val('');
                            $('#special_codeRP').val('');
                        } else if (result == 0) {
                            Swal.fire({
                                title: 'Register Failed !',
                                text: 'Silahkan register ulang!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 2) {
                            Swal.fire({
                                title: 'Register Failed !',
                                text: 'Email harus mengandung titik (.) dan (add) @',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 4) {
                            Swal.fire({
                                title: 'Register Failed !',
                                text: 'Email sudah terdaftar!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 7) {
                            Swal.fire({
                                title: 'Register Failed !',
                                text: 'Please fill all fields!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 8) {
                            Swal.fire({
                                title: 'Register Failed !',
                                text: 'Your Special Code is incorrect!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 6) {
                            Swal.fire({
                                title: 'Register Failed !',
                                text: 'Please request a Special Code!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        } else if (result == 9) {
                            Swal.fire({
                                title: 'Register Failed !',
                                text: 'Your Special Code has expired! Please request a new one!',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }

                    },
                });

            } else {
                Swal.fire({
                    title: 'Register Failed !',
                    text: 'Data belum lengkap!',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        });




    });
    </script>
</body>

</html>

<!-- AOS-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>