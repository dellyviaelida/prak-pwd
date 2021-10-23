<html>
<head>
    <title>Tambah data mahasiswa</title>
</head>
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
    <form action="tambah.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nim</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Gender (L/P)</td>
                <td><input type="text" name="jkel"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td>Tgl Lahir</td>
                <td><input type="text" name="tgllhr"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <?php
    // jika tombol submit di klik, maka masukkan data ke tabel mahasiswa
    if(isset($_POST['Submit'])) {
        // tangkap data-data yang dikirim dari form
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jkel = $_POST['jkel'];
        $alamat = $_POST['alamat'];
        $tgllhr = $_POST['tgllhr'];
        // membuat koneksi ke database menggunakan file koneksi.php
        include_once("koneksi.php");
        // masukkan data mahasiswa ke tabel
        $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,jkel,alamat,tgllhr) 
        VALUES('$nim','$nama', '$jkel','$alamat','$tgllhr')");
        // menampilkan pesan ketika data ditambah
        echo "Data berhasil disimpan. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>