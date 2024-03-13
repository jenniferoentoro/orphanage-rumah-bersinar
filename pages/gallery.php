<?php  


include '../connection.php';






?>





<!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Gallery Admin</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,200,500,600,700' rel='stylesheet' type='text/css'>
    </head>
    <style type="">
        .effect {
    text-shadow: 0px 0px 15px #70a99d, 0px 0px 17px #70a99d;
    /*animation: effect 1s ease-out infinite;*/
}
@import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body{
    background-color: #FFE5DB;
        opacity: 1;
        background-image: radial-gradient(#9d3b2f 0.9px, #FFE5DB 0.9px);
        background-size: 18px 18px;
        font-family: 'Raleway', sans-serif;
}
    </style>
    <body>
        <?php   include 'navbar.php' ?>
        <section id="slider" class="pt-5">
          <div class="container">
            <br><br>
               <div class="page-header">
        <h1 style="text-align: left;font-weight:900;color:#9D3B2F;">
            Gallery Kegiatan
        </h1>
        <h2 style="text-align: left;font-weight:500;color:#9D3B2F;">
            Panti Asuhan Rumah Bersinar
        </h2>
        <hr class="mb-5">
    </div>

            <?php 

            $list1 = "SELECT COUNT(`id`)
            as jumlah FROM `gallery`";
            $action1 = mysqli_fetch_assoc(mysqli_query($con2, $list1));


            $jumlah =  $action1['jumlah'];

            $banyak = floor($jumlah/9)+1;
          

            $output = "";
            $list = "SELECT * FROM `gallery` ORDER BY `tanggal`";
            $action = mysqli_query($con2, $list);


            for ($x = 0; $x < $banyak; $x++) {

              $output .= 
              '
              <div class="slider">
              <div class="owl-carousel">

              ';


              if($x == $banyak-1){

                     while ($result = mysqli_fetch_assoc($action)){


            $output .= 
            '
            <div id="'.$result['id'].'" class="slider-card">
            <div class="d-flex justify-content-center align-items-center mb-4">
            <img src="'.$result['filePath'].'" alt="" >
            </div>
            <h6 class="mb-0 text-center"><b>'.$result['tanggal'].'</b></h6>
            <h5 class="mb-0 text-center"><b>'.$result['judul'].'</b></h5>
            <p style="display:none" class="text-center p-4">'.$result['deskripsi'].'</p>
            <br>
            </div>
            ';

        }

          }else{
             for ($y = 0; $y < 9; $y++) {

                    $result = mysqli_fetch_assoc($action);
                    
                    $output .= 
            '
            <div id="'.$result['id'].'" class="slider-card" >
            <div class="d-flex justify-content-center align-items-center mb-4">
            <img src="'.$result['filePath'].'" alt="" >
            </div>
            <h6 data-bs-toggle="modal" data-bs-target="#exampleModal" class="mb-0 text-center"><b>'.$result['tanggal'].'</b></h6>
            <h5 class="mb-0 text-center"><b>'.$result['judul'].'</b></h5>
            <p  class="text-center p-4">'.$result['deskripsi'].'</p>
            </div>
            ';

              }
          }              

    

        $output .= 
        '
        </div>
        </div>

        ';

    }





    echo $output;
    ?>
</div>
</section>

        <!-- ===== Modal 1 ===== -->
        <div style="z-index: 100000000;" class="modal fade" data-bs-backdrop="static" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content"
                    style="border-radius: 20px; border: none;background-color:#8D3B00;color:white;
">
                    <div class="modal-body">
                        <button style="float: right;" type="button" class="btn-close btn-close-white"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="container">
                            <div class="row">
                                <div style="" class="col-12" align="center">
                                    
                                    <h4 class="effect" style="text-align: center; color: white;" id="tglM">
                                    </h4>
                                    <h3 class="effect" style="text-align: center; color: white;" id="judulM">
                                    </h3>
                                    <img src="" id="photoM" width="50%">
                                     <h5 class="effect" style="text-align: center; color: white;" id="deskripsiM">
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript">
      $(".slider-card").click(function(){
        $('#tglM').text($(this).children('h6').text());
        $('#judulM').text($(this).children('h5').text());
        $('#deskripsiM').text($(this).children('p').text()); 
       
$('#photoM').attr('src',$(this).children().children('img').attr('src'))

        $('#exampleModal2').modal('show');
      });
</script>
</body>
</html>
