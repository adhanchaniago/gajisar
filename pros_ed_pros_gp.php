<?php
	include 'koneksi.php';

	$id = htmlentities($_POST['vid']);
	$gp = htmlentities($_POST['vgp']);

	$query = "UPDATE tb_gajipokok SET jumlah_gajipokok = '$gp' WHERE id_gajipokok = '$id'";
	$result = mysql_query($query);

	if ($result){
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Edit'); 
				window.location.href='in_gp.php';
			  </script>"; 
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='in_gp.php';
			  </script>"; 
	}

	mysql_close();
?>