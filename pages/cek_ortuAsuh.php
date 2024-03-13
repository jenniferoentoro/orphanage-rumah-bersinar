<?php

include '../connection.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM user_data WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];
    if ($role == 1) {

    } else {
        echo "<script>alert('User bukan admin!')</script>";
        header("Location: http://localhost/tekweb_unite/Home.php");
    }
}
if (!isset($_SESSION['email'])) {
    //redirect to login
    header('location: ./login.php');
}


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
</link>
<link rel="stylesheet" type="text/css"
href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
</link>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="sweetalert2.min.js"></script>
<title>Admin</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    
    body{
        background-color: #FFE5DB;
        opacity: 1;
        background-image: radial-gradient(#9d3b2f 0.9px, #FFE5DB 0.9px);
        background-size: 18px 18px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    div.title {
        margin-top: 3%;
        margin-bottom: 2%;
    }

    ::selection {
        color: #fff;
        background: #664AFF;
    }

    .wrapper {
        max-width: 450px;
        margin: 150px auto;
    }

    .wrapper .search-input {
        background: #fff;
        width: 100%;
        border-radius: 5px;
        position: relative;
        box-shadow: 0px 1px 5px 3px rgba(0, 0, 0, 0.12);
    }

    .search-input input {
        height: 55px;
        width: 100%;
        outline: none;
        border: none;
        border-radius: 5px;
        padding: 0 60px 0 20px;
        font-size: 18px;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
    }

    .search-input.active input {
        border-radius: 5px 5px 0 0;
    }

    .search-input .autocom-box {
        padding: 0;
        opacity: 0;
        pointer-events: none;
        max-height: 280px;
        overflow-y: auto;
    }

    .search-input.active .autocom-box {
        padding: 10px 8px;
        opacity: 1;
        pointer-events: auto;
    }

    .autocom-box li {
        list-style: none;
        padding: 8px 12px;
        display: none;
        width: 100%;
        cursor: default;
        border-radius: 3px;
    }

    .search-input.active .autocom-box li {
        display: block;
    }

    .autocom-box li:hover {
        background: #efefef;
    }

    /* .search-input .icon {
        position: absolute;
        right: 520px;
        top: 20px;
        height: 55px;
        width: 55px;
        text-align: center;
        line-height: 55px;
        font-size: 20px;
        color: #644bff;
        cursor: pointer;
    } */

    /* CSS */
    .button-27 {
      appearance: none;
      background-color: #000000;
      border: 2px solid #1A1A1A;
      border-radius: 15px;
      box-sizing: border-box;
      color: #FFFFFF;
      cursor: pointer;
      display: inline-block;
      font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
      font-size: 16px;
      font-weight: 600;
      line-height: normal;
      margin: 0;
      min-height: 60px;
      min-width: 0;
      outline: none;
      padding: 16px 24px;
      text-align: center;
      text-decoration: none;
      transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      width: 100%;
      will-change: transform;
  }

  .button-27:disabled {
      pointer-events: none;
  }

  .button-27:hover {
      box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
      transform: translateY(-2px);
  }

  .button-27:active {
      box-shadow: none;
      transform: translateY(0);
  }

  .backgroundmodal{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modalsk{

    background: rgba( 255, 255, 255, 0.2 );
    backdrop-filter: blur( 1.5px );
    -webkit-backdrop-filter: blur( 1.5px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
    padding: 20px; 


    /* animation: fall 2s ease forwards;*/
    /*    display: block;*/
    font-family: SpaceGrotesk-medium;
}


</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#630000; color:white">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color:white">Panti Asuhan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active"  aria-current="page" href="#" style="color:white"><i class="fa-solid fa-house-user" style="color:white"></i>Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="adminGallery.php" style="color:white"><i class="fa-rectangle-history-circle-user" style="color:white"></i>Gallery</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="adminProfile.php" style="color:white"><i class="fa-solid fa-people-pants-simple" style="color:white"></i>Profile Anak</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="cek_donasi.php" style="color:white"><i class="fa-solid fa-money-bill-wave" style="color:white"></i>Donasi</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="cek_donasi_barang.php" style="color:white"><i class="fa-solid fa-money-bill-wave" style="color:white"></i>Donasi Barang</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="cek_ortuAsuh.php" style="color:white">Orang tua asuh</a>
          </li>
          <li class="lii">
                <a class="nav-link" style="color:white  !important  ;" aria-current="page" href="../api/logout.php"><i class="fa-solid fa-right-to-bracket"></i> Logout</a>
              </li>



      </ul>

  </div>
</div>
</nav>

<div class="container">
    <div class="title" align="center">
        <h2>Orang Tua Asuh</h2>
    </div>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2">
         

        </div>
    </div>

    <div class="row p-3">
        <div class="col-12 table-responsive">
            <table class="table" align="center" id="table-data">
                <thead>
                    <tr align="center">
                        <th scope="col">No.</th>
                        <th scope="col">Nama Donatur</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Jumlah Donasi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Bukti Tf</th>
                        <th scope="col">Nama Anak Asuh</th>

                    </tr>
                </thead>
                <tbody id="tbody-data" align="center">
                    <?php
                    $output = "";
                    $list = "SELECT nama_donatur, nomor_telepon, jumlah_donasi, bukti_trf, date, profile.nama AS anak FROM `data_ortuAsuh` JOIN profile ON profile.id = data_ortuAsuh.idAnak";
                    $action = mysqli_query($con2, $list);
                    $i = 1;
                    while ($result = mysqli_fetch_assoc($action)){
                        $output .= 
                        '
                        <tr>
                        <td class="text-center">'.$i.'</td>
                        <td class="text-center">'.$result['nama_donatur'].'</td>
                        <td class="text-center">'.$result['nomor_telepon'].'</td>
                        <td class="text-center">'.$result['jumlah_donasi'].'</td>
                        <td class="text-center">'.$result['date'].'</td>
                        
                        

                        <td class="text-center">
    <a target="_blank" href="assets/bukti_transfer_ortuAsuh/'.$result['bukti_trf'].'">
    <img height="100px" weight="auto" alt="'.$result['date'].'" src="assets/bukti_transfer_ortuAsuh/'.$result['bukti_trf'].'"></a><br>
    <a download="'.$result['date'].'-'.$result['judul'].'" href="assets/bukti_transfer_ortuAsuh/'.$result['bukti_trf'].'" title="'.$result['date'].'">Download</a></td>
    
     

                       
                        <td class="text-center">'.$result['anak'].'</td>
                        </tr> 
                        ';
                        $i++;    
                    }

                    echo $output;?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Submit -->
<div class="modal fade backgroundmodal" id="modalSubmit" tabindex="-1" aria-labelledby="modalSubmitLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content modalsk">

      <div style="color:white;" class="modal-body">
         <button style="float:right;" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
         <br>

         <form id="formAksi" class="forminput" enctype="multipart/form-data">
            <div style="" align="center">

              <h3 style="color: white; overflow: hidden;" for="picUMKM">Submit data : </h3> <br>
              <input  class="center-block form-control" type="date" id="tanggal" name="tanggal" style="color: black;" placeholder="tanggal"> <br> 
              <input class="center-block form-control" type="text" id="judul" name="judul"  style="color: black;" placeholder="Judul"> <br> 
              <input class="center-block form-control" type="text" id="deskripsi" name="deskripsi"  style="color: black;" placeholder="Deskripsi"> <br> 
              

            <input style="background-color: #ffffff3d !important;" class="center-block form-control" type="file" id="picUMKM" name="picUMKM[]" multiple style="color: black;" accept="image/*"><br>

            <button  type="button" id="submission" class="submission center-block buttonsubmit buttonpink" style="">
                Submit
            </button>
        </div>

    </form>
</div>

</div>
</div>
</div>

<!-- Modal Edit -->
<div class="modal fade backgroundmodal" id="modalEdit" tabindex="-1" aria-labelledby="modalSubmitLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content modalsk">

      <div style="color:white;" class="modal-body">
         <button style="float:right;" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
         <br>

         <form id="formAksi" class="forminput" enctype="multipart/form-data">
            <div style="" align="center">

              <h3 style="color: white; overflow: hidden;" for="picUMKM">Edit data : </h3> <br>
              <input  class="center-block form-control" type="date" id="tanggalE" name="tanggal" style="color: black;" placeholder="tanggal"> <br> 
              <input class="center-block form-control" type="text" id="judulE" name="judul"  style="color: black;" placeholder="Judul"> <br> 
              <input class="center-block form-control" type="text" id="deskripsiE" name="deskripsi"  style="color: black;" placeholder="Deskripsi"> <br> 
              

           

            <button  type="button" id="edit" class="submission center-block buttonsubmit buttonpink" style="">
                Submit
            </button>
        </div>

    </form>
</div>

</div>
</div>
</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>

    var id = 0;
 
        $(document).on("click", ".btn-warning", function() {
        id = $(this).parent().parent().attr('id');

       
       var ta = $(this).closest("tr").find("td").eq(1).text();
      $('#tanggalE').val(ta);
      $('#judulE').val($(this).closest("tr").find("td").eq(2).text());
      $('#deskripsiE').val($(this).closest("tr").find("td").eq(3).text());

     

    });

                $(document).on("click", ".btn-danger", function() {
       id = $(this).parent().parent().attr('id');

      Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

       $.ajax({
                url: "../api/deleteGallery.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    if(data == "success"){
                        Swal.fire({
                  icon: 'success',
                  title: 'Success.',
                  text: 'Thank You!'
              })

                 window.location.reload();
             }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Silahkan delete ulang!'
              });

             }
                }
            });


  }
})
     

    });


              $(document).on("click", "#edit", function() {
        var tanggalE = $("#tanggalE").val();
      var deskripsiE = $("#deskripsiE").val();
      var judulE = $("#judulE").val();
       $.ajax({
                url: "../api/editGallery.php",
                type: "POST",
                data: {
                    id: id, judulE:judulE, deskripsiE:deskripsiE,tanggalE:tanggalE
                },
                success: function(data) {
                    if(data == "success"){
                        Swal.fire({
                  icon: 'success',
                  title: 'Success.',
                  text: 'Thank You!'
              })

                 window.location.reload();
             }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Silahkan edit ulang!'
              });

             }
                }
            });

    });  


