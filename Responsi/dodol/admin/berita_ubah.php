<?php
	$id=get("id");
	$page=get("page","1");
	$query=sel("tberita where kode_berita='$id'");
	$data=far($query);
?>
<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td>
				<input type="text" name="judul" value="<?=$data['judul']?>" required>
			</td>
		</tr>
		<tr>
			<td>Isi</td>
			<td>:</td>
			<td>
				<input type="text" name="isi" value="<?=$data['isi']?>" required>
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
	update("tberita","judul='$judul',isi='$isi' where kode_berita='$id'") or die (mysql_error());
	redir("?hal=berita");
}
if(isset($_POST["ubah-gambar"])){
	extract($_POST);
	$query=sel("tberita where kode_berita='$id'");
	$gambar=date("ymdhis").$_FILES["gambar"]["name"];
	$gtmpp=$_FILES["gambar"]["tmp_name"];
	move_uploaded_file($gtmpp,"../img/$gambar");
	update("tberita","gambar='$gambar' where kode_berita='$id'");
	redir("?hal=berita");
	}
?>