<?php

    require_once "includes/connect_pdo.php";
    require_once "includes/secure_check.php";

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Donasi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        .table_wrapper {
            overflow-x: auto;
            background-color: white;
            border-radius: 20px;
            padding: 5%;
        }

        table.dataTable thead th, table.dataTable thead td {
            text-align: center;
        }
        body{
            background-color: #FFE5DB;
            opacity: 1;
            background-image: radial-gradient(#9d3b2f 0.9px, #FFE5DB 0.9px);
            background-size: 18px 18px;
            font-family: 'Poppins', sans-serif;
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

    <div class="container text-center mb-5">
        <h1 class="mt-5"> Admin Cek Donasi Barang </h1>
        <div class="table_wrapper mt-5">
            <table class="text-center" id="table_donasi">
                <thead>    
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Donatur</th>
                        <th>No. Telpon</th>
                        <th>Lokasi Donasi</th>
                        <th>Keterangan</th>
                        <th>Bukti Kirim</th>
                        <th>Hapus</th>
                    </tr>
                </thead>    
                <tbody>
                    <?php
                        $info = "";

                        $find_data = $pdo->prepare("SELECT `id`, `nama_donatur`, `nomor_telepon`, `lokasi_donasi`, `keterangan`, `bukti_kirim`, `date` FROM `data_barang` ORDER BY id ASC");
                        $find_data ->execute([]);

                        $i = 1;

                        while ( $data = $find_data->fetch()){
                            $info .= 
                            '
                                <tr>
                                    <td class="text-center">'.$i.'</td>
                                    <td>'.$data['date'].'</td>
                                    <td>'.$data['nama_donatur'].'</td>
                                    <td>'.$data['nomor_telepon'].'</td>
                                    <td>'.$data['lokasi_donasi'].'</td>
                                    <td>'.$data['keterangan'].'</td>
                                    <td><button type="button" class="check-details btn btn-primary" id="check-details-'.$i.'" data-donasi="'.encrypt($data['id']).'"  value="'.$i.'">View</button</td>
                                    <td><button type="button" class="remove btn btn-danger" id="remove-'.$i.'" data-donasi="'.encrypt($data['id']).'" value="'.$i.'">Delete</button</td>
                                </tr>
                            ';

                            $i++;
                        }

                        echo $info;
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mymodalstyle">
              <h5 class="modal-title"></h5>
              <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mymodalstyle" id="modal-content">
            </div>
        </div>
    </div>
</div>

</html>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Data Table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>        


    <script>

        function loadProof(a) {
            $.ajax({
                url: "request/ajax_proof_barang.php",
                type: "POST",
                data: {
                    donation_id:a
                },
                success: function(result) {
                    $("#modal-content").html(result)
                }
            })
        }

        function remove(a) {
            $.ajax({
                url: "request/ajax_remove_barang.php",
                type: "POST",
                data: {
                    donation_id:a
                },
                success: function(result) {
                    
                }
            })
        }


        $(document).ready( function () {
            $('#table_donasi').DataTable( {
                "ordering": false
            } );

            let global_number = -1;
            let global_donation = -1;

            $(".remove").click(function(){
                const btn = $(this);
                global_number = $(this).val();
                global_donation = $(this).data('donasi');

                Swal.fire({
                  title: 'Apakah anda yakin mau menghapus?',
                  icon: 'error',
                  showCancelButton: true,
                  confirmButtonText: 'Ya',
                  cancelButtonText: 'Tidak'
                }).then((result) => {
                  if (result.isConfirmed) {
                    remove(global_donation);
                    $("#remove-" + global_number ).closest("tr").find("td").eq(7).html("Removed");
                    $("#check-details-" + global_number).attr("disabled", true);
                  } else if (result.isDismissed) (
                    result.dismiss === Swal.DismissReason.cancel
                  ) 
                })
            });
        });

        $(document).on("click", ".check-details", function(){
            const btn = $(this);
            global_number = $(this).val();
            global_donation = $(this).data('donasi');

            loadProof(global_donation);
            $("#exampleModal").modal("show");
        });
        
    </script>