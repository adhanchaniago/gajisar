<?php
	include 'koneksi.php';

	$id = htmlentities($_POST['vid']);
	$gol = htmlentities($_POST['vgol']);
	$pang = htmlentities($_POST['vpang']);

	$query = "UPDATE tb_golongan SET nama_golongan = '$gol', pangkat = '$pang' WHERE id_golongan = '$id'";
	$result = mysql_query($query);

	if ($result){
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Edit'); 
				window.location.href='in_gol.php';
			  </script>"; 
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='in_gol.php';
			  </script>"; 
	}

	mysql_close();
?>