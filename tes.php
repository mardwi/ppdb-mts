<?php
session_start();
if(isset($_SESSION['nama']) && isset($_SESSION['identitas'])){
    header('location: langkah2.php');
};
include 'include.php';
sambung();
$anoun=mysql_fetch_array(mysql_query("select anoun from sistem"));
?>
<?php
require('fpdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Nama Lengkap :!');
$pdf->Cell(40,10,'Nama Lengkap :!');
$pdf->Cell(40,10,'Nama Lengkap :!');
$pdf->Cell(40,10,'Nama Lengkap :!');
$pdf->Cell(40,10,'Nama Lengkap :!');
$pdf->Output();
?>