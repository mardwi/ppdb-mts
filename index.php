<?php
session_start();
if(isset($_SESSION['nama']) && isset($_SESSION['identitas'])){
    header('location: langkah2.php');
};
include 'include.php';
sambung();
$anoun=mysql_fetch_array(mysql_query("select anoun from sistem"));
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
</head>
<body>
<div id="art-page-background-simple-gradient">
    </div>
    <div id="art-page-background-glare">
        <div id="art-page-background-glare-image"></div>
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
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">HALAMAN PANITIA</span></a>
                			<ul>
                				<li><a href="#">PANITIA PPDB</a>
                					<ul>
                						<li><a href="#">INFORMATION DESK</a></li>
                						<li><a href="#">VERIFIKATOR</a></li>
                						<li><a href="#">ADMINISTRATOR</a></li>
                					</ul>
                				</li>
                				<li><a href="#">LOGIN SUDAH TERDAFTAR</a></li>
                				<li><a href="#">TATA CARA</a></li>
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
                        <h1 id="name-text" class="art-Logo-name">formulir</h1>
                        <div id="slogan-text" class="art-Logo-text">ppdb mtsn bangil</div>
                    </div>
                </div>
                <div class="art-contentLayout"><tr>
        <td><div style='background: #CDCAC3; border: groove; font-size: 14px; font-family: time news roman;' align='center' id='topmenu'><a href='http://www.mtsn-bangil.sch.id'>Home</a> | <a onClick="window.location='langkah2.php'" href='#'>Sudah Terdaftar</a></div>
          <div class='form'  id='inputan'>
            <!-- mulai form isian -->
             <form action='langkah1.php' method='post' class='form' >
              <table border='0' align="center" cellpadding='5' cellspacing='0' class='form'>
              <tr>
                <td colspan='3' align='center'>FORMULIR PENDAFTARAN | SILAHKAN ISI DENGAN HURUF KAPITAL!!</td>
              </tr>
                <tr>
                    <td><a name='formulir'>Nama</a></td>
                    <td>:</td>
                    <td><input style="text-transform: uppercase" type='text' name='nama' size='50'> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><input type='radio' name='jkel' value='LAKI-LAKI'>Laki Laki  <input type='radio' name='jkel' value='PEREMPUAN'>Perempuan <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><input style="text-transform: uppercase" type='text' name='tem_lahir' size='25'></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir: </td>
                    <td>:</td>
                    <td>
                        <select name='tgl'>
                            <option value='#'>Tanggal</option>
                            <?php for ($tgl=1; $tgl <= 31; $tgl++){
                             echo  "<option value='".$tgl."'>".$tgl."</option> " ;
                            };
                            ?>
                        </select> /
                        <select name='bln'>
                            <option value='#'>Bulan</option>
                            <?php for ($tgl=1; $tgl <= 12; $tgl++){
                             echo  "<option value='".$tgl."'>".$tgl."</option> " ;
                            };
                            ?>
                        </select> /
                        <select name='tahun'>
                            <option value='#'>Tahun</option>
                            <?php for ($tgl=1990; $tgl <= 2000; $tgl++){
                             echo  "<option value='".$tgl."'>".$tgl."</option> " ;
                            };
                            ?>
                        </select>                    </td>
                </tr>
                <tr>
                    <td>Gol Darah</td>
                    <td>:</td>
                    <td><input type='radio' name='gol_drh' value='A'>A <input type='radio' name='gol_drh' value='B'>B <input type='radio' name='gol_drh' value='AB'>AB <input type='radio' name='gol_drh' value='O'>O <input type='radio' name='gol_drh' value='(Kosong)'><i>(Tidak Tahu)</i></td>
                </tr>
                <tr>
                    <td valign='top'>Berat / Tinggi Badan</td>
                    <td valign='top'>:</td>
                    <td><input type='text' name='berat' size='3'> Kg / <input type='text' name='tinggi' size='3'> Cm</td>
                </tr>
                <tr>
                    <td>Domisi (sesuai KK)</td>
                    <td>:</td>
                    <td>
                        <select name='jurusan1'>
                            <option value='(Kosong)'>Pilih Domisili</option>
                            <option value='AP'>Di Kec. Bangil</option>
                            <option value='AK'>Di Kab. Pasuruan</option>
                            <option value='PM'>Di Luar Kab.Pasuruan</option>
                        </select>
                     <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>

                <tr>
                    <td valign='top'>Alamat Lengkap</td>
                    <td valign='top'>:</td>
                    <td><textarea name='alamat' cols='50' rows='5'></textarea> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Kode Pos</td>
                    <td>:</td>
                    <td><input type='text' name='k_pos' size='5'></td>
                </tr>
                <tr>
                    <td>Jenis Sekolah Asal</td>
                    <td>:</td>
                    <td><select name='agama'>
                        <option value='(Kosong)'>Jenis Sekolah Asal</option>
                        <option value='MADRASAH'>Madrasah Ibtidaiyah</option>
                        <option value='SEKOLAH'>Sekolah Dasar</option>
                    </select>
                    <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Nama Sekolah Asal</td>
                    <td>:</td>
                    <td><input style="text-transform: uppercase" type='text' name='asal_sek' size='50'> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Alamat Sekolah</td>
                    <td>:</td>
                    <td><input style="text-transform: uppercase" type='text' name='alamat_sek' size='50'> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Tahun Lulus</td>
                    <td>:</td>
                    <td><select name='thn_lls'>
                            <option value='(Kosong)'>Tahun Lulus</option>
                            <?php for ($tgl=2000; $tgl <= 2011; $tgl++){
                             echo  "<option value='".$tgl."'>".$tgl."</option> " ;
                            };
                            ?>
                        </select> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>No Ijazah</td>
                    <td>:</td>
                    <td><input style="text-transform: uppercase" type='text' name='no_ijazah' size='25'>
                    <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td><input type='text' name='hp' size='15'>
                    <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>:</td>
                    <td><input type='email' name='email' size='25'></td>
                </tr>
                <tr>
                <td>Nilai UN</td>
                <td> : </td>
                    <td>
                        <table border='0' cellpadding='3' cellspacing='0' class='tampil'>
                            <tr>
                                <td class='nilai_un' align='center'>MTK</td><td class='nilai_un' align='center'>BIN</td><td class='nilai_un' align='center'>BIG</td><td align='center' class='nilai_un'>IPA</td>
                            </tr>
                            <tr>
                                <td><input type='text' name='mtk' size='2'></td><td><input type='text' name='bin' size='2'><td><input type='text' name='big' size='2'></td><td><input type='text' name='ipa' size='2'> <b style='color: red; font-size: 20px;'>*</b></td>
                            </tr>
                        </table>                    </td>
                </tr>
                <tr><td colspan='3' align='center'><hr><img src='img/icon/ortu.png' width='22' height='22' title='Data Siswa'> DATA ORANG TUA / WALI MURID</td></tr>
                <tr>
                    <td>Ayah</td>
                    <td>:</td>
                    <td><input style="text-transform: uppercase" type='text' name='ayah' size='50'> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Ibu</td>
                    <td>:</td>
                    <td><input style="text-transform: uppercase" type='text' name='ibu' size='50'></td>
                </tr>
                <tr>
                    <td>Wali</td>
                    <td>:</td>
                    <td><input style="text-transform: uppercase" type='text' name='wali' size='50'></td>
                </tr>
                <tr>
                    <td valign='top'>Alamat Lengkap</td>
                    <td valign='top'>:</td>
                    <td><textarea name='alamat_wali' cols='50' rows='5'></textarea>
                    <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td><input type='text' name='hp_wali' size='12'></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><input style="text-transform: uppercase" type='text' name='kerja_wali' size='25'></td>
                </tr>
                <tr>
                    <td colspan='3'><input type='radio' name='setuju' onClick="daftar.disabled=false;"><font size='2'><i><b>Saya setuju untuk mendaftar di MTSN BANGIL dan telah memasukkan data dengan sebenar benarnya.</b></i></font></td>
                </tr>
                <tr><td colspan='3' align='center'><input class='inpuoet' name='daftar' type='submit' value='Daftar' style='background-color: #49A703;' disabled='disabled'> <input style='background-color: #49A703;' onClick="daftar.disabled=true;" type='reset' value='Ulangi'></td></tr>
              <tr>
                <td colspan='4'>
                     <b style='color: red; font-size: 20px;'>*</b> : Wajib di Isi                </td>
              </tr>
              </table>
            </form>
             
            <!--akhir form isian -->    
            </div>
        </td>
    </tr>
                </div>
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
