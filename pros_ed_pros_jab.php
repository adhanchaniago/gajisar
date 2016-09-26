<?php
	include 'koneksi.php';

	$id = htmlentities($_POST['vid']);
	$jab = htmlentities($_POST['vjab']);

	$query = "UPDATE tb_jabatan SET nama_jabatan = '$jab' WHERE id_jabatan = '$id'";

	$result = mysql_query($query);

	if ($result){
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Edit'); 
				window.location.href='in_jab.php';
			  </script>"; 
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='in_jab.php';
			  </script>"; 
	}

	mysql_close();
?>