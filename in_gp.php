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
	<form method="post" action="pros_in_gp.php">
		<tr>
			<td colspan="3"><b>Input Gaji Pokok</b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>Golongan</td>
			<td>&nbsp;</td>
			<td>
				<select name="vgol">
					<option>-Pilih Golongan-</option>
				<?php
					include 'koneksi.php';
					$query = "SELECT * FROM tb_golongan ORDER BY nama_golongan ASC";
					$result = mysql_query($query);
					while($data = mysql_fetch_array($result)){
				?>
					<option value="<?php echo $data['id_golongan']; ?>"><?php echo $data['nama_golongan']." - ".$data['pangkat']; ?></option>
				<?php
					}
					mysql_close();
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Gaji Pokok</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vgp" autofocus required></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="right">
				<button type="submit">SIMPAN</button>&nbsp;
				<a href="home.php"><button type="button">BATAL</button></a>
			</td>
		</tr>
	</form>
</table>
<br><br>
<h3>Data Gaji Pokok</h3>
<table class="my" width="100%" cellspacing="0">
	<tr>
		<td><b>Golongan</b></td>
		<td><b>Pangkat</b></td>
		<td><b>Gaji Pokok</b></td>
		<td>Aksi</td>
	</tr>
	<?php
		include 'koneksi.php';
		include 'rupiah.php';
		$numResult = mysql_query("SELECT * FROM view_gaji_pokok");
		$numRows = mysql_num_rows($numResult);
		$limit = 4;
		if (empty($_GET['offset']))
			$offset = 0;
		else
			$offset = mysql_escape_string($_GET['offset']);
		$query = "SELECT * FROM view_gaji_pokok ORDER BY nama_golongan ASC LIMIT $offset,$limit";
		$result = mysql_query($query);
		while ($data = mysql_fetch_array($result)) {
			$id = $data['id_gajipokok'];
	?>
	<tr>
		<td><?php echo $data['nama_golongan']; ?></td>
		<td><?php echo $data['pangkat']; ?></td>
		<td><?php echo buatrp($data['jumlah_gajipokok']); ?></td>
		<td>
			<a href="ed_pros_gp.php?id=<?php echo $id; ?>">Edit</a> &nbsp;
			<a href="del_pros_gp.php?id=<?php echo $id; ?>">Delete</a>
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
			echo "<a href=\"in_gp.php?offset=$newoffset\">[$i]</a>";
	}
	echo "</center>";
	include 'footer.php';
	}	
?>