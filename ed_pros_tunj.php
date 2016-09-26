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

	$query = "SELECT * FROM view_tunj_kin WHERE id_tunj = '$id'";
	$result = mysql_query($query);
	$data = mysql_fetch_array($result);
?>

<table>
	<form method="post" action="pros_ed_pros_tunj.php">
		<input type="hidden" name="vid" value="<?php echo $id; ?>">
		<tr>
			<td colspan="3"><b>Edit Gaji Pokok</b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>&nbsp;</td>
			<td><b><?php echo $data['nama_jabatan']; ?></b></td>
		</tr>
		<tr>
			<td>Tunjangan Kinerja</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vtunj" value="<?php echo $data['tunjangan']; ?>" autofocus></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="right">
				<button type="submit">EDIT</button>&nbsp;
				<a href="in_tunj.php"><button type="button">BATAL</button></a>
			</td>
		</tr>
	</form>
</table>
<br>
<?php
	mysql_close();
	include 'footer.php';
	}	
?>