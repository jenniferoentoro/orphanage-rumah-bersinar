
<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

      <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
      <!-- Bootstrap CSS -->
      <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet">
</head>
  <style>
  .navv{
   /* position: fixed!important;*/
    display: flex;
    height: 70px;
    width: 100%;
    background-color:  #630000; backdrop-filter: 200px;
    align-items: center;
    /*  justify-content: space-between;*/
    padding: 0px 10px 0 15px;
    flex-wrap: wrap;
    position: relative;
    z-index : 3000;
    font-family: 'Raleway', sans-serif;

  }
  .navv .logos{
    color: #fff;
    font-size: 25px;
    font-weight: 600;
  }
  .navv .ull{
    display: flex;
    flex-wrap: wrap;
    list-style: none;
  }
  .ull{
    padding-top: 10px;
    margin-left: auto;
  }
  .navv .ull .lii{
    margin: 0 5px;
  }
  .navv .ull .lii .aa{
    color: #f2f2f2;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
    padding: 5px 8px;
    border-radius: 5px;
    letter-spacing: 1px;
    transition: all 0.3s ease;
  }
  .navv .ull .lii .aa.active,
  .navv .ull .lii .aa:hover{
    color: #111;
    background: #fff;
  }
  .navv .menu-btn .ii{
    color: #fff;
    font-size: 22px;
    cursor: pointer;
    display: none;
  }
/*input[type="checkbox"]{
  display: none;
  }*/
  @media (max-width: 1150px){
    .ull{
      padding-top: 0px;
    }
  }
  @media (max-width: 1150px) {
    .menu-btn{
     margin-left: auto;
   }
   .ull{
    padding-top: 0px;
  }
  .navv .menu-btn .ii{
    display: block;
  }
  #clicks:checked ~ .menu-btn .ii:before{
    content: "\f00d";
    margin-left: auto;
  }
  .navv .ull{
    position: fixed;
    top: 70px;
    left: -100%;
    background: #111;
    height: 100vh;
    width: 100%;
    text-align: center;
    display: block;
    transition: all 0.3s ease;
  }
  #clicks:checked ~ .ull{
    left: 0;
  }
  .navv .ull .lii{
    width: 100%;
    margin: 40px 0;
  }
  .navv .ull .lii .aa{
    width: 100%;
    margin-left: -100%;
    display: block;
    font-size: 20px;
    transition: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }
  #clicks:checked ~ .ull .lii .aa{
    margin-left: 0px;
  }
  .navv .ull .lii .aa.active,
  .navv .ull .lii .aa:hover{
    background: none;
    color: cyan;
  }
  @media (max-width: 250px) {
    .nav .logos{
     font-size: 22px !important;
   }
 }


}


</style>
<body>
  <nav class="navv">
   <div class="logos">
    <a style="text-decoration: none; color:white;" href=""><img class="bx-tada-hover" style="width: auto; height: 35px; margin: 0; padding: 0; cursor: pointer;" src="logo/rb.jpg">
    </a>
    <a href="https://wgg.petra.ac.id/main/portal/news/news.php" style="cursor: pointer; text-decoration: none; color: white;" class="logonav-name">Rumah Bersinar</a>
  </div>
  <input type="checkbox" id="clicks" style="display: none;">
  <label for="clicks" class="menu-btn">
   <i class="fas fa-bars ii"></i>
 </label>
 <ul class="ull">
  <li class="lii">
          <a class="nav-link" style="color:white  !important  ;" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
        </li>
          <!-- <li class="lii">
          <a class="nav-link" style="color:white  !important  ;" aria-current="page" href="donasi.php"><i class="fa-solid fa-money-bill"></i> Donasi</a>
        </li> -->
        <li class="lii">
          <a class="nav-link dropdown-toggle" style="color:white !important;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-hand-holding-heart"></i> Donasi
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="donasi_barang.php"><i class="fas fa-box"></i> Barang</a></li>
            <li><a class="dropdown-item" href="donasi.php"><i class="fa-solid fa-money-bill"></i> Uang</a></li>
          </ul>
        </li>
        
         <li class="lii">
          <a class="nav-link" style="color:#fff !important;" href="ortuAsuh.php" aria-current="page">
           <i class="fa-solid fa-person-circle-plus"></i>  Orang Tua Asuh
          </a>
        </li>
        
         <li class="lii">
          <a class="nav-link" style="color:#fff !important;" href="tes.php" aria-current="page">
           <i class="fa-solid fa-users"></i>  Profile Anak
          </a>
        </li>
         <li class="lii">
          <a class="nav-link" style="color:#fff !important;" href="gallery.php" aria-current="page">
            <i class="fa-solid fa-photo-film"></i> Gallery
          </a>
        </li>
        
       
      <!--  <li class="lii">
          <a class="nav-link dropdown-toggle" style="color:#fff !important;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <i class="fa-solid fa-users"></i>  Profile Anak
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tes.php">Rumah Bersinar</a></li>
            <li><a class="dropdown-item" href="#">Saluran Berkat</a></li>
          </ul>
        </li>
        <li class="lii">
          <a class="nav-link dropdown-toggle" style="color:#fff !important;" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-photo-film"></i> Gallery
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <li><a class="dropdown-item" href="gallery.php">Rumah Bersinar</a></li>
            <li><a class="dropdown-item" href="#">Saluran Berkat</a></li>
          </ul>
        </li>-->
         <li class="lii">
          <a class="nav-link" style="color:white  !important  ;" aria-current="page" href="about.php"><i class="fa-solid fa-address-card"></i> About</a>
        </li>

        <?php 
          if (isset($_SESSION['email'])) {
          //redirect to home.php

          echo '
          <li class="lii">
                <a class="nav-link" style="color:white  !important  ;" aria-current="page" href="../api/logout.php"><i class="fa-solid fa-right-to-bracket"></i> Logout</a>
              </li>
          ';
          }else{
              echo '
              <li class="lii">
                    <a class="nav-link" style="color:white  !important  ;" aria-current="page" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                  </li>
              ';
          }
        ?>
        
</ul>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">

/*  const currentLoc = location.href;
  const menuItem = document.querySelectorAll('a');
  const menuLength = menuItem.length;
  for(let i = 0; i<menuLength;i++){
    if(menuItem[i].href === currentLoc){
      menuItem[i].className = 'aa active';
    }
  }*/
</script>

</body>
</html>