<?php 

include "./connect.php"; 
include "./sorting.php"; 

if(isset($_POST['submit'])){
    header("Location: https://wa.me/62895609706131?text=Nama:%20".$_POST['name']."%0APhone:%20".$_POST['phone']."%0AMessage:%20".$_POST['message']);
}

$filter = "";

$sortedQuery = mysqli_query($conn, "SELECT * FROM rumah");

if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
    $query = getProductsArray($conn);
    $sortedQuery = bubbleSort($query, $filter == 'tohigh' ? 'ASC' : 'DESC');
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vaganza Village</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(
                rgba(0, 0, 0, .6),
                rgba(0, 0, 0, .6)
            ), url("img/bn2.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .my-6 {
            margin-top: 4rem !important;
            margin-bottom: 4rem !important;
        }
        .navbar {
            z-index: 99;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-warning position-sticky top-0 start-0 end-0 py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">VAGANZA VILLAGE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#rumah">House-Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero text-white text-center" id="home">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1 class="fw-bold mb-3">VAGANZA VILLAGE</h1>
            <p class="mb-4">"Rumah merakyat harga Bersahabat"<br>Silahkan lihat Rumah yang Tersedia dengan mengklik Type Rumah</p>
            <a href="#rumah" class="btn btn-warning btn-lg rounded-pill px-4">Tipe Rumah</a>
        </div>
    </div>

    <div class="container my-6" id="about">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold">Tentang Kami</h2>
                <p>
                    VAGANZA VILLAGE SUKARAME.
                    Vaganza Village Sukarame adalah Kawasan Hunian dengan Sistem Cluster yang berlokasi di Sukarame, Pusat Kota
                    Bandar Lampung. Dimana Lokasinya diapit oleh 2 Pintu Tol Kota Baru dan Pintu Tol Lematang.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="img/cvdpn.jpg" alt="food" class="w-100"/>
            </div>
        </div>
    </div>

    <div class="bg-dark my-6 py-5" id="rumah">
        <div class="container">
            <h2 class="text-white fw-bold text-center mb-5">Tipe Rumah</h1>
            <form action="" method="get" class="mb-5">
                <div class="d-flex justify-content-center">
                    <select name="filter" class="form-select" style="max-width: 400px">
                        <option value="">--Pilih Filter</option>
                        <option <?= $filter == "tohigh" ? "selected" : null ?> value="tohigh">Dari Harga Terkecil ke Tinggi</option>
                        <option <?= $filter == "tolow" ? "selected" : null ?> value="tolow">Dari Harga Tertinggi ke Kecil</option>
                    </select>
                    <button type="submit" class="btn btn-warning ms-2">Terapkan</button>
                </div>
            </form>
            <div class="row">
                <?php
      
                foreach($sortedQuery as $row){
                
                ?>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0">
                        <img src="img/<?= $row['gambar']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title mb-0 fw-bold"><?= $row['nama']; ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Luas Tanah <?= $row['luas_tanah']; ?> m<sup>2</sup></li>
                          <li class="list-group-item">Luas Bangunan <?= $row['luas_bangunan']; ?> m<sup>2</sup></li>
                          <li class="list-group-item"><?= $row['unit']; ?> Unit Ready Stock, <?= $row['lantai']; ?> Lantai</li>
                          <li class="list-group-item"><?= $row['kamar_tidur']; ?> Kamar Tidur</li>
                          <li class="list-group-item"><?= $row['kamar_mandi']; ?> Kamar Mandi</li>
                          <li class="list-group-item"><?= $row['carport']; ?> Carport</li>
                          <li class="list-group-item"><?= $row['kitchen']; ?> Kitchen</li>
                          <li class="list-group-item text-warning">Rp <?= number_format($row['harga'], 2); ?></li>
                        </ul>
                        <div class="card-body">
                          <a href="https://wa.me/62895609706131?text=Haloo+min+mau+konsultasi+tentang+<?= $row['nama']; ?>" target="_blank  " class="card-link text-decoration-none text-warning fw-semibold">Konsultasi</a>
                        </div>
                      </div>
                </div>
                <?php }; ?>
            </div>
        </div>
    </div>

    <div class="container my-6" id="contact">
        <h2 class="fw-bold text-center mb-5">Kontak Kami</h1>
        <form action="" method="post">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingname" placeholder="Jhone Doe">
                        <label for="floatingname">Nama </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="phone" name="phone" class="form-control" id="floatingphone" placeholder="0812******90">
                        <label for="floatingphone">Nomor Hanphone atau Whatsapp</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Pesan</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-warning" style="max-width: 600px">Kirim</button>
                </div>
            </div> 
        </form>
    </div>

    <div class="bg-warning mt-5 py-4">
        <div class="container text-center">
            <h3>Vaganza Village Sukarame</h1>
            <p class="mb-0">Jl. Pulau Singkep Gg. Pala 3, Baru, Kec. Sukarame, Kota Bandar Lampung, Lampung 35131</p>
        </div>
    </div>

    <footer class="bg-dark py-2">
        <div class="container text-center">
            <small class="text-white">&copy; 2024 Copyright by Vaganza Village</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>