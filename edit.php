<?php
// membuat koneksi ke database menggunakan file koneksi.php
include_once("koneksi.php");
// jika tombol update diklik, maka data akan terupdate dan mengarah ke halaman utama
if(isset($_POST['update'])) {
    // tangkap data-data yang dikirim dari form
    $nim = $_POST['nim'];
    $nama=$_POST['nama'];
    $jkel=$_POST['jkel'];
    $alamat=$_POST['alamat'];
    $tgllhr=$_POST['tgllhr'];
    // update data mahasiswa
    $result = mysqli_query($con, "UPDATE mahasiswa SET 
    nama='$nama',jkel='$jkel',alamat='$alamat',tgllhr='$tgllhr' WHERE nim='$nim'");
    // arahkan ke halaman utama untuk menampilkan hasil update
    header("Location: index.php");
}
?>

<?php
// tangkap data nim yang dikirimkan melalui URL
$nim = $_GET['nim'];
// mengambil data dari database dan menampilkannya berdasarkan nim yang ditangkap
$result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");
// mengubah data dari hasil query menjadi array dengan menggunakan fungsi mysqli_fetch_assoc()
while($user_data = mysqli_fetch_array($result))
{
    $nim = $user_data['nim'];
    $nama = $user_data['nama'];
    $jkel = $user_data['jkel'];
    $alamat = $user_data['alamat'];
    $tgllhr = $user_data['tgllhr'];
}
?>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    <form name="update_mahasiswa" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Gender</td>
                <td><input type="text" name="jkel" value=<?php echo $jkel;?>></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr> 
                <td>Tgl Lahir</td>
                <td><input type="text" name="tgllhr" value=<?php echo $tgllhr;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nim" value=<?php echo $_GET['nim'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>