<?php 

$connect = mysqli_connect('localhost','root','','cpannel');

if(mysqli_connect_errno()){

	echo "Gagal Koneksi ke Database ". mysqli_connect_error();
}

?>