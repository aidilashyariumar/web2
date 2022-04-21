<?php 
     $conn = mysqli_connect('localhost','root','','aidildata');
     if(mysqli_connect_errno()){
         echo "gagal" . mysqli_connect_error();
     }
     
     function tambah_data_kegiatan($data){
        global $conn;

        //tangkap data dari form dan masukan ke variabel

       
        $nama = htmlspecialchars($data["nama"]);
        $desk = htmlspecialchars($data["desk"]);
        
        $img = uploadimg();

        if(!isset($img)){
            return false;
        }

        //tambah file kedatabase
        mysqli_query($conn,"INSERT INTO kegiatan VALUES('','$nama','$img','$desk')");

        return mysqli_affected_rows($conn);
    }
     
     function tambah_data_karya($data){
        global $conn;

        //tangkap data dari form dan masukan ke variabel

       
        $nama = htmlspecialchars($data["nama"]);
        
        $img = uploadimg();

        if(!isset($img)){
            return false;
        }

        //tambah file kedatabase
        mysqli_query($conn,"INSERT INTO karya VALUES('','$nama','$img')");

        return mysqli_affected_rows($conn);
    }

     function uploadimg(){

        $nameFile = $_FILES['img']['name'];
        $ukuranFile = $_FILES['img']['size'];
        $error = $_FILES['img']['error'];
        $tmpName = $_FILES['img'] ['tmp_name'];

        //cek apakah tidak ada foto yang diupload
        if ($error === 4){
            echo "<script>
                    alert('pilih foto terlebih dahulu');
                    </script>";

                    return false;
        }

        //pastikan yang diupload adalah foto

        $ekstensiGambarValid = ['jpeg','jpg','png'];
        $ekstensiGambar = explode('.',$nameFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
            echo"<script>
                    alert('yang diupload bukan gambar !');
                </script>";

            return false;
        }

        //cek jika ukuran terlalu besar
        //if ($ukuranFile > 2500000){
            //echo"<script>
                //alert('ukuran gambar terlalu besar);
                //</script>";

          //  return false;
        //}

        //lolos pengecekan , gambar siap diupload
        //ubah nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    function query($query){

        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = []; 
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function hapus($data) {
        global $conn;
        $id = $data['id'];
        mysqli_query($conn, "DELETE FROM kegiatan WHERE id = $id");

        return mysqli_affected_rows($conn);
    }
    function hapus_karya($data) {
        global $conn;
        $id = $data['id'];
        mysqli_query($conn, "DELETE FROM karya WHERE id = $id");

        return mysqli_affected_rows($conn);
    }


    function edit($data){
        global $conn;

        $id = $data['id'];

       $imglama = $data["imglama"];

       if($_FILES['img']['error'] === 4){
           $img = $imglama;

       }else{
           $img = uploadimg();
       }
      
        $nama = htmlspecialchars($data['nama']);
        $desk = htmlspecialchars($data['desk']);

    


        //update 
        $query = "UPDATE kegiatan SET
                img = '$img',
                nama = '$nama',
                desk = '$desk'
                WHERE id = $id";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }
    function edit_karya($data){
        global $conn;

        $id = $data['id'];

       $imglama = $data["imglama"];

       if($_FILES['img']['error'] === 4){
           $img = $imglama;

       }else{
           $img = uploadimg();
       }
      
        $nama = htmlspecialchars($data['nama']);


        //update 
        $query = "UPDATE karya SET
                img = '$img',
                nama = '$nama',
                WHERE id = $id";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function cari($keyword){
        $query = "SELECT * FROM kegiatan WHERE nama LIKE '%$keyword%' OR desk LIKE '%$keyword%'";
        

        return query($query);
    }
    function cari_karya($keyword){
        $query = "SELECT * FROM karya WHERE nama LIKE '%$keyword%'";
        

        return query($query);
    }
?>