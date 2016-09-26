<?php

	$a1 = htmlentities($_POST['vnip1']);
	$a2 = htmlentities($_POST['vnip2']);
	$a3 = htmlentities($_POST['vnip3']);
	$a4 = htmlentities($_POST['vnip4']);

	$x = htmlentities($_POST['tgl']);
	$y = htmlentities($_POST['bln']);
	$z = htmlentities($_POST['thn']);

	$nip = $a1." ".$a2." ".$a3." ".$a4;
	$nama = htmlentities($_POST['vnama']);
	$tmpt = htmlentities($_POST['vtmptlhr']);
	$tgl = $z."-".$y."-".$x;
	$jk = htmlentities($_POST['vjekel']);
	$almt = htmlentities($_POST['valmt']);
	$tlp = htmlentities($_POST['vtlp']);
	$email = htmlentities($_POST['vemail']);
	$stat = htmlentities($_POST['vstat']);
	$anak = htmlentities($_POST['vanak']);
	$gol = htmlentities($_POST['vgol']);
	$jab = htmlentities($_POST['vjab']);

	$filename = $_FILES['filefoto']['name'];
	$filesize = $_FILES['filefoto']['size'];
	$fileerror = $_FILES['filefoto']['error'];
	$filetype = $_FILES['filefoto']['type'];
	$filepath = "photo/".$filename;

	if($filename != ""){

		if($filetype == "image/jpeg"){

			if($filesize <= 5000000){

				$move = move_uploaded_file($_FILES['filefoto']['tmp_name'], $filepath);

				if($move){

					include 'koneksi.php';

					$query = "INSERT INTO tb_karyawan VALUES ('$nip','$nama','$tmpt','$tgl','$jk','$almt','$tlp','$email','$stat','$anak','$gol','$jab','$filepath')";
					$result = mysql_query($query);

					if ($result){
						echo "<script type='text/javascript'>
								alert('Data Berhasil di Inputkan'); 
								window.location.href='in_kary.php';
							  </script>"; 
					}
					else{
						echo "<script type='text/javascript'>
								alert('Data Gagal di Inputkan'); 
								window.location.href='in_kary.php';
							  </script>"; 
					}

					mysql_close();
				}
			}
			else{
				echo "<script type='text/javascript'>
						alert('Maximal File 5MB !'); 
						window.location.href='in_kary.php';
					  </script>"; 
			}
		}
		else{
			echo "<script type='text/javascript'>
					alert('Hanya Boleh File JPEG !'); 
					window.location.href='in_kary.php';
				  </script>";
		}
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data Gagal di Inputkan'); 
				window.location.href='in_kary.php';
			  </script>"; 
	}

?>