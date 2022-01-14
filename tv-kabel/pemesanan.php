<?php 
require_once("koneksi.php");

if (isset($_POST['lanjut'])) {
	$tgl_berlangganan = $_POST['tgl_berlangganan'];
	$total_bayar = $_POST['total_bayar'];
	$id_pelanggan = $_POST['id_pelanggan'];
	$id_paket = $_POST['id_paket'];

	$sql_insert = "INSERT INTO berlangganan VALUES('', '".$tgl_berlangganan."', '".$total_bayar."', '".$id_pelanggan."', '".$id_paket."')";
	mysqli_query($koneksi, $sql_insert);

	header("Location:produk.php");
}
?>

<?php include 'header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card p-4 mt-5 shadow-lg border-0">
                <h4 class="py-3 text-center">Pemesanan</h4>
                <form action="" method="POST">
                    <div class="form-group">
						<input type="date" name="tgl_berlangganan" class="form-control rounded-pill" required="">
                    </div>
                    <div class="form-group">
						<input type="number" placeholder="Total Bayar" name="total_bayar" class="form-control rounded-pill" required="">
                    </div>
					<div class="form-group">
						<input type="number" placeholder="ID Pelanggan" name="id_pelanggan" class="form-control rounded-pill" required="">
                    </div>
                    <div class="form-group">
						<input type="text" placeholder="ID Paket" name="id_paket" class="form-control rounded-pill" required="" autofocus="">
                    </div>
                    <div class="tombol float-right">
                        <input type="submit" value="Lanjutkan" name="lanjut" class="btn btn-primary rounded-pill">
                    </div>
                </form>
                <p class="my-1 mt-3 text-center small">Copyright &copy; 2021 All Rights Reserved by TVcable</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>