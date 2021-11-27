<?php
// membuat koneksi ke database menggunakan file koneksi.php
include "../koneksi.php";
// tangkap data-data yang dikirim dari form
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$pass = md5($_POST[password]);
// masukkan data users ke database
$sql = "INSERT INTO users(id_user,password, nama_lengkap, email, telp) VALUES ('$id_user','$pass','$nama','$email','$telp')";
$query = mysqli_query($con, $sql);
mysqli_close($con);
// arahkan ke file tampil_user.php
header('location:tampil_user.php');
?>