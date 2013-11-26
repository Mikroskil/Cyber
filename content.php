<div id="isi-content">
                		<!-- Isi Atas -->
                	<div class="box round">
                    	<h2>Informasi Web</h2>
                        <div class="block">
                        	<p class="start">
                            <?php 
                            	/* Untuk Buku Tamu */
								$tampil2="select * from kandidat";
								$hasil2=mysql_query($tampil2);
								$jmlkan=mysql_num_rows($hasil2);
								
								$berita="select * from kategori";
								$hasil=mysql_query($berita);
								$jmlkat=mysql_num_rows($hasil);
								
								$user="select * from users";
								$hasil=mysql_query($user);
								$jmluser=mysql_num_rows($hasil);
								
							?>
                         	   	Jumlah Makanan  : <?php echo "<b> $jmlkan </b>"; ?> Macam <br />
                            	Jumlah Minuman : <?php echo "<b> $jmlkat </b>"; ?> Macam <br />
                            	Jumlah Meja : <?php echo "<b> $jmluser </b>"; ?> Meja <br />
                                </p>
                        </div>
                    </div>
                    <!-- Isi Bawah -->
                <div class="box round">
                	<h2>Statistik Pengunjung</h2>
                	<div class="block">
                    	<p class="start">
                        <?php
                        	$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
              $waktu   = time(); // 

              // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
              $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysql_num_rows($s) == 0){
                mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
              }

              $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
              $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
              $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

              $path = "../statistik/counter/";
              $ext = ".png";

              $tothitsgbr = sprintf("%06d", $tothitsgbr);
              for ( $i = 0; $i <= 9; $i++ ){
	               $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
              }

              echo "<center>$tothitsgbr </center>
                    <table>
                    <tr><td class='news-title'><img src=../statistik/counter/hariini.png> Pengunjung hari ini </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=../statistik/counter/total.png> Total pengunjung </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=../statistik/counter/hariini.png> Hits hari ini </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=../statistik/counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=../statistik/counter/online.png> Pengunjung Online </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
            ?>
                        </p>
                     </div>
                </div>
                </div>
                <!-- End Of Isi Content -->
                
                <!-- Begin Isi Content Kanan -->
                <div id="isi-content">
                	<!-- Isi Atas -->
                	<div class="box round">
                		<h2>Kalender</h2>
                		<div class="block">
                    		<p class="start">
                        <!--Kalender-->
                        <p align="center"><?php include 'kalender/kalender.php';?> </p>
                        <p>
                        	
                        </p>
							</p>
                        </div>
                    </div>
                        <!-- Isi Bawah -->
                        <div class="box round">
                             <h2>Statistik Penggunaan Browser</h2>
                            <div class="block">
                                <p class="start">
                                <table width="431" align="center" class="td1">
      							<?php
                                $ip = getenv("REMOTE_ADDR");
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$c = date("H:i");
	$update_cnt = mysql_query("INSERT INTO counter_browser VALUES('','$ip','$d','$m','$y','$c','$_SERVER[HTTP_USER_AGENT]')");
	
	$sql = "SELECT * FROM counter_browser";
	$exec = mysql_query($sql);
	$get_total = mysql_num_rows($exec);
	$browser = $sql . " WHERE cnt_browser LIKE ";
	// INTERNET EXPLORER
	$ie = "'%MSIE%' AND cnt_browser NOT LIKE '%Maxthon%'";
	$get_ie = mysql_num_rows(mysql_query($browser . $ie));	
	$per_ie = round($get_ie / $get_total * 100,1) . " %";
	// OPERA
	$opera = "'%Opera%'";
	$get_opera = mysql_num_rows(mysql_query($browser . $opera));
	$per_opera = round($get_opera / $get_total * 100,1) . " %";
	// FIREFOX
	$firefox = "'%Firefox%'";
	$get_firefox = mysql_num_rows(mysql_query($browser . $firefox));
	$per_firefox = round($get_firefox / $get_total * 100,1) . " %";	
	// CHROME
	$chrome = "'%Chrome%'";
	$get_chrome = mysql_num_rows(mysql_query($browser . $chrome));
	$per_chrome = round($get_chrome / $get_total * 100,1) . "%";
	// OTHERS
	$other = "'%Maxthon%'";
	$initiate_browser = $get_opera + $get_firefox + $get_ie + $get_chrome;
	$get_others = $get_total - $initiate_browser; 
	//$get_others = mysql_num_rows(mysql_query($browser . $other));
	$per_others = round($get_others / $get_total * 100,1) . " %";
	// LIM
	$allvisit = $get_total;
?>
      
      <tr>
        <td align="center" width="20" height="35"><?php echo "<img src='img/ie.png'>"; ?></td>
        <td width="401" valign="top" class="txt_statistic"><span class="txt_browser">Internet Explorer</span><br />
            <?php echo $per_ie; ?></td>
      </tr>
      <tr>
        <td align="center" ><?php echo "<img src='img/firefox.png'>"; ?></td>
        <td class="txt_statistic" valign="middle"><span class="txt_browser">Mozilla FireFox</span><br />
            <?php echo $per_firefox; ?></td>
      </tr>
      <tr>
        <td align="center" ><?php echo "<img src='img/opera.png'>"; ?></td>
        <td class="txt_statistic" valign="middle"><span class="txt_browser">Opera</span><br />
            <?php echo $per_opera; ?></td>
      </tr>
      <tr>
        <td align="center" ><?php echo "<img src='img/chrome.png'>"; ?></td>
        <td class="txt_statistic" valign="middle"><span class="txt_browser">Google Chrome</span><br />
            <?php echo $per_chrome; ?></td>
      </tr>
      <tr>
        <td align="center" ><?php echo "<img src='img/others.png'>"; ?></td>
        <td class="txt_statistic" valign="middle"><span class="txt_browser">Unique Visitors</span><br />
            <?php echo $per_others; ?></td>
      </tr>
      
    </table>
                                </p>
                            </div>
                           
                    </div>
                    
                    

                </div>