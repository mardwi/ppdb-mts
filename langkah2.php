<?php
session_start();
include 'include.php';
//logout
if($_GET['sesi']=='selesai'){
   loging($_SESSION['nama']." Keluar");
   unset($_SESSION['nama']);
   unset($_SESSION['identitas']);
   header('location: masuk.php');
};
//chek jika belum ada sesi
if(empty($_SESSION['nama']) && empty($_SESSION['identitas'])){
    header('location: masuk.php');
};



//mendefinisikan sesi menjadi value
$nama=$_SESSION['nama'];
$iden=$_SESSION['identitas'];
if($_GET['confirm']=='ok'){
    echo "<script type='text/javascript'>alert('Terimakasih ".$_SESSION['nama'].", Anda Telah terdaftar dalam sistem Kami !!')</script>";
    loging($_SESSION['nama']." Langkah 2");    
    sambung();    
    mysql_query("update siswa set langkah='2' where no_reg='$iden'");
};



//upload foto//
if ($_POST['unggah'] && !empty($_FILES['the_file'])){
    $file_name = $_FILES['the_file']['name']; //Membaca nama file 
    $size = $_FILES['the_file']['size']; //Membaca ukuran file 
    $file_type = $_FILES['the_file']['type']; //Membaca jenis file 
    $dir="img/upload";// Nama Folder 
    $source = $_FILES['the_file']['tmp_name']; //Source tempat upload file sementara 
    $direktori = "$dir/$file_name";
    $file_path="upload/".$iden.substr($file_name, -4);
    //echo $file_type;
    //echo $size;
    $awas=getimagesize($source);
    if($awas){
      if($file_type == 'image/png' or $file_type == 'image/jpeg' or $file_type == 'image/gif' or $file_type == 'image/pjpeg' ){
          if (move_uploaded_file($source,$file_path)){
          loging($_SESSION['nama']." Unggah Foto");
          echo "<script type='text/javascript'>alert('Masuk ke halaman anda dan Silahkan cetak formulir')</script>";
          sambung();
          mysql_query("update siswa set foto='$file_path', langkah='3' where no_reg='$iden'");
          }else { 
          echo "<script type='text/javascript'>alert('Foto Gagal Di Upload')</script>"; 
          }
      }else{ echo "<script type='text/javascript'>alert('Bukan File Gambar !!')</script>";}
    }else{
      echo "<script type='text/javascript'>alert('Bukan File Gambar !!')</script>";
    }
};
//upload foto//
sambung();
$umum=mysql_fetch_array(mysql_query("select anoun from sistem"));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>FORMULIR PPDB MTSN BANGIL</title>

    <script type="text/javascript" src="script.js"></script>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <style type="text/css">
<!--
.style1 {
	font-size: 12
}
-->
    </style>
</head>
<body>
<div id="art-page-background-simple-gradient">
    </div>
    <div id="art-main">
        <div class="art-Sheet">
            <div class="art-Sheet-tl"></div>
            <div class="art-Sheet-tr"></div>
            <div class="art-Sheet-bl"></div>
            <div class="art-Sheet-br"></div>
            <div class="art-Sheet-tc"></div>
            <div class="art-Sheet-bc"></div>
            <div class="art-Sheet-cl"></div>
            <div class="art-Sheet-cr"></div>
            <div class="art-Sheet-cc"></div>
            <div class="art-Sheet-body">
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
                		<li>
                			<a href="#" class=" active"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
                		</li>
                		<li>
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Menu Item</span></a>
                			<ul>
                				<li><a href="#">Menu Subitem 1</a>
                					<ul>
                						<li><a href="#">Menu Subitem 1.1</a></li>
                						<li><a href="#">Menu Subitem 1.2</a></li>
                						<li><a href="#">Menu Subitem 1.3</a></li>
                					</ul>
                				</li>
                				<li><a href="#">Menu Subitem 2</a></li>
                				<li><a href="#">Menu Subitem 3</a></li>
                			</ul>
                		</li>		
                		<li>
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">About</span></a>
                		</li>
                	</ul>
                </div>
                <div class="art-Header">
                    <div class="art-Header-jpeg"></div>
                    <div class="art-Logo">
                        <h1 id="name-text" class="art-Logo-name"><a href="#">mtsn bangil</a></h1>
                        <div id="slogan-text" class="art-Logo-text">selamat datang <br /><?php echo $nama; ?></div>
                  </div>
                </div>    <tr>
        <td colspan='3' id='umum'>
  <table width="100%" border="1" cellpadding="0" cellspacing="0">
