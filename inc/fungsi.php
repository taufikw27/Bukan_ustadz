<?php
include 'koneksi.php';

function getprofilweb($tax)
{
	global $connect;

	$hasil = mysqli_query($connect,"SELECT * FROM konfigurasi WHERE Tax='$tax' ORDER BY ID DESC LIMIT 1");
	while($r = mysqli_fetch_array($hasil))
	{
		return $r['Isi'];
	}
}

function populer()
{
	?>
	<!--berita populer-->
		<div class="bar-menu">
			Berita Populer
		</div>

		<div>
			<?php 
			global $connect;

			$pop = mysqli_query($connect,"SELECT * FROM artikel WHERE Terbit='1' AND Tanggal>='".date('Y-m-d H:i:s', strtotime(''.POPULER_TIME.' days'))."' ORDER BY Viewnum DESC LIMIT 0,10");

			while ($r = mysqli_fetch_array($pop)) {
				extract($r);
				
				echo'
				<div class="side-box">
					<div class="img">
						<img src="'.URL_SITUS.$Gambar.'">
					</div>
					<span>'.substr($Tanggal, 0, 10).' | view: <b>'.$Viewnum.'</b> </span>

					<h1><a href="./?open=detail&id='.$ID.'">'.$Judul.'</a></h1>
					<div class="clear"></div>
				</div>

				';
			}

			?>

		</div>
		<!--/berita populer-->
		<?php 

}

function beritaterbaru()
{
	?>
	<!--berita terkini-->
		<div class="bar-menu">
			Berita Terbaru
		</div>

		<div>
			<?php 
			global $connect;

			$terkini = mysqli_query($connect,"SELECT * FROM artikel WHERE Terbit='1' ORDER BY ID DESC LIMIT 0,10");

			while ($r = mysqli_fetch_array($terkini)) {
				extract($r);
				
				echo'
				<div class="side-box">
					<div class="img">
						<img src="'.URL_SITUS.$Gambar.'">
					</div>
					<span>'.substr($Tanggal, 0, 10).' </span>

					<h1><a href="./?open=detail&id='.$ID.'">'.$Judul.'</a></h1>
					<div class="clear"></div>
				</div>

				';
			}

			?>

		</div>
		<!--/berita terkini-->
		<?php 

}
function getBerita(){ 
	global $connect;

	$sql = mysqli_query($connect,"SELECT * FROM artikel WHERE Terbit='1' ORDER BY ID DESC LIMIT 0, 10");
	while ($b = mysqli_fetch_array($sql)) {
		extract($b);
	
	echo'
	<div class="card">
		<a href="./?open=detail&id='.$ID.'">
		  <img src="'.URL_SITUS.$Gambar.'" class="card-img-top " alt="..."></a>
		<div class="card-body">
		  <h5 class="card-title"><a href="./?open=detail&id='.$ID.'">Tafsir</a></h5>
		  <p class="card-text">'.substr(strip_tags($Isi),0,200).'</p>
		  <p class="card-text"><small class="text-muted">'.$Tanggal.'</small></p>
		</div>
	  </div>

	';
	}

}

?>