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

	$query = "SELECT * FROM tb_golongan WHERE id_golongan = '$id'";
	$result = mysql_query($query);
	$data = mysql_fetch_array($result);
?>

<table>
	<form method="post" action="pros_ed_pros_gol.php">
		<Input type="hidden" name="vid" value="<?php echo $id; ?>"
		<tr>
			<td colspan="3"><b>Edit Golongan</b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Golongan</td>
			<td>&nbsp;</td>
			<td><Input type="text" name="vgol" required autofocus value="<?php echo $data ['nama_golongan'] ?>"></td>
		</tr>
		<tr>
			<td>Pangkat</td>
			<td>&nbsp;</td>
			<td><Input type="text" name="vpang" required value="<?php echo $data ['pangkat'] ?>"></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="right">
				<button type="submit">EDIT</button> &nbsp;
				<a href="in_gol.php"><button type="button">BATAL</button></a>
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