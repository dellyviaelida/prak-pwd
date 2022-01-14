<?php 
session_start();

if(!isset($_SESSION['login'])){
	header("location:login.php");
	exit;
}
	require 'functions.php';

	$produk = query("SELECT * FROM paket");
	
	if(isset($_POST['cari'])){
		$produk = cari($_POST['keyword']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="style.css">

	<title>Data Produk</title>
	<style type="text/css">
	*, body{
		margin: 0;
		padding: 0;
	}
	nav{
		width: 100%;
		height: 60px;
		background-color: white;
		box-shadow: -1px -7px 20px 0px #888;
    }
	a{
		font-size: 15px;
	}
	.nav-link:hover::after {
		border-bottom: 3px solid black;
	}
	input{
		padding: 5px;
	}
	.isian {
		margin: 80px 50px;
	}
	</style>
</head>
<body>
	<!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.html">TVcable</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link" href="home.php">HOME <span class="sr-only">(current)</span></a>
                <a class="nav-link active" href="dataproduk.php">Data PRODUK</a>
				<a class="nav-link" href="datapelanggan.php">Data PELANGGAN</a>
				<a class="nav-link" href="datapenjualan.php">Data PENJUALAN</a>
                <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Logout <img src="logout.png" height="16px"></a>
            </div>
            </div>
        </div>
    </nav>
    
	<section class="isian">
		<form action="" method="post" class="float-right">
			<input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
			<button type="submit" name="cari" class="btn btn-primary">Cari</button>
		</form>
		<a href="tambahproduk.php"><button type="button" class="btn btn-primary mb-3"><img src="plus.png" height="15px"> Tambah Data</button></a>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Kode Paket</th>
					<th scope="col">Nama Paket</th>
					<th scope="col">Jumlah Channel</th>
					<th scope="col">Biaya Berlangganan /bulan</th>
					<th scope="col">Gambar</th>
					<th scope="col">Keterangan</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 
				$no = 1;
				foreach ($produk as $result) :
				?>
				<tr>
					<th scope="row"> <?= $no; ?> </th>
					<td> <?= $result['kode_paket']; ?> </td>
					<td> <?= $result['nama_paket']; ?> </td>
					<td> <?= $result['jumlah_channel']; ?> </td>
					<td> <?= $result['harga']; ?> </td>
					<td><img src="produk/<?= $result['gambar']; ?>" width="100px"></td>
					<td> <?= $result['keterangan']; ?> </td>
					<td>
						|<a href="editdataproduk.php?id_paket=<?=$result['id_paket'];?>">Edit</a>|
						|<a href="hapusproduk.php?id_paket=<?=$result['id_paket'];?>">Hapus</a>|
					</td>
				</tr>

				<?php 
				$no++;
				endforeach;
				?>
			</tbody>
		</table>
	</section>

	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>
</html>