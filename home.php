<?php 
include("inc/koneksi.php");
include("inc/define.php");
 ?>
  <!-- breaking news -->
  <div class="cat-box-title">
    <h2>Tulisan / Artikel Terbaru</h2>
    <div class="stripe-line"></div>
  </div>
  <!-- akhir breaking news -->

  <!-- slideshow -->
  <div class="container mt-5">
    <div id="carouselExampleInterval" class="carousel slide slide-sm" data-ride="carousel">
      <div class="carousel-inner">
      <?php 
		global $connect;

		$sql = mysqli_query($connect,"SELECT * FROM  carosel ORDER BY ID DESC LIMIT 0, 10");
        while ($b = mysqli_fetch_array($sql)) {
			extract($b);
        if($id>=2){
            echo'
            <div class="carousel-item" data-interval="5000">
            <a href=""><img
                src="assets/'.$gambar.'" class="d-block w-100" alt="..."></a>
            <div class="carousel-caption d-none d-md-block">
                <h5><a href="">'.$judul.'</a>
                </h5>
                <p>'.$deskripsi.'</p>
            </div>
            </div>

		';
        }
        else{
            echo'
        <div class="carousel-item active" data-interval="5000">
          <a href=""><img
              src="assets/'.$gambar.'" class="d-block w-100" alt="..."></a>
          <div class="carousel-caption d-none d-md-block">
            <h5><a href="">'.$judul.'</a>
            </h5>
            <p>'.$deskripsi.'</p>
          </div>
        </div>

		';
        }
		
        
		}
		?>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- akhir slidshow -->

  <br><br>

  <!-- menu artikel -->
  <div class="container">
    <div class="row">
      <!-- menu -->
      <div class="col-12 col-lg-8 col-md-12 col-sm-12">
        <div class="card-columns">
        <?php 
          global $connect;

          $sql = mysqli_query($connect,"SELECT * FROM artikel WHERE Terbit='1' ORDER BY ID DESC LIMIT 0, 10");
              while ($b = mysqli_fetch_array($sql)) {
            extract($b);
          
          echo'
              <div class="card">
                  <a href="./?open=detail&id='.$ID.'">
                    <img src="'.URL_SITUS.$Gambar.'" class="card-img-top " alt="..." ></a>
                  <div class="card-body">
                    <h5 class="card-title"><a href="./?open=detail&id='.$ID.'">'.$Judul.'</a></h5>
                    <p class="card-text">'.substr($Isi,0,70).'</p>
                    <p class="card-text"><small class="text-muted">'.$Tanggal.'</small></p>
                  </div>
                </div>

          ';
          }
          ?>     
              
      </div>
    </div>
    <?php
    include('account.php');
    ?>
    </div>
    <!-- akhir menu -->
    
