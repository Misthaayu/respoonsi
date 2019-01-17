<?php
	if(isset($_POST["simpan"])){
		extract($_POST);
		$gambar=date("ymdhis").$_FILES["gambar"]["name"];
		$gambartmp=$_FILES["gambar"]["tmp_name"];
		move_uploaded_file($gambartmp,"../img/$gambar");
		$insert=insert("tberita","'','$judul','$isi','$gambar'");
		if($insert){
			alert('simpan sukses');
			redir('?hal=berita');
		}else{
			alert('simpan gagal');
			redir('?hal=berita_tambah');
		}
		}
?>
<form method="post" action="?hal=berita_tambah&aksi=simpan" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Kode Berita</td>
			<td>:</td>
			<td>
				<input type="text" name="kode_berita" required>
			</td>
		</tr>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td>
				<input type="text" name="judul" required>
			</td>
		</tr>
		<tr>
			<td>Isi</td>
			<td>:</td>
			<td>
				<input type="text" name="isi" required>
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
			<td colspan="3">
				<input class="btn btn-default" type="reset" value="Ulang">
				<input class="btn btn-default" type="submit" value="simpan" name="simpan">
			</td>
		</tr>
	</table>
</form>