<!doctype html>
<html lang="en">
<?php include('inc/koneksi.php');?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- My css -->
  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="icon" type="image/png" href="assets/img/icon.jpg" class="icon">
  <title>Bukan Ustadz | Mari Mengaji Bersama</title>
</head>

<body>


  <!-- jumbotron -->
  <div class="jumbotron">
    <img src="assets/img/logo1.jpg" alt="logo" class="rounded-circle">
    <h1>Satu Hari Satu Hadits</h1>
    <br>
  </div>
  <!-- akhir jumbotron -->

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <div class="container">
      <!-- gambar -->
      <img src="assets/img/logo1 navbar.jpg" width="40px" class="rounded" alt="Bukan Ustadz"> <span class="text"> Bukan
        ustadz</span>

      <!-- navbar menu -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link" href="http://127.0.0.1/cpannel/">Beranda<span class="sr-only">(current)</span></a>
            </li>
                
				<?php 
				global $connect;
				$menu = mysqli_query($connect,"SELECT * FROM kategori WHERE Terbit='1' ORDER BY ID ASC LIMIT 0,10");
				while ($r = mysqli_fetch_array($menu)) {
					extract($r);
					
					echo'
                    <li class="nav-item">
                        <a class="nav-link" href="./?open=cat&id='.$ID.'">'.$Kategori.'</a>
                    </li>
					
					';
				}

				 ?>
			
          
        </ul>
      </div>
    </div>
  </nav>