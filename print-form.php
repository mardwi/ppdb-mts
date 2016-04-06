<?php
session_start();
include 'include.php';
if(!isset($_SESSION['identitas'])){
    header('location: index.php');
}
sambung();
$get_no=mysql_real_escape_string($_GET['no_reg']);
$s=mysql_query("select * from biodata_siswa where no_reg = '$get_no'");
$d=mysql_fetch_array($s);
?>
<html>
<head>
    <title>Print Formulir</title>
    <link rel='stylesheet' href='gaya.css'>
    <?php if($_GET['print']=='ya'){
        loging($_SESSION['identitas']." Print Formulir");
    echo "<script type='text/javascript'>javascript:window.print()</script>";
    mysql_query("update siswa set langkah='4' where no_reg='$get_no'");
    }; ?>
    <style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
}
.style2 {font-size: 16px}
-->
    </style>
</head>
<body>
<!-- tabel body -->
<table border='0' cellpadding='3' cellspacing='1' width='700' style='font-family: "time news roman"; font-size: 12px; background: #ffffff;'>
    <!-- kop -->
    <tr><td colspan='3' align="center" valign="top"><span class="style2"><?php include 'kop.php' ?>
    </span></td>
  </tr>
    <!-- kop -->
    <tr>
        <td colspan='3' align='center' class="header style1">FORMULIR PENDAFTARAN PESERTA DIDIK BARU MTSN BANGIL</td>
</tr>
    <tr>
        <td width='20'><!-- margin kanan --><br></td>
        <td>
        <!-- Bagian Tengah / Isi -->
            <!-- tabel kontent -->
            <table style='font-family: "time news roman"; font-size: 12px;' border='0' cellpadding='3' cellspacing='1' width='100%'>
                <tr>
                    <td colspan='3'><b>BIODATA CALON PESERTA DIDIK MTSN BANGIL</b></td><!-- SubJudul/Kategori -->
                    <td><!-- nomor formulir --></td>
                </tr>
                <!-- Isi Konten -->
                <tr>
                    <td width='200'>NOMOR REGISTRASI</td><td width='5'>:</td><td><?php echo $d['no_reg']; ?></td>
                    <!-- Foto -->
                    <td width='150' rowspan='10' valign='top'>
                        <table border='1' cellpadding='2' cellspacing='0'>
                            <tr>
                                <td>
                                    <img src='<?php $no=$d['no_reg']; $s=mysql_fetch_array(mysql_query("select foto from siswa where no_reg='$no'")); echo $s['foto']; ?>' width='150' height='188'>                                </td>
                            </tr>
                        </table>                    </td>
                    <!-- Foto -->
                </tr>
                <tr>
                    <td>NAMA LENGKAP</td><td width='5'>:</td><td><?php echo strtoupper( $d['nama']);
?></td>
                </tr>
                <tr>
                    <td>JENIS KELAMIN</td><td width='5'>:</td><td><?php echo strtoupper( $d['jkel']);
?></td>
              </tr>
                <tr>
                    <td>GOLONGAN DARAH</td><td width='5'>:</td><td><?php echo $d['gol_drh']; ?></td>
                </tr>
                <tr>
                    <td>BERAT/ TINGGI BADAN</td><td width='5'>:</td><td><?php echo $d['berat']." Kg / ".$d['tinggi']." Cm"; ?></td>
                </tr>
                <tr>
                    <td>TTL</td><td width='5'>:</td><td><?php echo strtoupper( $d['tem_lahir']);
?>, <?php echo $d['tgl']; ?>/<?php echo $d['bln']; ?>/<?php echo $d['tahun']; ?></td>
                </tr>
                <tr>
                    <td>ALAMAT</td><td width='5'>:</td><td><?php echo strtoupper( $d['alamat']);
?></td>
                </tr>
                <tr>
                    <td>KODE POS</td><td width='5'>:</td><td><?php echo $d['k_pos']; ?></td>
                </tr>
                
                <tr>
                    <td> SEKOLAH ASAL</td><td width='5'>:</td><td><?php echo strtoupper( $d['asal_sek']);
?></td>
                </tr>
                <!-- batas foto sampek sini -->
                <tr>
                    <td>ALAMAT SEKOLAH</td><td width='5'>:</td><td><?php echo strtoupper( $d['alamat_sek']);
?></td><td></td>
                </tr>
                <tr>
                    <td>TAHUN LULUS</td><td width='5'>:</td><td><?php echo $d['thn_lls']; ?></td><td></td>
                </tr>
                <tr>
                    <td>NO. IJAZAH</td><td width='5'>:</td><td><?php echo $d['no_ijazah']; ?></td><td></td>
                </tr>
                <tr>
                    <td>NO HP</td><td width='5'>:</td><td><?php echo $d['hp']; ?></td><td></td>
                </tr>
                <tr>
                    <td>EMAIL</td><td width='5'>:</td><td><?php echo $d['email']; ?></td><td></td>
                </tr>
                <tr>
                    <td>NILAI UN</td><td width='5'>:</td><td>MTK: <?php echo $d['mtk']; ?> BIN: <?php echo $d['bin']; ?> BIG: <?php echo $d['big']; ?> IPA: <?php echo $d['ipa']; ?></td><td></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                  <td width='5'>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td></td>
                </tr>
                <tr>
                    <td colspan='4'><b>DATA ORANG TUA/ WALI</b></td>
                </tr>
                <tr>
                    <td>AYAH</td><td width='5'>:</td><td><?php echo strtoupper( $d['ayah']);
?></td><td></td>
                </tr>
                <tr>
                    <td>IBU</td><td width='5'>:</td><td><?php echo strtoupper( $d['ibu']);
?></td><td></td>
                </tr>
                <tr>
                    <td>WALI</td><td width='5'>:</td><td><?php echo strtoupper( $d['wali']);
?></td><td></td>
                </tr>
                <tr>
                    <td>ALAMAT</td><td width='5'>:</td><td><?php echo strtoupper( $d['alamat_wali']);
?></td><td></td>
                </tr>
                <tr>
                    <td>NO HP</td><td width='5'>:</td><td><?php echo $d['hp_wali']; ?></td><td></td>
                </tr>
                <tr>
                    <td>PEKERJAAN</td><td width='5'>:</td><td><?php echo strtoupper( $d['kerja_wali']);
?></td><td></td>
                </tr>
                <tr>
                    <td colspan='4'><br></td>
                </tr>
                <tr>
                    <td colspan='4' align='center'>&nbsp;</td>
              </tr>
                <!-- Isi Konten -->
      </table>      </td>
        <td width='20'><!-- margin kiri --></td>
    </tr>
</table>   
</body>
    
</html>