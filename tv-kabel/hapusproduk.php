<?php 
require_once("koneksi.php");

$id_paket = $_GET['id_paket'];

$sql_produk = mysqli_query($koneksi, "SELECT gambar FROM paket WHERE id_paket = '$id_paket'");
$p = mysqli_fetch_object($sql_produk);

unlink('./produk/'.$p->gambar);

$sql_delete = "DELETE FROM paket WHERE id_paket = '$id_paket'";
mysqli_query($koneksi, $sql_delete);

header("Location:dataproduk.php");
?>