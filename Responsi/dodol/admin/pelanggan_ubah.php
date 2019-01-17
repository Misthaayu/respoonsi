<?php
	$id=get("id");
	$page=get("page","1");
	$query=sel("tpelanggan where email_pelanggan='$id'");
	$data=far($query);
?>
<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Nama Pelanggan</td>
			<td>:</td>
			<td>
				<input type="text" name="nama" value="<?=$data['nama']?>" required>
			</td>
		</tr>
		<tr>
			<td>Alamat Pelanggan</td>
			<td>:</td>
			<td>
				<input type="text" name="alamat" value="<?=$data['alamat']?>" required>
			</td>
		</tr>
		<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>
				<img src="../img/<?=$data["gambar"]?>" style="max-height:120px;max-width:120px;">
			</td>
		</tr>
		<tr>
			<input type="submit" value="ubah-gambar" name="ubah-gambar">
		</tr>
		<tr>
			<td>
			<input type="file" name="gambar">
			</td>
		</tr>
	</table>
</form>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td>
				<input type="text" name="status" value="<?=$data['status']?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<input type="reset" name="" value="ulang" class="button" maxlength="" required><input type="submit" name="ubah" value="ubah" class="button" maxlength="" required>
			</td>
		</tr>
	</table>
</form>
<?php
if(isset($_POST["ubah"])){
	extract($_POST);
	update("tpelanggan","nama='$nama',alamat='$alamat',status='$status' where email_pelanggan='$id'") or die (mysql_error());
	redir("?hal=pelanggan");
}
if(isset($_POST["ubah-gambar"])){
	extract($_POST);
	$query=sel("tpelanggan where email_pelanggan='$id'");
	$gambar=date("ymdhis").$_FILES["gambar"]["name"];
	$gtmpp=$_FILES["gambar"]["tmp_name"];
	move_uploaded_file($gtmpp,"../img/$gambar");
	update("tpelanggan","gambar='$gambar' where email_pelanggan='$id'");
	redir("?hal=pelanggan");
	}
?>