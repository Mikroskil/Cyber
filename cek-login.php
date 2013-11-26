<?php 
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['id_admin']) || empty($_SESSION['id_admin'])) {
	//redirect ke halaman login
	header('location:login.php');
}
?>