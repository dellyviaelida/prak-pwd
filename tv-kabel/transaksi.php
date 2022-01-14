<?php 
session_start();

require 'functions.php';
$id = $_SESSION['pelanggan']['id'];
$total = $_SESSION['subharga'];

foreach ($_SESSION['keranjang'] as $id_paket=>$jumlah){
    $sql = "INSERT INTO berlangganan VALUES('', '".date("Y-m-d")."', '$total', '$id', '".$id_paket."')";
    $query = mysqli_query($koneksi, $sql);
}
unset($_SESSION['keranjang']);

header("Location:checkout.php");
?>