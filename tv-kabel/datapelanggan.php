<?php 
session_start();

if(!isset($_SESSION['login'])){
	header("location:login.php");
	exit;
}

require 'functions.php';

$pelanggan = query("SELECT * FROM pelanggan");
	
if(isset($_POST['cari'])){
	$pelanggan = caripelanggan($_POST['keyword']);
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

	<title>Data Pelanggan</title>
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
                <a class="nav-link" href="dataproduk.php">Data PRODUK</a>
				<a class="nav-link active" href="datapelanggan.php">Data PELANGGAN</a>
				<a class="nav-link" href="datapenjualan.php">Data PENJUALAN</a>
                <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Logout <img src="logout.png" height="16px"></a>
            </div>
            </div>
        </div>
    </nav>
	<!-- Akhir Navbar -->

	<section class="isian">
		<form action="" method="post" class="float-right mb-3">
			<input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
			<button type="submit" name="cari" class="btn btn-primary">Cari</button>
		</form>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Id Pelanggan</th>
					<th scope="col">Nama</th>
					<th scope="col">Jenis Kelamin</th>
					<th scope="col">Alamat</th>
					<th scope="col">No HP</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$no = 1;
			foreach ($pelanggan as $result) :
			?>
			<tr>
				<th scope="row"> <?= $no; ?> </th>
				<td> <?= $result['id_pelanggan']; ?> </td>
				<td> <?= $result['nama']; ?> </td>
				<td> <?= $result['jk']; ?> </td>
				<td> <?= $result['alamat']; ?> </td>
				<td> <?= $result['telepon']; ?> </td>
			</tr>
			<?php 
			$no++;
			endforeach;
			?>
			</tbody>
		</table>
		<a href="json.php"><button type="button" class="btn btn-primary mb-3">JSON</button></a>
		<a href="xml.php"><button type="button" class="btn btn-primary mb-3">XML</button></a>
	</section>
</body>
</html>