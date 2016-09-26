<?php
	include 'koneksi.php';

	$kdgol = htmlentities($_POST['vgol']);
	$gp = htmlentities($_POST['vgp']);

	$query = "INSERT INTO tb_gajipokok VALUES ('','$kdgol','$gp')";
	$result = mysql_query($query);

	if ($result){
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Inputkan'); 
				window.location.href='in_gp.php';
			  </script>"; 
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Inputkan'); 
				window.location.href='in_gp.php';
			  </script>"; 
	}

	mysql_close();
?>