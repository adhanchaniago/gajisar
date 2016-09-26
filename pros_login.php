<?php
	if (isset($_POST['blog'])){
		$uid = $_POST['uid'];  
		$pass = $_POST['pass'];

		if ($uid != "" && $pass != ""){
			if ($uid == "admin" && $pass == "admin"){
				session_start();
				$_SESSION['uid'] = $uid;
				echo "<script type='text/javascript'>
						alert('Selamat Datang'); 
						window.location.href='home.php';
					  </script>"; 
			}
			else
				echo "<script type='text/javascript'>
						alert('Username atau Password Salah');
						window.location.href='index.php';
					  </script>";
		}
	}
?>
<br><hr>