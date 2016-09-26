<?php
	include 'koneksi.php';

	$idjab = htmlentities($_POST['vjab']);
	$tunj = htmlentities($_POST['vtunj']);

	$query = "INSERT INTO tb_tunjangankinerja VALUES ('','$idjab','$tunj')";

	$result = mysql_query($query);

	if ($result){
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Inputkan'); 
				window.location.href='in_tunj.php';
			  </script>"; 
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Inputkan'); 
				window.location.href='in_tunj.php';
			  </script>"; 
	}

	mysql_close();
?>