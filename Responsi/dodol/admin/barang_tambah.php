<?php
	if(isset($_POST["simpan"])){
		extract($_POST);
		$gambar=date("ymdhis").$_FILES["gambar"]["name"];
		$gambartmp=$_FILES["gambar"]["tmp_name"];
		move_uploaded_file($gambartmp,"../img/$gambar");
		if($harga<0){
			alert('maaf harga tidak bisa minus');
		}
		else{
		$insert=insert("tbarang","'','$nama_barang','$kode_kategori','$jumlah','$gambar','$keterangan','$harga'");
		if($insert){
			alert('simpan sukses');
			redir('?hal=barang');
		}else{
			alert('simpan gagal');
			redir('?hal=barang_tambah');
		}
		}
		}
?>
<form method="post" action="?hal=barang_tambah&aksi=simpan" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Nama barang</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_barang" required>
			</td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>:</td>
			<td>
				<select name="kode_kategori" required>
				
					<?php
						$q=sel("tkategori order by nama_kategori asc");
						while($hasil2=far($q)){
							echo"<option value='$hasil2[kode_kategori]'>$hasil2[nama_kategori]</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>:</td>
			<td>
				<input type="text" name="jumlah" required>
			</td>
		</tr>
		<tr>
			<td>gambar</td>
			<td>:</td>
			<td>
				<input type="file" name="gambar" required>
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td>
				<input type="text" name="keterangan" required>
			</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td>
				<input type="text" name="harga" required>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<input class="btn btn-default" type="reset" value="ulang">
				<input class="btn btn-default" type="submit" value="simpan" name="simpan">
			</td>
		</tr>
	</table>
</form>