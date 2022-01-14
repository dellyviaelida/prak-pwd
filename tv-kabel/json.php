<?php
include "functions.php"; 

$sql="SELECT * FROM pelanggan order by id_pelanggan";
$tampil = mysqli_query($koneksi,$sql);
if (mysqli_num_rows($tampil) > 0) {
    $no=1;
    $response = array();
    $response["data"] = array();
    while ($r = mysqli_fetch_array($tampil)) {
        $h['id_pelanggan'] = $r['id_pelanggan'];
        $h['nama'] = $r['nama'];
        $h['jk'] = $r['jk'];
        $h['alamat'] = $r['alamat'];
        $h['telepon'] = $r['telepon'];
        array_push($response["data"], $h);
    }
    echo json_encode($response);
}
else {
    $response["message"]="tidak ada data";
    echo json_encode($response);
}
?>