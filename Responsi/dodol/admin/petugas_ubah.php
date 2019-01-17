<?php
	$id=get("id");
	$page=get("page","1");
	$query=sel("tpetugas where email_petugas='$id'");
	$data=far($query);
?>
<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Nama Petugas</td>
			<td>:</td>
			<td>
				<input type="text" name="nama" value="<?=$data['nama']?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<input type="reset" name="" value="ulang" class="button" maxlength="" required><input type="submit" name="ubah" value="ubah" class="button" maxlength="" required>
			</td>
		</tr>
	</table>
</form>
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
<?php
if(isset($_POST["ubah"])){
	extract($_POST);
	update("tpetugas","nama='$nama' where email_petugas='$id'") or die (mysql_error());
	redir("?hal=petugas");
}
if(isset($_POST["ubah-gambar"])){
	extract($_POST);
	$query=sel("tpetugas where email_petugas='$id'");
	$gambar=date("ymdhis").$_FILES["gambar"]["name"];
	$gtmpp=$_FILES["gambar"]["tmp_name"];
	move_uploaded_file($gtmpp,"../img/$gambar");
	update("tpetugas","gambar='$gambar' where email_petugas='$id'");
	redir("?hal=petugas");
	}
?>