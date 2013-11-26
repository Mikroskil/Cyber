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
                        <h2><img src="img/download.jpg" />
                        <?php
						if($_GET['act'] == "form_tambah")
						{
							echo "Tambah Kategori";
						}
						else if($_GET['act'] == "form_edit")
						{
                            echo "Edit Kategori";
						}
						else
						{
                            echo "Minuman";
						}
						?>
                        </h2>

                    </div>
                </div>
        
                <!-- Begin Isi Content Kiri -->
                <div id="isi-tengah">
	
    <a href="add_kategori.php"><input type="button" value="Tambah Minuman"></a><br/><br/>
    <table cellpadding="4" cellspacing="4" width="100%">
        <tr style="background-color: blue;color: #ffffff;font-weight: bold;" align="center">
            <th width="30px">No</th>
            <th width="250px">Nama minuman</th>
			<th width="250px">Harga</th>
            <th width="150px">Aksi</th>
            <td></td>
        </tr>
    <?php
    $n = 1;
    $q = mysql_query("select * from kategori");
    while ($r = mysql_fetch_array($q)) {
	$tgl=tgl_indo($r[tgl_posting]);
    ?>
        <tr align="center">
            <td><?php echo $n; ?></td>
            <td><?php echo $r['nama_kat']; ?></td>
            <td>
                <a href="edit_kategori.php?id=<?php echo $r['id_kat']; ?>">Edit</a> | 
                <a  onclick="return confirm('Yakin dihapus..?');" href="act_kategori.php?act=delete&id=<?php echo $r['id_kat']; ?>">Delete</a>
            </td>

        </tr>
    <?php
        $n++;
    }

    ?>
</table>



                </div>
                <!-- End Isi COntent -->
            </div>
        </div>
        <!-- End Of Main -->
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <!-- Footer -->
   <?php include 'footer.php';?>