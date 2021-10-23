<?php
// membuat koneksi ke database menggunakan file koneksi.php
include_once("koneksi.php");
// tangkap data nim dari URL untuk dihapus datanya
$nim = $_GET['nim'];
// menghapus data pada table mahasiswa yang sesuai dengan nim yang dikirimkan tadi
$result = mysqli_query($con, "DELETE FROM mahasiswa WHERE nim='$nim'");
// setelah dihapus arahkan ke halaman utama untuk menampilkan data mahasiswa terbaru
header("Location:index.php");
?>