<?php

function open_connection(){
	//modify here
	$host = "localhost";
	$username = "root";
	$pass	= "";
	$dbname = "koperasi";

	$koneksi = mysqli_connect($host, $username, $pass, $dbname);

	if(mysqli_connect_errno()){
		die("Gagal melakukan koneksi ke MYSQL :" . mysqli_connect_error());
	}

	return $koneksi;
}

?>