<?php 
if (isset($_POST['tambahuser'])) {

	global $connect;
	
	$sql = mysqli_query($connect, "SELECT * FROM administrator WHERE username='".$_POST['username']."' OR email ='".$_POST['email']."' ");
	$hasil = mysqli_num_rows($sql);

	if ($hasil > 0) {
		
		$error = "Username dan email sudah pernah didaftarkan";

	}else{

		$sql = mysqli_query($connect,"INSERT INTO administrator (Nama,username,password,email) VALUES ('".$_POST['nama']."','".$_POST['username']."','".$_POST['password']."','".$_POST['email']."')  ");

		$error = "Berhasil menambahkan user admin baru";

	}

}

if (isset($_POST['edituser'])) {


	$sql = mysqli_query($connect, "UPDATE administrator SET username='".$_POST['username']."', Nama ='".$_POST['nama']."', email='".$_POST['email']."' WHERE ID = '".$_POST['userid']."' ");

	}


if (isset($_GET['act']) && $_GET['act']=='edit') {

	$id = (int)$_GET['id'];
	
	$sql = mysqli_query($connect,"SELECT * FROM administrator WHERE ID = '$id' ");
	while($r = mysqli_fetch_array($sql)) {
		extract($r);

		$ID = $ID;
		$Nama = $Nama;
		$username = $username;
		$email = $email;
		$ID = $ID;
	}


}

if (isset($_GET['act']) && $_GET['act']=='hapus') {

	$id = (int)$_GET['id'];
	
	$sql = mysqli_query($connect,"DELETE FROM administrator WHERE ID = '$id' ");


}

?>

<br>
<form action="./?mod=useradmin" method="POST">
	<input type="hidden" name="userid" value="<?=(isset($ID) ? $ID : '');?>">
	<fieldset>
		<legend>Tambah user</legend>

	<div class="formnama">
		<label>Nama User</label><br>
		<input type="text" name="nama" placeholder="Nama Lengkap" value="<?=(isset($Nama) ? $Nama : '');?>">
	</div>

	<div class="formnama">
		<label>Username</label><br>
		<input type="text" name="username" placeholder="Username" value="<?=(isset($username) ? $username : '');?>">
	</div>

	<div class="formnama">
		<label>Password</label><br>
		<input type="password" name="password" placeholder="Password">
	</div>

	<div class="formnama">
		<label>Email</label><br>
		<input type="text" name="email" placeholder="Email address" value="<?=(isset($email) ? $email : '');?>">
	</div>

	<input type="submit" name="<?=(isset($ID) ? 'edituser' : 'tambahuser');?>" value="<?=(isset($ID) ? 'Edit' : 'Tambah');?>">

	</fieldset>
</form>

<fieldset>
	<legend>List user</legend>

	<div class="w100 fl list">
		<hr>
		<div class="w10 bold fl">No.</div>
		<div class="w30 bold fl">Username</div>
		<div class="w20 bold fl">Nama</div>
		<div class="w20 bold fl">Email</div>
		<div class="w20 bold fl">Aksi</div>
		<div class="clear"></div>
	</div>
		<hr>
		
		<?php 
		$i= 1;

		$sql = mysqli_query($connect,"SELECT * FROM administrator ORDER BY ID ASC");
		while($r = mysqli_fetch_array($sql)){
			extract($r);

		 ?>
		 <div class="w100 fl list">
			<div class="w10 fl"><?=$i++?></div>
			<div class="w30 fl"><?=$username?></div>
			<div class="w20 fl"><?=$Nama?></div>
			<div class="w20 fl"><?=$email?></div>
			<div class="w20 fl">
			<a href="./?mod=useradmin&act=edit&id=<?=$ID?>" class="small btn btn-primary">Edit</a> <a href="./?mod=useradmin&act=hapus&id=<?=$ID?>" class="small btn btn-red">Hapus</a></div>
			<div class="clear"></div>
		</div>
		<?php }
		?>
	

</fieldset>

<div class="clear"></div>