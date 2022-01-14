<?php
session_start();
// mendapatkan id paket dari url
$id_paket = $_GET['id_paket'];

// jika sudah ada produk itu dikeranjang, maka produk itu jumlahnya di +1
if(isset($_SESSION['keranjang'][$id_paket])) {
    $_SESSION['keranjang'][$id_paket]+=1;
}
// jika tidak, maka produk itu dianggap dibeli 1
else{
    $_SESSION['keranjang'][$id_paket]=1;
}

// larikan ke halaman keranjang
echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>