<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "bissmillah";
$connect = mysqli_connect($host, $username, $password, $db);

//cek koneksi database
if(mysqli_connect_error()){
    //menyampaikan pesan error ketika koneksi gagal
    echo mysqli_connection_error();
}else{
    echo "Koneksi Berhasil";
}
?>
