<?php 
require 'functions.php';

if (isset($_POST['submit'])) {
    $kode_paket = $_POST['kode_paket'];
	$nama_paket = $_POST['nama_paket'];
	$jumlah_channel = $_POST['jumlah_channel'];
	$harga = $_POST['harga'];
	$keterangan = $_POST['keterangan'];
	$nama_file = $_FILES['gambar']['name'];
	$tmp_name = $_FILES['gambar']['tmp_name'];

	$type1 = explode('.', $nama_file);
	$type2 = $type1[1];

	$newname = 'produk'.time().'.'.$type2;
	$tipe_diizinkan = array('jpg', 'jpeg', 'png');

	if(!in_array($type2, $tipe_diizinkan)){
		echo '<script>alert("Format file tidak diizinkan")</script>';
	}
	else{
		move_uploaded_file($tmp_name, './produk/'.$newname);
		$sql_insert = mysqli_query($koneksi, "INSERT INTO paket VALUES(	'', '".$kode_paket."',
																		'".$nama_paket."',
																		'".$jumlah_channel."',
																		'".$harga."',
																		'".$newname."',
																		'".$keterangan."')");

		if($sql_insert){
			header("Location:dataproduk.php");
		}
		else{
			echo 'gagal '.mysqli_error($koneksi);
		}
	}
}
?>

<?php include 'header.php'; ?>

	<h1>Tambah Data</h1>

	<form action="tambahproduk.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" name="kode_paket" class="form-control" placeholder="Kode Paket" required="" autofocus="">
		</div>

		<div class="form-group">
			<input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" required="">
		</div>

		<div class="form-group">
			<input type="number" name="jumlah_channel" class="form-control" placeholder="Jumlah Channel" required="">
		</div>
		
		<div class="form-group">
			<input type="number" name="harga" class="form-control" placeholder="Harga" required="">
		</div>

		<div class="form-group">
			<input type="file" name="gambar" class="form-control-file">
		</div>

		<div class="form-group">
			<textarea class="form-control" name="keterangan" placeholder="Keterangan" rows="2" required=""></textarea>
		</div>
		<button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
	</form>

<?php 
	include 'footer.php';
?>