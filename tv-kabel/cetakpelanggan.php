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
$pdf->Cell(190,7,'DAFTAR PELANGGAN TV KABEL',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'ID',1,0);
$pdf->Cell(50,6,'NAMA PELANGGAN',1,0);
$pdf->Cell(25,6,'J KEL',1,0);
$pdf->Cell(50,6,'ALAMAT',1,0);
$pdf->Cell(30,6,'TELEPON',1,1);
$pdf->SetFont('Arial','',10);
require 'functions.php';
$pelanggan = mysqli_query($koneksi, "select * from pelanggan");
while ($row = mysqli_fetch_array($pelanggan)){
    $pdf->Cell(20,6,$row['id_pelanggan'],1,0);
    $pdf->Cell(50,6,$row['nama'],1,0);
    $pdf->Cell(25,6,$row['jk'],1,0);
    $pdf->Cell(50,6,$row['alamat'],1,0);
    $pdf->Cell(30,6,$row['telepon'],1,1); 
}
$pdf->Output();
?>