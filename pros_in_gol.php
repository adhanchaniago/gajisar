<?php
	include 'koneksi.php';

	$gol = htmlentities($_POST['vgol']);
	$pang = htmlentities($_POST['vpang']);

	$query = "INSERT INTO tb_golongan VALUES ('','$gol','$pang')";

	$result = mysql_query($query);

	if ($result){
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Inputkan'); 
				window.location.href='in_gol.php';
			  </script>"; 
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Inputkan'); 
				window.location.href='in_gol.php';
			  </script>"; 
	}

	mysql_close();
?>