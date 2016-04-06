<?php session_start(); ?>
<!-- COPYRIGHT 2012 BY SUCIPTO A.K.A ShowCheap  -->
<html lang='en'>
<head>
    <title>Pendaftaran Siswa Baru [Online] - MTSN BANGIL </title>
    <link rel='stylesheet' href='gaya.css'>
    <link rel="Shortcut Icon" href="img/favicon.ico" type="image/x-icon" />
    <script type='text/javascript' src='jquery.js'></script>
    <script type='text/javascript' src='trik.js'></script>
</head>
<body>
<?php
include 'include.php';
//validasi form login
$pencet=$_POST['tmbl'];
sambung();
$nama=mysql_real_escape_string($_POST['no']);
$kunci=mysql_real_escape_string($_POST['kunci']);
//jika menekan tmbol login & nama tidak kosong
if ($pencet != '' && $nama != '' && $kunci != ''){
    //jalankan query
    
    $s=mysql_query("select nama, no_reg, kunci from biodata_siswa where no_reg='".$nama."' and kunci='".$kunci."'");
    //cek banyak data
    $c=mysql_num_rows($s);
    //jika data cocok
    if($c == '1'){
      $t= mysql_fetch_array($s);
      $_SESSION['nama']=$t['nama'];
      $_SESSION['identitas']=$t['no_reg'];
      loging($_SESSION['nama']." Login");
    }else{
        echo "<center><div id='peringatan' align='center'><img src='img/icon/0.png'> <br><b>Kombinasi Nomor Registrasi dan Kunci tidak cocok !!</b></div></center>";
        loging($nama." Login Gagal.");
    }
};
if(empty($_SESSION['identitas'])){


?>
<center>

<div align='center' id='login' width='500'>
<img src='img/icon/gembok.png'><br><b>Silahkan Login Terlebih Dahulu !</b>
<?php
masuk('');
//echo $_POST['kunci'];
}else{
    header('location: langkah2.php');
};

?>
Belum Punya No. Registrasi? Silahkan <a href='index.php'>Daftar</a> Terlebih dahulu.
</div>
</center>
</body>
</html>