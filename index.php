<?php
  include 'fungsi.php';
   $kegiatan = query("SELECT * FROM kegiatan ORDER BY id DESC LIMIT 4");
   $karya = query("SELECT * FROM karya ORDER BY id DESC LIMIT 4");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
</head>
<link rel="stylesheet" href="style.css">
<!-- icon boastrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<style>
  .navbar .brand a {
    text-decoration: none;
  }

  .isi .container .row .col {
    margin-top: 30px;
    margin-bottom: 30px;
  }

  .kegiatan {
    width: 90%;
    background-color: silver;
    margin: -50px auto auto auto;
    padding: 20px;
  }

  .bg-success {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-success-rgb), var(--bs-bg-opacity)) !important;
  }

  .footer .sosmed a {
    text-decoration: none;
    color: black;
  }

  .footer {
    color: black;
  }

  .kegiatan .row .col .img {
    width: 300px;
    height: 300px;
    margin-top: 30px;
    background-image: url(img/<?=$kegiatan['img'] ?>);
    background-size: cover;
    background-position: center;
  }

  .row {
    margin: auto;
  }

  /* .bio{
    width: 50%;
    margin: auto;

  } */
  .table {
    width: 40%;
  }

  /*  */
</style>

<body>

  <section class>
    <nav class="navbar  navbar-expand-lg navbar-light bg-light ">
      <div class="container-fluid">
        <div class="brand d-flex justify-content-between align-items-center">
          <a href="#home" class="logo d-flex">
            <img src="logo.png" width="150" alt="" class="ms-4 border-3-light">
            <!-- <h3 class="ms-3  text-bold fw-bold text-dark">aidil.com</h3> -->
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="nav navbar-nav ms-auto  ">
            <li class="bar nav-item active">
              <a class="nav-link me-5 " href="#index">Beranda</a>
            </li>
            <li class="bar nav-item">
              <a class="link nav-link me-5 " href="#kegiatan">Kegiatan</a>
            </li>
            <li class="bar nav-item">
              <a class="link nav-link me-5 " href="#bio">Biodata</a>
            </li>
            <li class="bar nav-item">
              <a class="link nav-link me-5 " href="#karya">Karya</a>
            </li>
            <li class="bar nav-item">
              <a class="nav-link me-5 " href="#contact">Kontak</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <section id="home" class="isi bg-success">
    <div class="container ">
      <div class="row d-flex justify-content-between align-items-center">
        <div class="col col-lg-6 col-sm-12">
          <h1 class="fw-bold">Website Pribadi <br> Aidil Ashyari Umar</h1>
          <h5>Website ini dibuat untuk memenuhi tugas dari matakuliah pemrograman web 2</h5>
          <!-- <div>
            <button type="button" class="btn btn-warning">
              <h6>Selengkapnya</h6>
            </button>
          </div> -->
        </div>
        <div class="col col-lg-6 col-sm-12">
          <img src="personal.png" alt="" width="100%">
        </div>
      </div>
    </div>
  </section>

  <section class="kegiatan ">
    <h2 id="kegiatan">Kegiatan Terbaru</h2>
    <div class=" d-flex justify-content-between ">
      <div class="row g-2 d-flex justify-content-between">

        <?php foreach ($kegiatan as $keg) : ?>

        <div class="col col-lg-3">
          <div class="card">
            <img src="img/<?=$keg['img']?>" height="200px" alt="">
            <div class="card-body">
              <h5 class="card-title"><?= $keg['nama'];?></h5>
              <p class="card-text"><?= substr($keg['desk'], 0, 20); ?>...</p>
              <a href="kegiatan.php?id=<?= $keg['id'] ?>" class="btn btn-success">More...</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <a href="S_Kegiatan.php" class="btn btn-success">View All</a>
      </div>
    </div>
  </section>

  <section>
    <div class="container">

      <h2 id="bio" class="d-flex justify-content-center mt-5">Biodata Diri </h2>

      <div class="d-flex justify-content-evenly">
        <table class="table">
          <thead>
            <tr>
              <th>NAMA</th>
              <th>:</th>
              <th>AIDIL ASHYARI UMAR</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>TTL</th>
              <th>:</th>
              <th>25 APRIL 2002</th>
            </tr>
            <tr>
              <th>ALAMAT</th>
              <th>:</th>
              <th>JL.KAKATUA II LR.3 NO.1c</th>
            </tr>
            <tr>
              <th>NAMA AYAH</th>
              <th>:</th>
              <th>UMAR<r/th> </tr> <tr>
              <th>NAMA IBU</th>
              <th>:</th>
              <th>ROSDIANA</th>
            </tr>
          </tbody>
        </table>

        <table class="table">
          <thead>
            <tr>
              <th>SEKOLAH DASAR</th>
              <th>:</th>
              <th>SD INPRES PARANG</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>SEKOLAH MENENGAH PERTAMA</th>
              <th>:</th>
              <th>SMP LPP UMI</th>
            </tr>
            <tr>
              <th>SEKOLAH MENENGAH KEATAS</th>
              <th>:</th>
              <th>SMK LPP UMI</th>
            </tr>
            <tr>
              <th>STRATA 1</th>
              <th>:</th>
              <th>UIN ALAUDDIN MAKASSAR</th>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section>
    <div class="container bg-light p-3 ">
      <h2 id="karya">Karya</h2>
      <div class="row g-3 ">
        <?php foreach ($karya as $kar) : ?>
        <div class="col col-lg-3">
          <div class="card" >
            <img src="img/<?= $kar['img'];?>" class="card-img-top" style="height: 250px;" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?=$kar['nama']?></h5>
            </div>
          </div>
        </div>  
      <?php endforeach; ?>
      <a href="karya.php" class="btn btn-success">View All</a>
    </div>
    </div>
  </section>

  <section class="footer bg-success">
    <div class="container-fluid  mt-5 p-3 d-flex justify-content-evenly">

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