<?php
function sambung(){
//*************Setting Server database***********************/
@mysql_connect('localhost', 'root', '99999999') or die("<strong>Tidak Dapat Tersambung dengan Pusat Data</strong>");
@mysql_selectdb('sucipto');
};
function putus(){
    mysql_close();
};
	function password(){
		$gpass=NULL;
		$n = 6;	// <--- banyaknya karakter yang diinginkan
		$chr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvqxyz0123456789@"; //kombinasi karakter
		for($i=0;$i<$n;$i++){
			$rIdx = rand(1,strlen($chr));
			$gpass .=substr($chr,$rIdx,1);
		}
		return $gpass;
	};
//echo generatePass();
function masuk($aksi){
    echo "
    <div class='login'>
    <form action='".$aksi."' method='POST'>
        No. Registrasi: </br>
        <input type='text' name='no'></br>
        Kunci: </br>
        <input type='password' name='kunci'></br>
        <input class='submit' type='submit' value='Masuk' name='tmbl'>
    </form>
    </div>
    ";
};
//fungsi pembuat log
function loging($tindak){
    $ip=$_SERVER['REMOTE_ADDR'];
    $jam=date('H:i');
    //$hal=$_SERVER['REQUEST_URI'];
    $isi="[ ".$ip." ] ".$jam." -- ".$tindak."\n";
    $_logfilename = "panitia/log/log-".date('d-M-Y').".txt";
    ////
    if(!file_exists($_logfilename)){
        $_logfilehandler = fopen($_logfilename,'a+'); 
        @fwrite($_logfilehandler, "# Jejak pada: [ ".date('d-M-Y')." ] #\n");
	@fopen($_logfilename,'a+');
        @fwrite($_logfilehandler,$isi);
        @fclose($_logfilehandler);
        @fclose($_logfilehandler);
            sambung();
            $simpan="log-".date('d-M-Y').".txt";
            mysql_query("update sistem set file_log='$simpan' where id='1'");
            putus();
    }else{
        $_logfilehandler = fopen($_logfilename,'a+');
	@fopen($_logfilename,'a+');
        @fwrite($_logfilehandler,$isi);
        @fclose($_logfilehandler);
    };

};
?>
