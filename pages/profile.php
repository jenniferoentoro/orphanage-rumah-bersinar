<?php  


include '../connection.php';






?>





<!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <section id="slider" class="pt-5">
          <div class="container">
            <h1 class="text-center"><b>Profile</b></h1>
            <div  style="justify-content: center;" id="tampilan" align="center" >
            


            <?php 

            $count=0;
            $output = "";
            $list = "SELECT * FROM `profile`";
            $action = mysqli_query($con2, $list);


             while ($result = mysqli_fetch_assoc($action)){


            $output .= 
            '
            <div id="'.$result['id'].'" class="card col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-5 col-8" style="margin-bottom:20px; margin-top:20px;justify-content: center; ">  <img src="'.$result['filePath'].'" class="card-img-top" alt="...">
  <div class="card-body">
  <h3 class="card-text text-center">'.$result['nama'].'</h3>
  <h4 class="card-text text-center">'.$result['tanggallahir'].'</h4>
    <h5 class="card-text text-center">'.$result['asal'].'</h5>
    <p class="card-text text-center">'.$result['deskripsi'].'</p>

  </div></div>



           
            ';

        }





    echo $output;
    ?>
    </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