<tr> 
                    <td width='55'>Pengumuman: </td><td width='750' style='font-size: 12px;'><marquee onmouseover='this.stop();' onmouseout='this.start();'><?php echo $umum['anoun']; ?></marquee></td>
                </tr>
            </table>
          <p>                  </td>
                </tr>
                <tr><td><!--asdf--></td></tr>
            </table>
        </td>
        <td rowspan='0' valign='top'>
        <!-- KETOKE AWITE KO KENE>  -->
         <table width='100%' border='0'>
            <tr>
                <td>
                    <div id='status' align='center'>
                    <?php
                        sambung();
                        $sikil=mysql_query("select status from siswa where no_reg='$iden'");
                        $chek=mysql_fetch_array($sikil);
                        //tdak di trima
                        //echo $chek['status'];
                        if ($chek['status']=='0'){
                            echo "<img src='img/icon/0.png'><br><font color='red'><b>Maaf, Anda Belum Di Terima !!<b></font>";
                        //status pending                        
                        }elseif($chek['status']=='BELUM LULUS'){
                            echo "<img src='img/icon/1.png'><br><font color='orange'><b>Data Anda Dalam Proses Konfirmasi Oleh Petugas Kami, Mohon tunggu dan Chek Kembali Kebenaran Data Anda !!<b></font>";
                        //diterima                        
                        }elseif($chek['status']=='LULUS'){
                            echo "<img src='img/icon/2.png'><br><font color='#66cc00'><b>Selamat !! <br>Anda Diterima di MTSN BANGIL, Silahkan Lanjutkan Proses Pendaftaran di Kantor MTSN BANGIL.<b></font>";
                        }else{
                            echo "<img src='img/icon/melet.png'><br><font color='blue'><b>Data Tidak ditemukan.<b></font>";
                        }
                    ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td><hr>
                  <!-- body -->
                  <?php
                  //**********Lihat Siswa*****************//
                     //if($_GET['mode']=='siswa'){//
                         sambung();
                         $saya=$_SESSION['identitas'];
                         $sel=mysql_query("select * from pesan where kepada='$saya'");
                         echo "<table width='700' cellpadding='5' cellspacing='3' border='0' align='center'>";
                             while($x=mysql_fetch_array($sel)){ ?>
           <tr>
                                     <td valign='top' width='120' class='inbux' style='background-color: lightblue;'>
                                         <img src='img/icon/amplop.png' width='22' height='22' title='Dari Peserta'><a class='link' style='color: green;' href='#'><?php echo $x['dari']; ?> : </a>
                                     </td>
           </tr>            
                                 <tr>
                                     <td class='inbux'>
                                         <?php echo $x['isi_pesan']; ?><br><br>
                                         <a class='link' href="panitia/pesan.php?mode=jawab&dari=<?php echo $saya; ?>&kepada=<?php echo $x['dari']; ?>&pesan=<?php echo $x['id']; ?>"><img src='img/icon/chat.png' width='22' height='22' title='Balas Pesan ini'></a>
                                         <a class='link' href="panitia/pesan.php?mode=hapus&id=<?php echo $x['id']; ?>"><img src='img/icon/hapus.png' width='22' height='22' title='Hapus Pesan ini'></a>
                                     
                                     </td>
                                     <td width='150' valign='top'>
                                   </td>
                                 </tr>
                             <?php }
                         echo "</table>";       
                         //};//
                  
                  ?>
                  <!-- body -->
                </td>
            </tr>
            <tr>
                <td colspan='4'><hr>
                Upload/Ganti Foto</td>
            </tr>
            <tr>
                <td>
                    <div id='form_upload'>
                        <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' enctype='multipart/form-data' onsubmit='print.disabled=false;'>
                            <input type='file' name='the_file' onclick='unggah.disabled=false;'><br>
                            <input type='submit' name='unggah' value='Unggah Foto' disabled='disabled'>
                        </form>
                    </div>
                </td>
            </tr>
         </table>
       
        </td>
    </tr>
