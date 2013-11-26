<?php
$host="localhost";
$username="root";
$password="";
$databasename="resto";

$link=mysql_connect($host,$username,$password) or die ("Data Base Error");
mysql_select_db($databasename,$link);

$judul = "Aplikasi Restoran 2 Idiot";



?>