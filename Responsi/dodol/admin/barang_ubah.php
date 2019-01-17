<?php
	$id=get("id");
	$page=get("page","1");
	$query=sel("tbarang where kode_barang='$id'");
	$data=far($query);
?>
<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Nama barang</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_barang" value="<?=$data['nama_barang']?>" required>
			</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>:</td>
			<td>
				<input type="text" name="jumlah" value="<?=$data['jumlah']?>" required>
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td>
				<input type="text" name="keterangan" value="<?=$data['keterangan']?>" required>
			</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td>
				<input type="text" name="harga"  value="<?=$data['harga']?>"required>
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
	update("tbarang","nama_barang='$nama_barang',jumlah='$jumlah',keterangan='$keterangan',harga='$harga'where kode_barang='$id'") or die (mysql_error());
	redir("?hal=barang");
}
if(isset($_POST["ubah-gambar"])){
	extract($_POST);
	$query=sel("tbarang where kode_barang='$id'");
	$gambar=date("ymdhis").$_FILES["gambar"]["name"];
	$gtmpp=$_FILES["gambar"]["tmp_name"];
	move_uploaded_file($gtmpp,"../img/$gambar");
	update("tbarang","gambar='$gambar' where kode_barang='$id'");
	redir("?hal=barang");
	}
?>