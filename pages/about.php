<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@500;800&display=swap');

        body {
            background-color: #FFE5DB;
            opacity: 1;
            background-image: radial-gradient(#9d3b2f 0.9px, #FFE5DB 0.9px);
            background-size: 18px 18px;
            overflow-x: hidden;
        }

        .image{
            width: 100%;
        }

        .visi {
            width: 100%;
            margin: auto;
            padding: 4%;
            border: solid 2px #9D3B2F;
            background-color: #ffe5db;
            box-shadow: 13px 12px 5px 2px rgba(157,59,47,0.44);
            -webkit-box-shadow: 13px 12px 5px 2px rgba(157,59,47,0.44);
            -moz-box-shadow: 13px 12px 5px 2px rgba(157,59,47,0.44);
            margin-top: 137px;
            font-size: xx-large;

        }

        .visi-text{
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
            color: #9D3B2F;
            font-style: italic;
        }

        .visi-title {
            font-family: 'Raleway', sans-serif;
            font-weight: 400;
            color: #9D3B2F;
            font-size: x-large;
        }

        .history {
            width: 100%;
            margin: auto;
        }

        .history-title {
            text-align: left;
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
        }

        .history .history-1 {
            /* background-color: #9D3B2F; */
            padding: 4%;
            color: #FFE5DB;
            /* height: 100vh; */
            margin: auto;
        }

        .history .history-2{
            background-color: 9d3b2f;
            padding: 4%;
            color: #FFE5DB;
            margin: auto;
            /* border-bottom: solid 2px #9D3B2F;
            border-top: solid 2px #9D3B2F; */
            margin-left: -93px;
        }

        .history-text {
            font-family: 'Raleway', sans-serif;
            font-weight: 400;
            text-align: left;
        }

        .misi {
            margin-top: 145px;
        }

        .misi .misi-1 {
            margin: auto;
            padding: 4%;
            text-align: center;
        }

        .misi .misi-2 {
            padding: 4%;
            border-left: solid 2px #9D3B2F;
            margin: auto;
            
        }

        .misi-image {
            width: 100%;
            border-top-left-radius: 180px;
            border-top-right-radius: 180px;
        }

        .number {
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
            /* color: #9D3B2F; */
            /* border: solid 1px #9D3B2F;
            width: fit-content;
            padding: 0% 1%;
            border-radius: 180px; */

            color: #FFE5DB;
            background-color: #9D3B2F;
        }

        .misi-text {
            font-family: 'Raleway', sans-serif;
            font-weight: 400;
            

        }

        .misi-title {
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
            color: #9D3B2F;
        }

        .misi-wrapper-text {
            color: #FFE5DB;
            background-color: #9D3B2F;
            padding: 20px;
        }

        .history-button {
            color: #FFE5DB;
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
            cursor:pointer;
        }

        .history-button:hover {
            color: #FFE5DB;
        }

        @media screen and (max-width: 767px) {
            .history .history-2{
                margin-left: 0px;
            }

            .misi, .visi {
                margin-top: 0px;
            }

            .misi .misi-2 {
                border-left: none;
            }

            .misi-text, .history-text {
                font-size: smaller;
            }

            .visi, .history-title {
                font-size: medium;
            }
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
            text-align: justify;
        }

        .modal-writing{
            border-top : 1.5px white dashed;    
            padding-top: 25px;
            border-bottom: 1.5px white dashed
        }

        .modal-text {
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
        }
    </style>
</head>
<body>
    
    <?php include "navbar.php"; ?>
    <div class="container ">
        <div class="row history mt-5 mb-5">
            <div class="col-md-6 col-sm-12 history-1 text-center" data-aos="fade-right">
                <img src="assets/about/history.webp" style="width: 100%;">
            </div>
            <div class="col-md-6 col-sm-12 history-2 text-start" data-aos="fade-left">
                <h1 class="history-title">Sejarah Kami</h1>
                <p class="history-text"> Yayasan Rumah Bersinar didirikan atas keprihatinan kondisi dan situasi Bangsa
                    secara khusus masih kurangnya pemerataan di bidang ekonomi dan pendidikan, di
                    mana masih banyak anak-anak di sebagian wilayah Indonesia ini lahir dari keluarga
                    yang berada di bawah garis kemiskinan dan minim akses pendidikan sehingga
                    menghasilkan SDM yang kurang kompetitif. </p>
                <a class="history-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Baca Lebih Lengkap...</a>
            </div>
        </div>

        <div class="row visi mb-5" data-aos="flip-up"> 
            <div class="col-12 mt-3">
                <p class="visi-text"> "Turut serta mencerdaskan kehidupan bangsa dan meningkatkan kesejahteraan
                    masyarakat serta meningkatkan kualitas SDM secara khusus kepada anak-anak
                    kurang beruntung, yatim/piatu, prasejahtera yang berasal dari daerah-daerah tertinggal
                    di wilayah Republik Indonesia." </p>
                <h3 class="visi-title text-end">- Visi</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 mb-5">
        <div class="row misi">
            <div class="col-md-6 col-sm-12 misi-1">
                <img src="assets/about/edited-misi-final.png" class="misi-image"  data-aos="zoom-in">
            </div>
            <div class="col-md-6 col-sm-12 misi-2">
                <div class="misi-wrapper-text" data-aos="fade-left">
                    <h5 class="number text-start">1.</h5>
                    <p class="misi-text"> Mendirikan Panti-Panti Asuhan dengan sistem orang tua atau keluarga pengganti dan
                        memfasilitasi penghidupan serta pendidikan kepada anak-anak kurang beruntung,
                        yatim/piatu, prasejahtera yang berasal dari daerah-daerah tertinggal di wilayah
                        Republik Indonesia.</p>
                </div>

                <div class="misi-wrapper-text mt-3" data-aos="fade-left">
                    <h5 class="number text-start">2.</h5>
                    <p class="misi-text">Memperlengkapi anak-anak panti asuhan dengan pendidikan kedisplinan, mental,
                    kerohanian, soft skill dan pengembangkan bakat di berbagai bidang yang ditekuni.</p>
                </div>
                
                
            </div>
        </div>
    </div>

    <!-- Modal Warning -->
    <div class='modal fade modal-popup' id='staticBackdrop' data-bs-backdrop='static' style="z-index:10000000000000000000000000">
        <div class='modal-dialog modal-lg modal-dialog-centered'>
            <div class='modal-content modal-warning'>
                <div class='modal-body modal-warning-body'>
                    <div class='row modal-body-content' id="modal-content-warning">
                        <div class="col-12 mb-3">
                            <div class="wrap-close text-end">
                                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class='col-12 modal-writing mb-3'>
                            
                            <h3 class='modal-text mb-3'>Sejarah Kami</h3> 
                            <p class='modal-warning-text'>
                                Yayasan Rumah Bersinar didirikan atas keprihatinan kondisi dan situasi Bangsa
                                secara khusus masih kurangnya pemerataan di bidang ekonomi dan pendidikan, di
                                mana masih banyak anak-anak di sebagian wilayah Indonesia ini lahir dari keluarga
                                yang berada di bawah garis kemiskinan dan minim akses pendidikan sehingga
                                menghasilkan SDM yang kurang kompetitif.
                                <br>
                                <br>
                                Didasari pada keprihatinan ini, Yayasan Rumah Bersinar mendirikan panti asuhan
                                yang dikhusukan untuk memfasilitasi anak-anak kurang beruntung, yatim/piatu, putus
                                sekolah, pra sejahtera dari wilayah-wilayah yang tertinggal dan terbatas akses dalam
                                pendidikan formal maupun non-formal.
                                <br>
                                <br>
                                Yayasan Rumah Bersinar memulai upaya ini dengan mendirikan Panti Asuhan Rumah
                                Bersinar yang memfasilitasi 12 anak yang berasal dari Papua dan Papua Barat sejak
                                2019 (yang kemudian bertambah dua anak dari NTT), dan pada tahun 2021
                                menambah satu unit Panti Asuhan yang memfasilitasi 12 anak dari Nias Selatan
                                dengan nama Panti Asuhan Saluran Berkat. Pada bulan Juni 2022 ini, Yayasan Rumah
                                Bersinar menambah satu unit Panti Asuhan yang memfasilitasi 12 anak dari
                                Kepulauan Talaud. Adapun anak-anak yang dipilih diutamakan adalah yang
                                yatim/piatu, putus sekolah, pra sejahtera dengan tujuan agar program ini lebih tepat
                                guna.
                                <br>
                                <br>
                                Untuk pendanaan upaya ini, Yayasan Rumah Bersinar sampai saat ini belum memiliki
                                sponsor tetap, melainkan memulai dengan sumbangan pengurus Yayasan dan
                                membuka kesempatan kepada masyarakat luas untuk mendukung dalam berbagai
                                bentuk seperti sembako, makanan, keperluan sehari-hari, dana, dll. Yang
                                keseluruhannya diterima dan dikelola langsung oleh Pengasuh dan anak-anak
                                sehingga para donatur dapat melihat bahwa pemberian mereka sampai dan dirasakan
                                <br>
                                <br>
                                oleh anak-anak secara langsung. Bersyukur seiring berjalannya waktu beberapa
                                donatur mulai rutin dalam berdonasi, namun dapat dikatakan bahwa jumlahnya masih
                                jauh dari cukup sehingga Pengurus Yayasan berupaya juga mengadakan beberapa
                                usaha sampingan untuk mendukung seperti usaha air minum isi ulang dan layanan
                                pengantaran daging. Adapun hasilnya masih terbatas dan sekedar hanya membantu
                                pembiayaan transport kegiataan ekstra kulikuler anak-anak.
                                <br>
                                <br>
                                Yayasan Rumah Bersinar akan berupaya semampunya untuk menjalankan misi sosial
                                ini, namun harus diakui bahwa lembaga ini tidak dapat berjalan sendiri untuk
                                mencapai tujuan tersebut. Dibutuhkan banyak dukungan dari masyarakat luas yang
                                yang memmiliki persamaan visi dan peduli dengan tujuan tersebut. Dukungan doa
                                menjadi yang utama karena tugas ini berkaitan dengan kehidupan manusia dan searah
                                dengan tujuan bangsa Indonesia yaitu turut serta dalam pemerataan pendidikan dan
                                kualitas SDM. Dukungan daya menjadi dibutuhkan dalam bentuk relawan-relawan
                                yang sevisi dalam memberi sentuhan kasih kepada anak-anak ini yang jauh darikeluarga dan kampung halamannya. Serta dukungan Dana yang yang memadai sesuai
                                dengan kebutuhan dan penghidupan yang layak buat anak-anak ini.
                                <br>
                                <br>
                                Harapan dan doa kami bapak, ibu dan saudara turut mendukung kami dan bahumembahu
                                dengan kami dalam mewujudkan mimpi anak-anak ini untuk masa depan
                                mereka dan bangsa ini
                                <br>
                                <br>
                            </p>
                        </div>
                        <br>
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
</script>