<?php
include_once('../inc/fungsi.php');
include_once('../inc/define.php');

session_start();

if(isset($_GET["keluar"]) && $_GET["keluar"]=='yes'){
	session_destroy();
	header('Location:index.php');
}

include_once("../inc/koneksi.php");

if (isset($_POST["submit"] ) ) {
	
	global $connect;

	$username = mysqli_real_escape_string($connect,$_POST['username']);
	$password = mysqli_real_escape_string($connect,$_POST['password']);


	$sql 	= "SELECT * FROM administrator WHERE username='".$username."' AND password='".$password."' ";

	$result = mysqli_query($connect,$sql);
	$numrow	= mysqli_num_rows($result);

	$r = mysqli_fetch_array($result);

	if($numrow > 0)
	{
		$_SESSION["loginadmin"] = $r['username'];
		$_SESSION["loginadminid"] = $r['ID'];
		$_SESSION["loginadminemail"] = $r['email'];
		$_SESSION["loginadminnama"] = $r['Nama'];

	}else{

		$error =  "User dan Password tidak cocok";

		header('Location:index.php?error='.$error.'');
		exit;

	}



}

if(empty($_SESSION["loginadmin"]))
{

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="icon" type="image/png" href="../assets/img/icon.jpg" class="icon">
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>

<div class="w20 fn loginpage" style="background-color: #343a40!important;">
	<div >
		<img src="<?=URL_SITUS.PATH_LOGO.'/'.FILE_LOGO;?>" width="50px"  alt="Bukan Ustadz"> <span class="text"
		style="font-family:-apple-system,BlinkMacSystemFont,;font-size: 48px;color:yellowgreen;"> Bukan
        Ustadz</span>
		
	</div>

	<div class="clear pd5"></div>
	
	<form action="" method="POST">
		<div class="user">
			<label style="color: white;">Username</label><br>
			<input type="text" name="username" placeholder="Username" class="form100">
		</div>

		<div class="user">
			<label style="color: white;">Password</label><br>
			<input type="password" name="password" placeholder="Password" class="form100" >
		</div>

		<input type="submit"   name="submit" value="Login" style="margin-top: 20px;width:100px;">

	</form>

</div>

</body>
</html>
<?php 
exit;
}
 ?>
