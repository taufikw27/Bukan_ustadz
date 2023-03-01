
<div class="mainpage">

	<div class="content">

		
		<div class="clear"></div>



	</div>

	<div class="clear"></div>

</div>
<!-- menu artikel -->
<div class="container">
    <div class="row">
      <!-- menu -->
      <div class="col-12 col-lg-8 col-md-12 col-sm-12 text-justify menu">
	  <?php 
	  include('inc/define.php');
		include('inc/koneksi.php');
		$id = (isset($_GET['id']) ? $_GET['id'] : '');

		global $connect;

		$sql = mysqli_query($connect,"SELECT * FROM artikel WHERE Terbit='1' AND ID = '".$id."' ");
		while ($b = mysqli_fetch_array($sql)) {
		extract($b);

		$Updateviewnum = mysqli_query($connect,"UPDATE artikel SET Viewnum=Viewnum+1 WHERE ID = '".$id."' ");
		
		echo'
		
		<img src="'.URL_SITUS.$Gambar.'" class="img-judul" style="margin-top:30px;" alt="">
        <h2 class="judul font-weight-bold">'.$Judul.'</h2>
        <br>
        <p>'.nl2br($Isi).'</p>
       
        <br>
        <span class="arti">'.$Tanggal.'</span><span> Update by: '.$Updateby.' </span>
      </div>
		';
		}
		?>
    <?php
    include('account.php');
    ?>
      <!-- akhir menu -->
