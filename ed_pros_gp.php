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

	$query = "SELECT * FROM view_gaji_pokok WHERE id_gajipokok = '$id'";
	$result = mysql_query($query);
	$data = mysql_fetch_array($result);
?>

<table>
	<form method="post" action="pros_ed_pros_gp.php">
		<input type="hidden" name="vid" value="<?php echo $id; ?>">
		<tr>
			<td colspan="3"><b>Edit Gaji Pokok</b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>Golongan</td>
			<td>&nbsp;</td>
			<td><b><?php echo $data['nama_golongan']; ?></b></td>
		</tr>
		<tr>
			<td>Pangkat</td>
			<td>&nbsp;</td>
			<td><b><?php echo $data['pangkat']; ?></b></td>
		</tr>
		<tr>
			<td>Gaji Pokok</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vgp" value="<?php echo $data['jumlah_gajipokok']; ?>" autofocus></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="right">
				<button type="submit">EDIT</button>&nbsp;
				<a href="in_gp.php"><button type="button">BATAL</button></a>
			</td>
		</tr>
	</form>
</table>

<?php
	mysql_close();
	include 'footer.php';
	}	
?>