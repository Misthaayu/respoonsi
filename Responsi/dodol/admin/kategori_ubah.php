<?php
	$id=get("id");
	$page=get("page","1");
	$query=sel("tkategori where kode_kategori='$id'");
	$data=far($query);
?>
<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Nama Kategori</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_kategori" value="<?=$data['nama_kategori']?>" required>
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
	update("tkategori","nama_kategori='$nama_kategori' where kode_kategori='$id'") or die (mysql_error());
	redir("?hal=kategori");
}
?>