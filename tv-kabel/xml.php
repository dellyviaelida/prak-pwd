<?php
include "functions.php"; 
header('Content-Type: text/xml');
$query = "SELECT * FROM pelanggan";
$hasil = mysqli_query($koneksi,$query);
$jumField = mysqli_num_fields($hasil);

echo "<?xml version='1.0'?>";
echo "<data>";
while ($data = mysqli_fetch_array($hasil))
{
    echo "<pelanggan>";
    echo"<id>",$data['id_pelanggan'],"</id>";
    echo"<nama>",$data['nama'],"</nama>";
    echo"<jkel>",$data['jk'],"</jkel>";
    echo"<alamat>",$data['alamat'],"</alamat>";
    echo"<telp>",$data['telepon'],"</telp>";
    echo "</pelanggan>";
}
echo "</data>";
?>