<?php
//koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "langganan_tv_kabel");

function registrasi($data){
    global $koneksi;
    
    $nama = $_POST['nama'];
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $password2 = mysqli_real_escape_string($koneksi, $data['password2']);


    //cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT username from user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Username sudah terdaftar')</script>";
        return false;
    }

    //cek konfirmasi password
    if($password !== $password2){
        echo "<script>alert('Konfirmasi password tidak sesuai!!!')</script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama', '$username', '$password')");

    return mysqli_affected_rows($koneksi);
}

function query($sql_get){
    global $koneksi;
    $query_barang = mysqli_query($koneksi, $sql_get);

	$results = [];

	while ($row = mysqli_fetch_assoc($query_barang)) {
		$results[] = $row;
	}
    return $results;
}

function cari($keyword){
    $query = "SELECT * FROM paket WHERE 
            kode_paket LIKE '%$keyword%' OR 
            nama_paket LIKE '%$keyword%' OR 
            harga LIKE '%$keyword%' OR 
            keterangan LIKE '%$keyword%'";
    return query($query);
}

function caripelanggan($keyword){
    $query = "SELECT * FROM pelanggan WHERE 
            id_pelanggan LIKE '%$keyword%' OR 
            nama LIKE '%$keyword%' OR 
            jk LIKE '%$keyword%' OR 
            alamat LIKE '%$keyword%' OR
            telepon LIKE '%$keyword%'";
    return query($query);
}

function caripenjualan($keyword){
    $query = "SELECT * FROM berlangganan WHERE 
            id_transaksi LIKE '%$keyword%' OR 
            tgl_berlangganan LIKE '%$keyword%' OR
            id_pelanggan LIKE '%$keyword%' OR
            id_paket LIKE '%$keyword%'";
    return query($query);
}
?>