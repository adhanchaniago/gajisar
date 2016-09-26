<?php
	include 'koneksi.php';

	$jab = htmlentities($_POST['vjab']);

	$query = "INSERT INTO tb_jabatan VALUES ('','$jab')";

	$result = mysql_query($query);

	if ($result){
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Inputkan'); 
				window.location.href='in_jab.php';
			  </script>"; 
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Inputkan'); 
				window.location.href='in_jab.php';
			  </script>"; 
	}

	mysql_close();
?>