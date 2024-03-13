<?php

    require_once "includes/connect_pdo.php";
    require_once "includes/secure_check.php";

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Barang</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
       <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            background-color: #FFE5DB;
            opacity: 1;
            background-image: radial-gradient(#9d3b2f 0.9px, #FFE5DB 0.9px);
            background-size: 18px 18px;
            color: #37474F;
            font-family: 'Raleway', sans-serif;
        }

        h1.title {
            font-weight: 900;
            color: #9D3B2F;
            text-decoration-line: underline;
            text-decoration-style: dashed;
            text-decoration-color: #9D3B2F;
            text-underline-offset: 2px;
        }

        .form-upload {
            width: 60%;
            margin: auto;
            transform: translateY(75px);        
        }

        input::placeholder, select::placeholder {
            color: #9D3B2F;
        }

        input:focus-visible, select:focus-visible, textarea:focus-visible {
            outline:none;
        }

        .input-form {
            width: 100%;
            border: 2px solid #9D3B2F;
            background: #FFE5DB;;
            padding-left: 12px;
            color: #9D3B2F;
            font-size: 17px;
            height: 50px;
        }

        .input-textarea {
            width: 100%;
            border: 2px solid #9D3B2F;
            background: #FFE5DB;
            padding-left: 12px;
            color: #9D3B2F;
            font-size: 17px;
        }

        select {
            width: 100%;
            background-color: #FFE5DB;;
            border: 2px solid #9D3B2F;
            padding-left: 7px;
            padding-bottom: 5px;
            padding-top: 5px;
            height: 50px;
            color: #9D3B2F;
        }

        ::file-selector-button {
            background-color: #9D3B2F;
            color: white;
            border-radius: 5px;
            border: solid 1px #9D3B2F;
        }

        input.file_upload {
            /* background-color: #9D3B2F; */
            /* border: solid 2px #9D3B2F; */
            width: 100%;
            padding-bottom: 5px;
            padding-top: 5px;
            height: 50px;

        }

        .bukti_kirim {
            background-color: #FFF4EF;
            border: 2px solid #9D3B2F;
        }

        label.form-label {
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            color:#9D3B2F;
        }

        .confirm{
            width: 75%;
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

        .confirm:hover {
            background-color: #d8887e;
            transition-duration: 0.5s;
            transition-timing-function: ease;
        }

        .QR {
            width: 100%;
        }

        .modal-warning {
            border: none;
            background-color: #fdbf1f;
        }

        .modal-warning-body {
            background-color: #8D3B00;
            color: white;
            padding: 4em;
            border-radius: 45px;
        }

        .modal-body-content {
            text-align: center;
        }

        .modal-writing{
            border-top : 1.5px white dashed;    
            padding-top: 25px;
        }

        .modal-text {
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
        }

        .close-wrapper{
            border-top : 1.5px white dashed;
            padding-top: 25px;
        }

        .close-button-modal {
            width: 30%;
            height: 37px;
            font-size: 18px;
            background: #af886e;
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

        .close-button-modal:hover {
            background-color: #e9bea2;
            transition-duration: 0.5s;
            transition-timing-function: ease;
        } 

        @media screen and (max-width: 825px) {
            .form-upload {
                width: 100%;        
            }
        }
    </style>

</head>
<body>
    <?php include "navbar.php";?>
    <div class="container">
        
        <div class="row form-upload">
            <div class="col-12 text-center" align="center">
                <h1 class="title" data-aos="zoom-in-down">Donasi Barang</h1>
            </div>
            <div class="col-12 mt-3">
                <label for="a" class="form-label" data-aos="zoom-in">Nama Donatur :</label>
                <input type="text" class="input-form" data-aos="fade-left" id="a">
            </div>

            <div class="col-12 mt-3">
                <label for="k" class="form-label" data-aos="zoom-in">Nomor Telepon :</label>
                <input type="text" class="input-form" data-aos="fade-left" id="k">
            </div>

            <div class="col-12 mt-3">
                <label for="r" class="form-label" data-aos="zoom-in">Panti Asuhan :</label>
                <br>
                <select name="r" id="r" data-aos="fade-left">
                    <option hidden>Pilih Panti Asuhan</option>
                    <option value="1">Panti Asuhan Rumah Bersinar </option>
                    <option value="2">Panti Asuhan Saluran Berkat</option>
                </select>
            </div>

            <div class="col-12 mt-3">
                <label for="e" class="form-label" data-aos="zoom-in">Keterangan <i class="fas fa-info-circle" id="info" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan informasi mengenai barang yang ingin dikirim"></i> :</label> 
                <textarea class="input-textarea" rows="4" data-aos="fade-left" id="e"></textarea>
            </div>
            
            
                 <div class="col-8 mt-3">
                <label for="" class="form-label" data-aos="zoom-in">Alamat</label> 
                <p id="pRM2" class="input-form" >
          Jl. Nginden VI B No. 19, RT 008, RW 4, Kelurahan Nginden Jangkungan, Kecamatan Sukolilo, Surabaya 60118
        </p>
        
            </div>
            <div class="col-4 mt-3">
                
                
        <button onclick="copyClipboard('pRM2')" class="confirm" style="margin-top:30px">Copy Alamat</button>
            </div>

            <div class="col-12 mt-3 bukti_kirim">
                <label  for="b" class="form-label mt-3" data-aos="zoom-in">Resi Pengiriman :</label> 
                <br>
                <input class="file_upload" type="file" id="b" name="b" accept="image/*" data-aos="fade-left">
            </div>

            <div class="col-12 text-center mt-3 mb-5" >
                <button type="button" id="confirm" class="confirm" data-aos="zoom-in">
                    Submit
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Warning -->
    <div class='modal fade modal-popup' id='staticBackdrop' data-bs-backdrop='static'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content modal-warning'>
                <div class='modal-body modal-warning-body'>
                    <div class='row modal-body-content' id="modal-content-warning">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- AOS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
        
            function copyClipboard(element) {
      element = document.getElementById(element); 
  var range, selection, worked;

  if (document.body.createTextRange) {
    range = document.body.createTextRange();
    range.moveToElementText(element);
    range.select();
  } else if (window.getSelection) {
    selection = window.getSelection();        
    range = document.createRange();
    range.selectNodeContents(element);
    selection.removeAllRanges();
    selection.addRange(range);
  }
  
  try {
    document.execCommand('copy');
    swal.fire({
                        title: "Success",
                        text: "Text copied",
                        icon: "success",
                        confirmButtonText: "OK"
                    });
  }
  catch (err) {
    swal.fire({
                        title: "Error",
                        text: "unable to copy text",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
  }
}

        $( document ).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({ trigger:'hover focus' });
            $("#confirm").attr("disabled", false);

            $("#confirm").click(function(){
                $("#confirm").text('Please Wait');
                var b = $("#a").val();
                var e = $("#k").val();
                var r = $("#r").val();
                var k = $("#e").val();
                var a = $('#b').prop("files")[0];
                
                let fd = new FormData();
                fd.append("b", a);
                fd.append("e", k);
                fd.append("r", r);
                fd.append("k", e);
                fd.append("a", b);


                $.ajax({
                    url: "request/ajax_donasi_barang.php",
                    type: "POST",
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(action) {
                        $("#modal-content-warning").append(action);
                        $("#staticBackdrop").modal("show");
                        $("#refresh").click(function() {
                            window.location.reload()
                        })
                    }
                });

            });
            
        });

    </script>