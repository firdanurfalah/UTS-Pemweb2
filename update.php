<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>PEREKAMAN DATA KENDARAAN| CRUD</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light" style="background-color: #58D68D; text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">PEREKAMAN DATA KENDARAAN | CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Kendaraan</h3>
            </div>
            <hr>
        </div>
<body>

  <?php

    // Ambil data dari patameter url browser
    $id = $_GET['id'];

    // Query ambil data dari param jika ada.
    $query = "SELECT * FROM tbkendaraan WHERE id = $id";
    // Hasil Query
    $result = mysqli_query($koneksi, $query);
    foreach($result as $data) {
  ?>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Update Data</h1><br>
      <form method="POST">
        <!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data, lebih aman di banding menggunakan id dari params -->
        <input type="hidden" value="<?= $data['id'] ?>" name="id">
        <div class="mb-3">
          <label for="inputNomor" class="form-label">Nomor Plat Kendaraan</label>
          <input type="text" class="form-control" id="inputNomor" value="<?= $data['nomor'] ?>" name="nomor" placeholder="Masukan Nomor Plat Kendaraan">
        </div>
        <div class="mb-3">
          <label for="inputMerk" class="form-label">Merk Kendaraan</label>
          <input type="text" class="form-control" id="inputMerk" value="<?= $data['merk'] ?>" name="merk" placeholder="Masukan Merk Kendaraan">
        </div>
        <div class="mb-3">
          <label for="inputTipe" class="form-label">Tipe Kendaraan</label>
          <input type="text" class="form-control" id="inputTipe" value="<?= $data['tipe'] ?>" name="tipe" placeholder="Masukan Tipe Kendaraan">
        </div>
        <input name="rekam" type="submit" class="btn btn-success" value="Update">
        <a href="index.php" type="button" class="btn btn-success">Kembali</a>
      </form>
    </div>
  </section>

  <?php } ?>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['rekam'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $nomor = $_POST['nomor'];
      $merk = $_POST['merk'];
      $tipe = $_POST['tipe'];

      // Membuat Query
      $query = "UPDATE tbkendaraan SET nomor = '$nomor', merk = '$merk', tipe = '$tipe' WHERE id = '$id'";

      $result = mysqli_query($koneksi, $query);

      if($result){
        header("location: index.php");
      } else {
        echo "<script>alert('Data Gagal di update!')</script>";
      }

    }    

  ?>
  <!-- Footer -->
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="row bg-light text-uppercase">
            <div class="col-md-6 my-2" id="about">
                <h4 class="fw-bold text-uppercase">Tentang</h4>
                <p>Pemrograman Web 2 | Teknik Informatika | Politeknik Harapan Bersama Tegal</p>
            </div>
            <div class="col-md-6 my-2 text-center link">
                <h4 class="fw-bold text-uppercase">Social Media</h4>
                <a href="#" target="_blank"><i class="bi bi-facebook fs-3"></i></a>
                <a href="#" target="_blank"><i class="bi bi-github fs-3"></i></a>
                <a href="#" target="_blank"><i class="bi bi-instagram fs-3"></i></a>
                <a href="#" target="_blank"><i class="bi bi-twitter fs-3"></i></a>
            </div>
        </div>
    </div>
    <footer class="text-black text-center" style="padding: 5px; background-color: #58D68D;">
        <p>Created with <i class="bi bi-suit-heart-fill" style="color: hotpink;"></i> by Firda Nur Falah</p>
    </footer>
    <!-- Close Footer -->
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>
</html>
