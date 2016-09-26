<?php
	session_start();
	if (empty($_SESSION['uid'])) { 
		header("location:index.php"); 
	}
	else{ 
	$uid = $_SESSION['uid'];
	include 'header.php';
	include 'koneksi.php';

	$id = mysql_escape_string($_GET['id']);
	$id = htmlentities($id);

	$query = "SELECT * FROM tb_jabatan WHERE id_jabatan = '$id'";
	$result = mysql_query($query);
	$data = mysql_fetch_array($result);
?>

<table>
	<form method="post" action="pros_ed_pros_jab.php">
	<input type="hidden" name="vid" value="<?php echo $data['id_jabatan']; ?>">
		<tr>
			<td colspan="3"><b>Edit Jabatan</b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>Nama Jabatan</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vjab" value="<?php echo $data['nama_jabatan']; ?>"></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">
				<button type="submit">EDIT</button>&nbsp;
				<a href="in_jab.php"><button type="button">BATAL</button></a>
			</td>
		</tr>
	</form>
</table>
<br><br>
<?php
	mysql_close();
	include 'footer.php';
	}	
?>