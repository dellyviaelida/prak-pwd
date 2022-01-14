<?php 

	require_once("koneksi.php");
    $kode_paket = $_GET['kode_paket'];

    $sql_get = "SELECT * FROM paket WHERE kode_paket = '$kode_paket'";
	$query_barang = mysqli_query($koneksi, $sql_get);

	$results = [];

	while ($row = mysqli_fetch_assoc($query_barang)) {
		$results[] = $row;
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

	<title>Pemesanan</title>
</head>
<body>
	<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.html">TVcable</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" href="home.html">HOME <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="dataproduk.php">Data PRODUK</a>
				<a class="nav-link" href="#">Data PELANGGAN</a>
				<a class="nav-link" href="#">Data PENJUALAN</a>
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Logout <img src="logout.png" height="16px"></a>
            </div>
            </div>
        </div>
      </nav>
    
	<section>

		<table class="table table-bordered mt-5">
			<thead>
				<tr>
                    <th scope="col">No</th>
                    <!-- <th scope="col">Kode</th> -->
                    <th scope="col">Nama Pesanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sub Harga</th>
                    <th scope="col">Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
                $totalbelanja = 0;
                $jumlah=1;
				foreach ($results as $result) :
				?>
				<tr>
					<th scope="row"> <?= $no; ?> </th>
                    <!-- <td> <?= $result['kode_paket']; ?> </td> -->
					<td> <?= $result['nama_paket']; ?> </td>
                    <td> <?= $result['harga']; ?> </td>
					<td> <?= $jumlah ?> </td>
					<td>Rp <?php $subharga = $result["harga"]*$jumlah; echo number_format($subharga,0,',','.'); ?></td>
					<td>
						|<a href="hapuspemesanan.php?kode_paket=<?=$result['kode_paket'];?>">Hapus</a>|
					</td>
				</tr>

				<?php 
				$no++;
                $totalbelanja+=$subharga;
				endforeach;
				?>
			</tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th colspan="2">Rp <?php echo number_format($totalbelanja,0,',','.') ?></th>
                </tr>
            </tfoot>
		</table>
		<!-- <form action="tambahproduk.php" method="post" align="center">
			<input type="submit" value="Tambah Data" class="tambah">
		</form> -->
		
		<!-- <button type="button" class="btn btn-primary">Tambah Data</button>
		<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button> -->
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