<?php

 $hostname = "localhost";
 $username = "root";
 $password = "";
 $database = "pomp_cibek"; 

 $koneksi = mysqli_connect($hostname,$username,$password,$database); 

 //cek
 if(!$koneksi){
 	die("koneksi gagal: ".mysqli_connect_error());
 } else {
 	echo "";
 }
?>
