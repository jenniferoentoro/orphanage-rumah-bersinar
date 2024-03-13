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
    <title>Admin</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

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

    
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Panti Asuhan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-house-user"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adminGallery.php"><i class="fa-rectangle-history-circle-user"></i>Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-people-pants-simple"></i>Profile Anak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-money-bill-wave"></i>Donasi</a>
        </li>


        
      </ul>
     
    </div>
  </div>
</nav>

    <div class="container">
        <div class="title" align="center">
            <h2>Admin Site</h2>
        </div>
      <!--   <div class="row">
            <div class="col-12">
                
            </div>
        </div> -->

        <div class="row p-3">
            <div class="col-12 table-responsive">
                <table class="table" align="center" id="table-data">
                    <thead>
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Post Amount</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-data" align="center">
                        <?php
                                $output = "";
                                $list = "SELECT COUNT(post.id_user) as amount , email, udata.role as user_role FROM `text_post` post RIGHT JOIN `user_data` udata ON post.id_user = udata.id GROUP BY id_user";
                                $action = mysqli_query($con, $list);
                                $i = 1;
                                while ($result = mysqli_fetch_assoc($action)){
                                        $output .= 
                                        '
                                            <tr>
                                                <td class="text-center">'.$i.'</td>
                                                <td><a id="finduser" style="cursor:pointer;text-decoration: underline;" target="_blank" >'.$result['email'].'</a></td>
                                                <td>'.$result['amount'].'</td>
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
$(document).on("click", "#finduser", function() {
    var email = $(this).closest("tr").find("td").eq(1).text();
    $.ajax({
        url: "../api/findprofile.php",
        type: "POST",
        cache: false,
        data: {
            email: email
        },
        success: function(dataResult) {

        },
    });
    window.open('profile.php', '_blank');
});


$('#table-data').DataTable({
    "ordering": false,
    "columnDefs": [{
        "searchable": true,
    }],
});

$(document).ready(function() {
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
</script>

</html>