</td>
    </tr>
    <div align="center">
      <table width="326" border='0' align="center" cellpadding='3' cellspacing='0' id='p_kiri2'>
        <tr>
          <td width="320" style='border: groove ;'><div align="center">
            <?php
                         sambung();
                         $sq=mysql_query("select foto from siswa where no_reg='$iden'");
                         $f=mysql_fetch_array($sq);
                         echo "<img src='".$f['foto']."' width='150' height='188'>";
                        ?>
          </div></td>
        </tr>
        <tr>
          <td><div align="center"><?php echo $nama; ?></div></td>
        </tr>
        <tr>
          <td><div align="center">No Reg:</div></td>
        </tr>
        <tr>
          <td><div align="center"><b><?php echo $iden; ?></b></div></td>
        </tr>
      </table>
    </div>
    <tr>
        <td rowspan='1' width='155' valign='top' id='kiri'>
            <table width="326" border='0' align="left" cellpadding='3' cellspacing='0' id='p_kiri'>
                <tr>
                  <td width="320"><div>
                        <button style='width: 150px;' onClick="window.open('panitia/pesan.php?mode=kirim','popupwindow','scrollbars=yes, width=400,height=400');">
                           <div align='left'><img src='img/icon/amplop.png' width='16' height='16'>Tanya</div></a>                        </button>
                     </div>                  </td>
                </tr>
                <tr>
                  <td>
                     <button style='width: 150px;' onClick="window.open('print-form.php?print=ya&no_reg=<?php echo $iden; ?>','popupwindow','scrollbars=yes, width=750,height=600');">
                        <div align='left'><img src='img/icon/print.png' width='16' height='16'>Cetak Formulir</div>
                     </button>                  </td>
                </tr>
                <tr>
                  <td>
                     <button style='width: 150px;' onClick="window.open('print-form.php?no_reg=<?php echo $iden; ?>','popupwindow','scrollbars=yes, width=750,height=600');">
                        <div align='left'><img src='img/icon/form.png' width='16' height='16'>Lihat Formulir</div>
                     </button>                  </td>
                </tr>
                <tr>
                  <td>
                     <div>
                        <button style='width: 150px;' onClick="window.location='?sesi=selesai'">
                           <div align='left'><img src='img/icon/keluar.png' width='16' height='16'>Keluar</div></a>                        </button>
                     </div><br />
    <tr>
        <td colspan='4' class='umum style1'>Copyright &copy; MTSN BANGIL </td>
    </tr>
</table>    

<div class="cleared"></div><div class="art-Footer">
                    <div class="art-Footer-inner">
                        <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                        <div class="art-Footer-text">
                            <p><a href="#">Contact Us</a> | <a href="#">Terms of Use</a> | <a href="#">Trademarks</a>
                                | <a href="#">Privacy Statement</a><br />
                                Copyright &copy; 2009 ---. All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="art-Footer-background"></div>
                </div>
        		<div class="cleared"></div>
            </div>
        </div>
        <div class="cleared"></div>
        <p class="art-page-footer"><a href="http://webjestic.net/templates/">CSS Template</a> designed by webJestic.NET</p>
    </div>
    
</body>
</html>
