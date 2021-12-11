<?php
// membuat koneksi ke database menggunakan file koneksi.php
include_once("../koneksi.php");
// ambil semua data yang ada pada tabel mahasiswa
$result = mysqli_query($con, "SELECT * FROM mahasiswa ");
?>
<html>
<head> 
    <title>Halaman Utama</title>
</head>
<body>
    <h2 style="text-align:center;">PROGRAM STUDI TEKNIK INFORMATIKA<br/>DAFTAR MAHASISWA MAKUL PEMROGRAMAN WEB DINAMIS</h2><br/>
    <table width='80%' border=1 style="border-collapse: collapse;margin-left: auto;margin-right: auto;">
        <tr>
            <th>Nim</th> <th>Nama</th> <th>Gender</th> <th>Alamat</th> 
            <th>Tgl Lahir</th>
        </tr>
        <?php 
        while($user_data = mysqli_fetch_array($result)) { 
            echo "<tr>";
            echo "<td>".$user_data['nim']."</td>";
            echo "<td>".$user_data['nama']."</td>";
            echo "<td>".$user_data['jkel']."</td>";
            echo "<td>".$user_data['alamat']."</td>"; 
            echo "<td>".$user_data['tgllhr']."</td>";
        }
        ?>
    </table>
    <script>
		window.print();
	</script>
</body>
</html>
