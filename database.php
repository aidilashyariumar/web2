<?php 
  session_start();
  include'fungsi.php';
  
  if(!isset($_SESSION['userweb'])){
      header('location:login.php');
  }

  $kegiatan = query("SELECT * FROM kegiatan");

  if (isset($_POST["kegiatan"])){
    if(tambah_data_kegiatan($_POST) > 0){
        echo"
             <script>
                 alert('data berhasil ditambahkan');
                 document.location.href = 'database.php';
             </script>
         ";
    }else{
         echo"
             <script>
                 alert('data gagal ditambahkan');
                 document.location.href = 'database.php';
             </script>
          ";
    }
}

if (isset($_POST["hapus"])){
  if(hapus($_POST) > 0){
      echo"
           <script>
               alert('data berhasil dihapus');
               document.location.href = 'database.php';
           </script>
       ";
  }else{
       echo"
           <script>
               alert('data gagal dihapus');
               document.location.href = 'database.php';
           </script>
        ";
  }
}

if (isset($_POST["edit"])){
  if(edit($_POST) > 0){
      echo"
           <script>
               alert('data berhasil ditambahkan');
               document.location.href = 'database.php';
           </script>
       ";
  }else{
       echo"
           <script>
               alert('data gagal ditambahkan');
               document.location.href = 'database.php';
           </script>
        ";
  }
}

if(isset($_POST['cari'])){
  $kegiatan = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>data kegiatan</title>
  <!-- icon boastrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
        <nav class="navbar navbar-expand-lg navbar-light bg-success  ">
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
                        <li class="bar nav-item active ">
                            <a class="nav-link me-5 text-light " href="database.php">Kegiatan</a>
                        </li>
                        <li class="bar nav-item">
                            <a class="link nav-link me-5 text-light " href="karyadata.php">karya</a>
                        </li>
                        <li>
                            <a href="logout.php " style=" color:red; padding:5px;text-decoration:none; border-radius:50px;font-weight:bold;">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

  <div class="container d-flex justify-content-between mt-5" width="80%">
 
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#exampleModal">
      Tambah data
    </button>
    <div class="kosong">
      <form class="d-flex" action="" method="post">
        <input size="50" name="keyword" class="form-control me-2"  type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-danger" name="cari" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
            
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kegiatan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="img" class="form-label ">GAMBAR</label>
                    <input type="file" name="img" class="form-control" id="img"
                        aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">NAMA KEGIATAN</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                    <label for="desk" class="form-label">DESKRIPSI</label>
                    <input type="text" name="desk" class="form-control" id="desk">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="kegiatan" class="btn btn-dark">Kirim</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<section class="container">

  <table class="table">
    <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">IMAGE</th>
          <th scope="col">NAMA</th>
          <th scope="col">DESCRIPSI</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $i = 1;
        foreach ($kegiatan as $keg) : ?>
        <tr>
          <th scope="row"><?= $i; ?></th>
          <td><img src=" img/<?= $keg['img']; ?>" width="40px"></td>
          <td><?= $keg['nama']; ?></td>
          <td><?= $keg['desk']; ?></td>
          <td>
            <button type="button" class="btn btn-light" id="daftar" data-bs-toggle="modal"
            data-bs-target="#modal<?= $keg['id']; ?>">
              ubah
            </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal<?= $keg['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            <?php 
                $id =  $keg['id']; 
                $edit_kegiatan = query("SELECT * FROM kegiatan WHERE id = $id");
                ?>
            <input type="hidden" name="id" value="<?= $id;?>">
            
            <?php foreach ($edit_kegiatan as $edit_keg):?>
            <input type="hidden" name="imglama" value="<?= $edit_keg['img'];?>">

            <div class="mb-3">
              
              <label for="img" class="form-label ">GAMBAR</label>
              <input type="file" name="img" class="form-control" id="img" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">NAMA KEGIATAN</label>
              <input type="text" name="nama" class="form-control" value="<?= $edit_keg['nama'];?>" id="nama">
            </div>
            <div class="mb-3">
              <label for="desk" class="form-label">DESKRIPSI</label>
              <input type="text" name="desk" class="form-control" value="<?= $edit_keg['desk'];?>" id="desk">
            </div>
            
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="edit" class="btn btn-dark">Kirim</button>
        </div>
        <?php endforeach ?>
      </form>
    </div>
    </div>
  </div>
  </td>
  <td>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $keg['id'];?>">
      <button class="btn btn-dark text-light" type="submit" name="hapus">hapus</button>
    </form>
  </td>
</tr>
<?php  
    $i++;
  endforeach;
  ?>
  </tbody>
</table>
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