
<?php include('inc/define.php');?>
<!-- menu artikel -->
<div class="container" style="margin-top: 30px;">
    <div class="row">
      <!-- menu -->
      <div class="col-12 col-lg-8 col-md-12 col-sm-12">
        <div class="card-columns">	

		<?php 
		global $connect;

		$catid = (isset($_GET['id']) ? $_GET['id'] : '');

		$getalias = mysqli_query($connect,"SELECT * FROM kategori WHERE ID='".$catid."'");
		while ($al = mysqli_fetch_array($getalias)) {


			$sql = mysqli_query($connect,"SELECT * FROM artikel WHERE Terbit='1' AND Kategori='".$al['alias']."' ORDER BY ID DESC LIMIT 0,10");
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
		}}
		?>

         
        
      </div>
    </div>
    <!-- akhir menu -->
    <?php
    include('account.php');
    ?>