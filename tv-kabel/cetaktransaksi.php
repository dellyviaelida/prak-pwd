<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'DAFTAR TRANSAKSI PEMBELIAN PAKET TV KABEL',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'ID',1,0,'C');
$pdf->Cell(50,6,'TGL BERLANGGANAN',1,0,'C');
$pdf->Cell(40,6,'TOTAL BAYAR',1,0,'C');
$pdf->Cell(50,6,'NAMA PELANGGAN',1,0,'C');
$pdf->Cell(40,6,'NAMA PAKET',1,1,'C');
$pdf->SetFont('Arial','',10);
require 'functions.php';
$totalpemasukan = 0;
$pelanggan = mysqli_query($koneksi, "select * from berlangganan
                                    inner join pelanggan on berlangganan.id_pelanggan = pelanggan.id_pelanggan
                                    inner join paket on berlangganan.id_paket = paket.id_paket");
while ($row = mysqli_fetch_array($pelanggan)){
    $pdf->Cell(10,6,$row['id_transaksi'],1,0,'C');
    $pdf->Cell(50,6,$row['tgl_berlangganan'],1,0,'C');
    $pdf->Cell(40,6,$row['total_bayar'],1,0,'C');
    $pdf->Cell(50,6,$row['nama'],1,0,'C');
    $pdf->Cell(40,6,$row['nama_paket'],1,1,'C');
    $totalpemasukan+= $row['total_bayar'];
}
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,6,'Total',1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(130,6,$totalpemasukan,1,0,'C');
$pdf->Output();
?>