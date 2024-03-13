<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            background-image: url('assets/home/pic-2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            overflow-x: hidden;
            backdrop-filter: grayscale(0.5) blur(4px); 
        }

        .container {
            margin: auto;
        }

        .home {
            margin: auto;
            padding: 5%;
            transform: translateY(8%);
        }

        .home-text-wrapper {
            vertical-align: bottom;
            display: flex;
            flex-direction: column-reverse;
            
        }

        .home-text-first {
            font-family: 'Raleway', sans-serif;
            font-weight: 900;
            color: white;
            font-size: 4em;
        }

        .sub-home-text {
            font-family: 'Raleway', sans-serif;
            font-weight: 400;
            color: #9d3b2f;
            width: 100%;
        }

        .img-home {
            width: 100%;
        }

        .link{
            background-color: #9d3b2f;
            text-decoration: none;
            color: #FFE5DB;
            padding: 1.5% 10%;
            border-radius: 20px;
            transition-duration: 0.5s;
            transition-timing-function: ease;
            width: 100%;
        }

        .link:hover{
            background-color: #9b4c4c;
            color: #FFE5DB;
            font-size: 1.5em;
            transition-duration: 0.5s;
            transition-timing-function: ease;
        }

        @media screen and (max-width: 768px) {
            .home-text-first {
                font-size: 2em;
            }

            .link{
                padding: 2.5% 10%;
            }
        }

        @media screen and (max-width:401px) {
            .home-text-first {
                font-size: 2em;
            }

            .link{
                padding: 3.5% 10%;
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row home">
            <div class="col-12">
                <h1 class="text-center home-text-first">Panti Asuhan <br> Rumah Bersinar</h1>
            </div>

            <div class="col-12 mt-3">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 sub-home-text mt-3 mb-4">
                        <a class="link" href="donasi.php" > <i class="fas fa-hand-holding-heart"></i> Donasi</a>
                    </div>

                    <div class="col-md-12 col-sm-12 sub-home-text mt-3 mb-4">
                        <a class="link" href="gallery.php"> <i class="fa-solid fa-photo-film"></i> Galeri</a>
                    </div>

                    <div class="col-md-12 col-sm-12 sub-home-text mt-3 mb-4">
                        <a class="link" href="tes.php"> <i class="fa-solid fa-users"></i> Profil Anak</a>
                    </div>

                    <div class="col-md-12 col-sm-12 sub-home-text mt-3 mb-4">
                        <a class="link" href="about.php"> <i class="fa-solid fa-address-card"></i> Tentang Kami</a>
                    </div>

                </div>                
            </div>
        </div>
    </div>

</body>
</html>