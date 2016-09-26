<?php
	include 'koneksi.php';

	$id = mysql_escape_string($_GET['id']);
	$id = htmlentities($id);

	$query = "DELETE FROM tb_gajipokok WHERE id_gajipokok = '$id'";
	$result = mysql_query($query);

	if ($result){
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='in_gp.php';
			  </script>"; 
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='in_gp.php';
			  </script>"; 
	}
?>