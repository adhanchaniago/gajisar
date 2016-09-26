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
	<form method="post" action="pros_in_kary.php" enctype="multipart/form-data"> 
		<tr>
			<td colspan="3"><b>Input Data Karyawan</b></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>NIP</td>
			<td>&nbsp;</td>
			<td>
				<input type="text" name="vnip1" size="6" maxlength="8">&nbsp;
				<input type="text" name="vnip2" size="4" maxlength="6">&nbsp;
				<input type="text" name="vnip3" size="1" maxlength="1">&nbsp;
				<input type="text" name="vnip4" size="1" maxlength="3">
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vnama"></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vtmptlhr"></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>&nbsp;</td>
			<td>
				<select name="tgl">
					<option>tgl</option>
					<?php
						for($i=1;$i<=31;$i++){
							echo "<option>$i</option>";
						}
					?>
				</select>
				<select name="bln">
					<option>bln</option>
					<?php
						$nmBln = array('1' => "Januari",'2' => "Februari",'3' => "Maret",'4' => "April",
									'5' => "Mei",'6' => "Juni",'7' => "Juli",'8' => "Agustus",
									'9' => "September",'10' => "Oktober",'11' => "November",'12' => "Desember");
						for($i=1;$i<=12;$i++){
							echo "<option value=$i>$nmBln[$i]</option>";
						}
					?>
				</select>
				<select name="thn">
					<option>thn</option>
					<?php
						$thnSkrg = date('Y');
						for($i=1950;$i<=$thnSkrg;$i++){
							echo "<option>$i</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>&nbsp;</td>
			<td>
				<input type="radio" name="vjekel" value="Pria">Pria&nbsp;
				<input type="radio" name="vjekel" value="Wanita">Wanita
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>&nbsp;</td>
			<td>
				<textarea name="valmt" cols="25" rows="4"></textarea>
			</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vtlp" value="+62"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vemail"></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>&nbsp;</td>
			<td>
				<select name="vstat">
					<option>-Pilih Status-</option>
					<option>Lajang</option>
					<option>Menikah</option>
					<option>Duda</option>
					<option>Janda</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Anak</td>
			<td>&nbsp;</td>
			<td><input type="text" name="vanak" size="2"></td>
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
			<td>Jabatan</td>
			<td>&nbsp;</td>
			<td>
				<select name="vjab">
					<option>-Pilih Jabatan-</option>
				<?php
					include 'koneksi.php';
					$query = "SELECT * FROM tb_jabatan";
					$result = mysql_query($query);
					while($data = mysql_fetch_array($result)){
				?>
					<option value="<?php echo $data['id_jabatan']; ?>"><?php echo $data['nama_jabatan']; ?></option>
				<?php
					}
					mysql_close();
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Foto</td>
			<td>&nbsp;</td>
			<td><input type="file" name="filefoto"></td>
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

<?php
	include 'footer.php';
	}	
?>