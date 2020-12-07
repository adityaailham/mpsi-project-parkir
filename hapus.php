<?php
	include "config/koneksi.php";
	$hapus = mysqli_query($con, "DELETE FROM tb_login WHERE id = '$_GET[id]' ");
	if($hapus) 
        {
        echo "<script>
            alert('Berhasil Dihapus');
            document.location='home_admin.php';
             </script>";
        }
?>