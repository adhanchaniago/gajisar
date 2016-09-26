<?php
	session_start();
	if (empty($_SESSION['uid'])) { 
		header("location:index.php"); 
	}
	else{ 
	$uid = $_SESSION['uid'];
	include 'header.php';
?>
<h3>Data Karyawan</h3>
<table class="my" width="100%" cellspacing="0">
	<tr>
		<td><b>NIP</b></td>
		<td><b>Nama</b></td>
		<td><b>Golongan</b></td>
		<td><b>Jabatan</b></td>
		<td><b>Aksi</b></td>
	</tr>
	<?php
		include 'koneksi.php';
		$numResult = mysql_query("SELECT * FROM view_kary");
		$numRows = mysql_num_rows($numResult);
		$limit = 10;
		if (empty($_GET['offset']))
			$offset = 0;
		else
			$offset = mysql_escape_string($_GET['offset']);
		$query = "SELECT * FROM view_kary LIMIT $offset,$limit";
		$result = mysql_query($query);
		while ($data = mysql_fetch_array($result)) {
			$id = $data['nip'];
	?>
	<tr>
		<td><?php echo $data['nip']; ?></td>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['nama_golongan']; ?></td>
		<td><?php echo $data['nama_jabatan']; ?></td>
		<td>
			<a href="ed_pros_gol.php?id=<?php echo $id; ?>">Lihat</a> &nbsp;
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
			echo "<a href=\"in_gol.php?offset=$newoffset\">[$i]</a>";
	}
	echo "</center>";
	include 'footer.php';
	}	
?>
