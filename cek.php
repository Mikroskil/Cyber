<?php
session_start();	
include "konfigurasi/koneksi.php";



function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

//tangkap data dari form login
$username = $_POST['id_user'];
$password = $_POST['password'];
$pass=md5($password);

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
$username = anti_injection($username);
$pass = anti_injection($pass);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($pass)) {
	//kalau username dan password kosong
	header('location:login.php?error=1');
	break;
} else if (empty($username)) {
	//kalau username saja yang kosong
	header('location:login.php?error=2');
	break;
} else if (empty($pass)) {
	//kalau password saja yang kosong
	header('location:login.php?error=3');
	break;
}

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($pass)){
 echo '<div class="errormsgbox" style="color: #D8000C;background-color: #FFBABA;background-image: url(img/error.png);background-repeat: no-repeat;background-position: 10px center;font-weight:bold;width:450px;border: 1px solid;margin: 0 auto;padding:10px 5px 10px 50px; ">Sekarang tidak bisa di injeksi halaman login nya bro <img src="img/senyum.gif"> </div>';
}
else{
$q = mysql_query("select * from master where username='$username' and password='$pass'");
//$ketemu=mysql_num_rows($q);
$r=mysql_fetch_array($q);
$id_admin=$r['id_admin'];
$name=$r['username'];
if (mysql_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
	session_register('username');
	session_register('id_admin');
	$_SESSION['id_admin']=$id_admin;
	$_SESSION['username'] = $name;
	
	//redirect ke halaman index
	header('location:.');
} else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:login.php?error=4');
}

}
?>