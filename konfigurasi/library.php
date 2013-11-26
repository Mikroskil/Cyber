<?php
$seminggu=array("Minggu","Senen","Selasa","Rabu","Kami","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];
$tgl_sekarang = date("Ymd");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$nama_bln=array(1=> "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
?>