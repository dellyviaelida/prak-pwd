<?php
echo "<h2>User</h2>
<form method=POST action=form_user.php>
<input type=submit value='Tambah User'>
</form>
<table>
<tr><th>No</th><th>Username</th><th>Nama Lengkap</th><th>Email</th><th>No. Telepon</th><th>Aksi</th></tr>";
// membuat koneksi ke database menggunakan file koneksi.php
include "../koneksi.php";
// ambil semua data yang ada pada tabel users dan urutkan berdasarkan id_user
$sql = "select * from users order by id_user";
$tampil = mysqli_query($con,$sql);
// jika data ada
if (mysqli_num_rows($tampil) > 0) {
    $no=1;
    while ($r = mysqli_fetch_array($tampil)) {
        echo "<tr><td>$no</td><td>$r[id_user]</td>
        <td>$r[nama_lengkap]</td>
        <td>$r[email]</td>
        <td>$r[telp]</td>
        <td><a href='hapus_user.php?id=$r[id_user]'>Hapus</a></td>
        </tr>";
        $no++;
    }
    echo "</table>";
}
// jika data tidak ada
else {
    echo "0 results";
}
mysqli_close($con);
?>