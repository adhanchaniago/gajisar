<?php
	session_start();
	if (empty($_SESSION['uid'])) { 
		header("location:index.php"); 
	}
	else{ 
	$uid = $_SESSION['uid'];
	include 'header.php';
?>

<table>
	<form method="post" action="pros_in_jab.php">
		<tr>
			<td colspan="3"><b>Input Jabatan</b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>Nama Jabatan</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vjab" autofocus required></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">
				<button type="submit">SIMPAN</button>&nbsp;
				<a href="home.php"><button type="button">BATAL</button></a>
			</td>
		</tr>
	</form>
</table>
<br><br>
<h3>Data Golongan</h3>
<table class="my" width="100%" cellspacing="0">
	<tr>
		<td><b>Nama Jabatan</b></td>
		<td>Aksi</td>
	</tr>
	<?php
		include 'koneksi.php';
		$numResult = mysql_query("SELECT * FROM tb_jabatan");
		$numRows = mysql_num_rows($numResult);
		$limit = 4;
		if (empty($_GET['offset']))
			$offset = 0;
		else
			$offset = mysql_escape_string($_GET['offset']);
		$query = "SELECT * FROM tb_jabatan LIMIT $offset,$limit";
		$result = mysql_query($query);
		while ($data = mysql_fetch_array($result)) {
			$id = $data['id_jabatan'];
	?>
	<tr>
		<td><?php echo $data['nama_jabatan']; ?></td>
		<td>
			<a href="ed_pros_jab.php?id=<?php echo $id; ?>">Edit</a> &nbsp;
			<a href="del_pros_jab.php?id=<?php echo $id; ?>">Delete</a>
		</td>
	</tr>
	<?php
		}	
		mysql_close();
	?>
</table>
<br>
<?php
	echo "<center>";
	echo "Halaman : ";
	$pages = intval($numRows/$limit);
	if ($numRows%$limit)
		$pages++;
	for ($i=1;$i<=$pages;$i++){
		$newoffset = $limit*($i-1);
		if ($offset==$newoffset)
			echo "$i";
		else
			echo "<a href=\"in_jab.php?offset=$newoffset\">[$i]</a>";
	}
	echo "</center>";
	include 'footer.php';
	}	
?>