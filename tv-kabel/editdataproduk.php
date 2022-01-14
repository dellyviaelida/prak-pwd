<?php 
require_once("koneksi.php");

$id_paket = $_GET['id_paket'];

$sql_cari = "SELECT * FROM paket WHERE id_paket = '$id_paket'";
$query = mysqli_query($koneksi, $sql_cari);
$result = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
	$id_paket = $_POST['id_paket'];
	$kode_paket = $_POST['kode_paket'];
	$nama_paket = $_POST['nama_paket'];
	$jumlah_channel = $_POST['jumlah_channel'];
	$harga = $_POST['harga'];
	$keterangan =  $_POST['keterangan'];
	$gambar = $_POST['gambar'];

	$nama_file = $_FILES['gambar']['name'];
	$tmp_name = $_FILES['gambar']['tmp_name'];

	if($nama_file != ''){
		$type1 = explode('.', $nama_file);
		$type2 = $type1[1];

		$newname = 'produk'.time().'.'.$type2;
	
		$tipe_diizinkan = array('jpg', 'jpeg', 'png');

		if(!in_array($type2, $tipe_diizinkan)){
			echo '<script>alert("Format file tidak diizinkan")</script>';
		}
		else{
			unlink('./produk/'.$gambar);
			move_uploaded_file($tmp_name, './produk/'.$newname);
			$nama_gambar = $newname;
		}
	}
	else{
		$nama_gambar = $gambar;
	}
	
	$sql_ubah = mysqli_query($koneksi, "UPDATE paket SET	kode_paket = '$kode_paket', 
															nama_paket = '$nama_paket', 
															jumlah_channel = '$jumlah_channel', 
															harga = '$harga', 
															gambar = '$nama_gambar', 
															keterangan = '$keterangan' 
															WHERE id_paket = '$id_paket'");
	if($sql_ubah){
		header("Location:dataproduk.php");
	}
	else{
		echo 'gagal '.mysqli_error($koneksi);
	}	

}
?>

<?php include 'header.php'; ?>

	<h1>Edit Data</h1>

	<form action="editdataproduk.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id_paket" class="form-control" value="<?= $result['id_paket']; ?>">
		<div class="form-group">
			<input type="text" name="kode_paket" class="form-control" placeholder="Kode Paket" value="<?= $result['kode_paket']; ?>">
		</div>

		<div class="form-group">
			<input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" value="<?= $result['nama_paket']; ?>">
		</div>

		<div class="form-group">
			<input type="number" name="jumlah_channel" class="form-control" placeholder="Jumlah Channel" value="<?= $result['jumlah_channel']; ?>">
		</div>
		
		<div class="form-group">
			<input type="number" name="harga" class="form-control" placeholder="Harga" value="<?= $result['harga']; ?>">
		</div>

		<div class="form-group">
			<img src="produk/<?php echo $result['gambar'] ?>" width='100px'>
			<input type="hidden" name="gambar" value="<?php echo $result['gambar'] ?>">
		</div>

		<div class="form-group">
			<input type="file" name="gambar" class="form-control-file">
		</div>

		<div class="form-group">
			<textarea class="form-control" name="keterangan" placeholder="Keterangan" rows="2"><?= $result['keterangan']; ?></textarea>
		</div>
		<button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
	</form>

<?php 
	include 'footer.php';
?>