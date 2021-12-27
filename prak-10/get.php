<?php
// buat koneksi ke database
include '../koneksi.php';
// apakah ada data yang dikirimkan
// jika ada, jalankan perintah berikut:
if(isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    // buat query untuk mencari data berdasarkan nim
    $sql="select * from mahasiswa where nim = '$cari'";
}
// jika tidak, jalankan perintah berikut:
else {
    // buat query untuk menampilkan seluruh data mahasiswa
    $sql="select * from mahasiswa";
}
// jalankan perintah query dengan menggunakan fungsi mysqli_query()
$tampil = mysqli_query($con,$sql);
// hasil data tersebut akan ubah menjadi array
while ($row = mysqli_fetch_assoc($tampil)) {
    $data[] = $row;
}
// deklarasi header
header('content-type: application/json');
// konversi array PHP tadi ke format JSON dan tampilkan
echo json_encode($data);
// menutup koneksi ke database
mysqli_close($con);
?>