<?php
// set nilai awal variabel $search
$search='NIM';
// apakah tombol submit diklik
// jika iya, jalankan perintah berikut:
if(isset($_POST['submit'])) {
    // apakah input "cari" kosong?
    // jika iya, set variabel $search='NIM'
    // namun jika tidak, set variabel $search=strtoupper($_POST['cari'])
    // fungsi strtoupper() berguna untuk mengkonversi string menjadi uppercase
    $search = empty($_POST['cari']) ? 'NIM' : strtoupper($_POST['cari']);
    // set alamat url yang menyediakan data JSON ditambah ?cari=keyword
    $url = "http://localhost/PWD/prak-pwd/prak-10/get.php?cari=" . $_POST['cari'];
    error_reporting(0);
}
// jika tidak, jalankan perintah berikut:
else {
    // set alamat url yang menyediakan data JSON
    $url = "http://localhost/PWD/prak-pwd/prak-10/get.php";
}
?>

<h3>Cari[<?=$search?>]</h3>
<!-- buat form untuk search field -->
<form action="" method="POST">
    <input type="text" name="cari">
    <input type="submit" name="submit">
</form>

<?php
// karena webservice menyediakan data berupa JSON, sehingga kita akan mengambil data JSON dengan CURL
// berikut ini, inisialisasi dengan fungsi curl_init()
$client = curl_init($url);
// mengembalikan transfer menjadi bentuk string
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
// melakukan HTTP Request sesuai dengan options yang diberikan dan mengeksekusinya
$response = curl_exec($client);
// ubah data json menjadi data array asosiatif
$result = json_decode($response);
// tampilkan datanya
foreach ($result as $r) {
    echo "<p>";
    echo "NIM : " . $r->nim . "<br />";
    echo "Nama : " . $r->nama . "<br />";
    echo "jenis kel : " . $r->jkel . "<br />";
    echo "Prodi : " . $r->prodi . "<br />";
    echo "Alamat : " . $r->alamat . "<br />";
    echo "Tgl Lahir : " . $r->tgllhr . "<br />";
    echo "</p>";
}
?>