<?php
include "header.php";
?>


        <!-- Begin Of Menu -->
        <?php include 'menu.php';?>
        <!-- End Of Menu -->
        <div class="clear"></div>
        <!-- Begin Of Main -->
        <div id="main">
        
        <div class="sidebar">
        	<!-- Begin Sidebar -->
             <?php include 'sidebar.php';?>
            <!-- End Sidebar -->
        </div>
            
            <div class="content">
            	<div class="head-content">
                    <div class="judul-content">
                        <h2><img src="img/icon-dashboard.png" /> Dashboard</h2>
                    </div>
                </div>
        
                <!-- Begin Isi Content Kiri -->
                <?php include 'content.php';?>
                <!-- End Isi COntent -->
            
        </div>
        <!-- End Of Main -->
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <!-- Footer -->
   <?php include 'footer.php';?>