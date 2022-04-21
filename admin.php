<?php 
session_start();
include'fungsi.php';

if(!isset($_SESSION['userweb'])){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- icon boastrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    .logo {
        text-decoration: none;
    }

    .banner {
        margin-top: 150px;
        height: 150vh;
    }

    .banner h5 {

        font-family: 'Montserrat', sans-serif;

    }

    .navbar img {
        height: 100px;
    }
    .footer .sosmed a {
    text-decoration: none;
    color: black;
  }
  .footer{
    color: black;
  }
</style>

<body>
    <section>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-success  ">
            <div class="container ">
                <div class="brand d-flex justify-content-between align-items-center">
                    <a href="admin.php" class="logo d-flex">
                        <img src="aidilcom.png" alt="" class=" ">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-ligth " id="navbarNav">
                    <ul class="nav navbar-nav ms-auto  d-flex align-items-center">
                        <li class="bar nav-item  ">
                            <a class="nav-link me-5 text-light " href="database.php">Kegiatan</a>
                        </li>
                        <li class="bar nav-item">
                            <a class="link nav-link me-5 text-light " href="karyadata.php">karya</a>
                        </li>
                        <li>
                            <a href="logout.php " style="background-color: white; color:red; padding:5px;text-decoration:none; border-radius:50px;font-weight:bold;">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>


    <section class="banner text-md-start text-center ">
        <div class="container d-flex justify-content-between align-items-center ">
            <div>
                <h5 class="">Halo, Admin!</h5>
                <h3 class=" fw-bold">AIDIL ASHYARI UMAR</h3>
                <h5>Perbanyak sujud dibulan puasa</h5>
            </div>
            <div>
                <img src="personal.png" width="450px">
            </div>
        </div>
    </section>



    
        
  
<section class="footer bg-success">
    <div class="container-fluid  p-3 d-flex justify-content-evenly">

      <div class="row">
        <div class="col-sm-12 col-lg-4 col-md-12">
          <div class="sosmed">
            <h5>SOCIAL MEDIA</h5>
            <h6><a href="https://www.instagram.com/aidilashyariumar?r=nametag"><i class="bi bi-instagram">
                  aidilashyariumar</i></a></h6>
            <h6><a href="https://www.facebook.com/aidilasyhariumar"><i class="bi bi-facebook"> aidil asyhari
                  umar</i></a></h6>
            <h6><a href="https://twitter.com/aidilashyarium1"><i class="bi bi-twitter"> aidilashyarium1</i></a></h6>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 col-md-12">
          <div class="address">
            <h5>ADDRESS</h5>
            <h6> <i class="bi bi-geo-alt"></i> Sulawesi Selatan, Kota Makassar, jl.Kakatua II lR.3 No.1c </h6>
          </div>
        </div>
        <div class=" col-sm-12 col-lg-4 col-md-12">
          <div id="contact" class="contact">
            <h5>CONTACT</h5>
            <h6><i class="bi bi-telephone"></i> <i class="bi bi-whatsapp"></i>+6265213060504</h6>
            <h6><i class="bi bi-envelope"></i> aidilashyariumar@gmail.com</h6>
          </div>
        </div>
      </div>
    </div>





  </section>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>