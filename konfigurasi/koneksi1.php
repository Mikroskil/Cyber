<?php
$host="mysql.idhostinger.com";
$username="u184551345_camat";
$password="s1nurayapal";
$databasename="u184551345_camat";

$link=mysql_connect($host,$username,$password) or die ("Data Base Error");
mysql_select_db($databasename,$link);

?>