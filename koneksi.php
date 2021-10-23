<?php
// variabel-variabel inilah yang akan menampung nilai parameter fungsi mysqli_connect()
// parameter dalam fungsi mysqli_connect() terdiri dari alamat server, user, password, dan nama database
$host="localhost";
$username="root";
$password="";
$databasename="akademik1";
// fungsi mysqli_connect() digunakan untuk menghubungkan PHP dengan MySQL
$con=@mysqli_connect($host,$username,$password,$databasename);
// jika koneksi gagal (variabel $con bernilai false), maka akan muncul pesan error
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
?>