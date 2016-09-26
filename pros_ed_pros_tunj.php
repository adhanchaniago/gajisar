<?php
	include 'koneksi.php';

	$id = htmlentities($_POST['vid']);
	$tunj = htmlentities($_POST['vtunj']);

	$query = "UPDATE tb_tunjangankinerja SET tunjangan = '$tunj' WHERE id_tunj = '$id'";
	$result = mysql_query($query);

	if ($result){
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Edit'); 
				window.location.href='in_tunj.php';
			  </script>"; 
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='in_tunj.php';
			  </script>"; 
	}

	mysql_close();
?>