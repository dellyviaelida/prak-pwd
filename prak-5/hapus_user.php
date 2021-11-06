<?php
// membuat koneksi ke database menggunakan file koneksi.php
include "../koneksi.php";
// menghapus data pada table userd yang sesuai dengan id yang dikirimkan tadi
$sql="delete from users where id_user= '$_GET[id]'";
mysqli_query($con, $sql);
mysqli_close($conn);
// arahkan ke file tampil_user.php
header('location:tampil_user.php');
?>