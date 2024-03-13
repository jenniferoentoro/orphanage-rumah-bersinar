<?php  


include '../connection.php';






?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-tap-highlight" content="no">
 
    <title>Panti Asuhan Saluran Berkat</title>
    <link rel="stylesheet" href="dist/material-cards.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,200,500,600,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        html {
            position: relative;
            min-height: 100%;
        }

        body {
            background-color: #FFE5DB;
            opacity: 1;
            background-image: radial-gradient(#9d3b2f 0.9px, #FFE5DB 0.9px);
            background-size: 18px 18px;            
            color: #37474F;
            font-family: 'Raleway', sans-serif;
            
        }

        h1 {
            font-weight: 900;
            color: #9D3B2F;
        }
        
        
        h2, h3 {
            font-weight: 500;
            margin-top: 0px;
            color: #9D3B2F;

        }

        hr {
            color: #9D3B2F;
            height: 1px;
            background-color: #9D3B2F;
            opacity: 1;
        }

        .fa-spin-fast {
            -webkit-animation: fa-spin-fast 0.2s infinite linear;
            nimation: fa-spin-fast 0.2s infinite linear;
        }
        @-webkit-keyframes fa-spin-fast {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
            }
        }
        @keyframes fa-spin-fast {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
            }
        }
        .material-card {
            position: relative;
            height: 0;
            padding-bottom: calc(100% - 16px);
            margin-bottom: 6.6em;
        }
        .material-card h2 {
            position: absolute;
            top: calc(100% - 16px);
            left: 0;
            width: 100%;
            padding: 10px 16px;
            color: #fff;
            font-size: 1.4em;
            line-height: 1.6em;
            margin: 0;
            z-index: 10;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }
        .material-card h2 span {
            display: block;
            font-family: 'Concert One', cursive;
            text-transform: capitalize;
            font-size: 30px;
        }
        .material-card h2 strong {
            display: block;
            font-family: 'Raleway', sans-serif;
            font-weight: 300;
            font-size: 22px;
        }
        .material-card h2:before,
        .material-card h2:after {
            content: ' ';
            position: absolute;
            left: 0;
            top: -16px;
            width: 0;
            border: 8px solid;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }
        .material-card h2:after {
            top: auto;
            bottom: 0;
        }
        @media screen and (max-width: 767px) {
            .material-card.mc-active {
                padding-bottom: 0;
                height: auto;
            }
        }
        .material-card.mc-active h2 {
            top: 0;
            padding: 10px 16px 10px 90px;
        }
        .material-card.mc-active h2:before {
            top: 0;
        }
        .material-card.mc-active h2:after {
            bottom: -16px;
        }
        .material-card .mc-content {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 16px;
            left: 16px;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }
        .material-card .mc-btn-action {
            position: absolute;
            right: 16px;
            top: 16px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            border: 5px solid;
            width: 54px;
            height: 54px;
            line-height: 44px;
            text-align: center;
            color: #fff;
            cursor: pointer;
            z-index: 20;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }
        .material-card.mc-active .mc-btn-action {
            top: 65px;
        }
        .material-card .mc-description {
            position: absolute;
            top: 100%;
            right: 30px;
            left: 30px;
            bottom: 54px;
            overflow: hidden;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: all 1.2s;
            -moz-transition: all 1.2s;
            -ms-transition: all 1.2s;
            -o-transition: all 1.2s;
            transition: all 1.2s;
            font-family: 'Raleway', sans-serif;
            font-weight: 500;
            font-size:18;
            color: black;
        }
        .material-card .mc-footer {
            height: 0;
            overflow: hidden;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }
        .material-card .mc-footer h4 {
            position: absolute;
            top: 200px;
            left: 30px;
            padding: 0;
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            -webkit-transition: all 1.4s;
            -moz-transition: all 1.4s;
            -ms-transition: all 1.4s;
            -o-transition: all 1.4s;
            transition: all 1.4s;
        }
        .material-card .mc-footer a {
            display: block;
            float: left;
            position: relative;
            width: 52px;
            height: 52px;
            margin-left: 5px;
            margin-bottom: 15px;
            font-size: 28px;
            color: #fff;
            line-height: 52px;
            text-decoration: none;
            top: 200px;
        }
        .material-card .mc-footer a:nth-child(1) {
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -ms-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
        }
        .material-card .mc-footer a:nth-child(2) {
            -webkit-transition: all 0.6s;
            -moz-transition: all 0.6s;
            -ms-transition: all 0.6s;
            -o-transition: all 0.6s;
            transition: all 0.6s;
        }
        .material-card .mc-footer a:nth-child(3) {
            -webkit-transition: all 0.7s;
            -moz-transition: all 0.7s;
            -ms-transition: all 0.7s;
            -o-transition: all 0.7s;
            transition: all 0.7s;
        }
        .material-card .mc-footer a:nth-child(4) {
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            -ms-transition: all 0.8s;
            -o-transition: all 0.8s;
            transition: all 0.8s;
        }
        .material-card .mc-footer a:nth-child(5) {
            -webkit-transition: all 0.9s;
            -moz-transition: all 0.9s;
            -ms-transition: all 0.9s;
            -o-transition: all 0.9s;
            transition: all 0.9s;
        }
        .material-card .img-container {
            overflow: hidden;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }
        .material-card.mc-active .img-container {
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            left: 0;
            top: 12px;
            width: 60px;
            height: 60px;
            z-index: 20;
        }
        .material-card.mc-active .mc-content {
            padding-top: 5.6em;
        }
        @media screen and (max-width: 767px) {
            .material-card.mc-active .mc-content {
                position: relative;
                margin-right: 16px;
            }
        }
        .material-card.mc-active .mc-description {
            top: 50px;
            padding-top: 5.6em;
            opacity: 1;
            filter: alpha(opacity=100);
        }
        @media screen and (max-width: 767px) {
            .material-card.mc-active .mc-description {
                position: relative;
                top: auto;
                right: auto;
                left: auto;
                padding: 50px 30px 70px 30px;
                bottom: 0;
            }
        }
        .material-card.mc-active .mc-footer {
            overflow: visible;
            position: absolute;
            top: calc(100% - 16px);
            left: 16px;
            right: 0;
            height: 82px;
            padding-top: 15px;
            padding-left: 25px;
        }
        .material-card.mc-active .mc-footer a {
            top: 0;
        }
        .material-card.mc-active .mc-footer h4 {
            top: -32px;
        }
        .material-card.Red h2 {
            background-color: #8D3B00;
        }
        .material-card.Red h2:after {
            border-top-color: #bf7139;
            border-right-color: #bf7139;
            border-bottom-color: transparent;
            border-left-color: transparent;
        }
        .material-card.Red h2:before {
            border-top-color: transparent;
            border-right-color: #522200;
            border-bottom-color: #522200;
            border-left-color: transparent;
        }
        .material-card.Red.mc-active h2:before {
            border-top-color: transparent;
            border-right-color: #bf7139;
            border-bottom-color: #bf7139;
            border-left-color: transparent;
        }
        .material-card.Red.mc-active h2:after {
            border-top-color: #522200;
            border-right-color: #522200;
            border-bottom-color: transparent;
            border-left-color: transparent;
        }
        .material-card.Red .mc-btn-action {
            background-color: #b85e1e;
        }
        .material-card.Red .mc-btn-action:hover {
            background-color: #bf7139;
        }
        .material-card.Red .mc-footer h4 {
            color: #b71c1c;
        }
        .material-card.Red .mc-footer a {
            background-color: #b71c1c;
        }
        .material-card.Red.mc-active .mc-content {
            background-color: #fbd8b0;
        }
        .material-card.Red.mc-active .mc-footer {
            background-color: #ffcdd2;
        }
        .material-card.Red.mc-active .mc-btn-action {
            border-color: #ffebee;
        }

    </style>
</head>
<body">
    <?php include 'navbar.php' ?>
    <br><br><br>
<div class="container">
    <div class="page-header">
        <h1 style="text-align: left;">
            Profile Anak
        </h1>
        <h2 style="text-align: left;">
            Panti Asuhan Rumah Bersinar
        </h2>
        <hr class="mb-5">
    </div>
    <div class="row active-with-click" align="center">
            


            <?php 

            $count=0;
            $output = "";
            $list = "SELECT * FROM `profile`";
            $action = mysqli_query($con2, $list);


             while ($result = mysqli_fetch_assoc($action)){


            $output .= 
            '
            

            <div class="col-md-4 col-sm-6 col-xs-12 center-block">
            <article class="material-card Red" data-aos="zoom-in">
                <h2>
                    <span>'.$result['nama'].'</span>
                    <strong>
                        
                        '.$result['tanggallahir'].'
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive" style="width:100%;" src="'.$result['filePath'].'">
                    </div>
                    <div class="mc-description">
                    Asal = '.$result['asal'].'
                    <br>
                        '.$result['deskripsi'].'
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
              
            </article>
        </div>



           
            ';

        }





    echo $output;
    ?>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- AOS-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
    $(function() {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });
</script>

</body>
</html>