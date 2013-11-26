<?php
ob_start();
error_reporting(0);
include 'konfigurasi/koneksi.php';
include "cek-login.php";
include "konfigurasi/library.php";
include "konfigurasi/indotgl.php";
include "konfigurasi/fungsi_combobox.php";
include "konfigurasi/fungsi_thumb.php";

include "kalender/calender.php";
include 'log.php';
include "class/FusionCharts_Gen.php";

$id_admin = $_SESSION['id_admin'];
$query1 = mysql_query("SELECT * FROM master where id_admin=".mysql_real_escape_string($id_admin)."") or die (mysql_error()); 
$disp = mysql_fetch_array($query1);
$name=$disp['username'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $judul;?></title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="keywords" content="e-voting" />
    <meta name="description" content="e-voting uisu" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script language='javascript' src='js/FusionCharts.js'></script>  
    <style type="text/css">
	#Column3D1Div{ text-align:center;}
	
	#foto a{ color:#0000CC}
	</style>
    <!-- END: load jquery -->
    
<!--TExt Editor --><script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
  <script src="../tinymcpuk/jscripts/tiny_mce/tiny_lokomedia.js" type="text/javascript"></script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <img src="img/logo.png" width="250" height="50" alt="Logo" /></div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile " /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello, <b id="cap"><i><font color="#FF0000"><?php echo $name; ?></font></i></b> </li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey"><a href="../." target="_blank">Lihat Website</a></span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>