/*    $('#table-data').DataTable({
        "ordering": false,
        "columnDefs": [{
            "searchable": true,
        }],
    });*/

    $(document).ready(function() {

         $('#table-data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );


        $("#logout").click(function() {
            $.ajax({
                url: "../api/logout.php",
                type: "POST",
                data: {
                    logout: 1
                },
                success: function(data) {
                    window.location.href = "login.php";
                }
            });
        });
    });


    $("#submission").click(function(){
       
      $("#submission").attr("disabled", true);
      var picUMKM = $('#picUMKM')[0].files;
      var tanggal = $("#tanggal").val();
      var deskripsi = $("#deskripsi").val();
      var judul = $("#judul").val();
      let fd = new FormData($('#formAksi')[0]);
      

      const isFileValid = picUMKM.length < 3;
      if(tanggal =="" || deskripsi == "" || judul == ""){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Silahkan lengkapi data terlebih dahulu!!'
      });
        $("#submission").attr("disabled", false);
    }else{



        if(isFileValid){
           
          $.ajax({
            url: "ajax.php",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success: function(action) {
              if (action == "gagal1") {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Silahkan upload ulang foto!'
              });
                $("#submission").attr("disabled", false);
            }else if (action == "gagal2") {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Gagal!'
              });
                $("#submission").attr("disabled", false);
            } else if (action == "gagal3") {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Maaf, hanya dapat submit jpeg,jpg dan png!'
              });
                $("#submission").attr("disabled", false);
            } else if (action == "gagal1") {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Size file anda terlalu besar!'
              });
                $("#submission").attr("disabled", false);
            }
            else if (action == "success") {
                Swal.fire({
                  icon: 'success',
                  title: 'Success.',
                  text: 'Thank You!'
              })

                 window.location.reload();
            }

        }
    });
      } else {
      }
  }

});
</script>

</html>