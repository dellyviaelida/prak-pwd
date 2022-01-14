<?php 
session_start();

$id_paket = $_GET['id_paket'];

unset($_SESSION["keranjang"][$id_paket]);

echo "<script>alert('Produk telah dihapus');</script>"; 
echo "<script>location= 'keranjang.php'</script>";


?>