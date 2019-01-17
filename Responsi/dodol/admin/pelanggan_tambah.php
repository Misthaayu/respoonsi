<?php
	if(isset($_POST["simpan"])){
		extract($_POST);
		$password=md5($password);
		$gambar=date("ymdhis").$_FILES["gambar"]["name"];
		$gambartmp=$_FILES["gambar"]["tmp_name"];
		move_uploaded_file($gambartmp,"../img/$gambar");
		$insert=insert("tpelanggan","',$email_pelanggan','$password','$nama','$alamat','$gambar','$status'");
		if($insert){
			alert('simpan sukses');
			redir('?hal=pelanggan');
		}else{
			alert('simpan gagal');
			redir('?hal=pelanggan_tambah');
		}
		}
?>
<form method="post" action="?hal=pelanggan_tambah&aksi=simpan" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Email pelanggan</td>
			<td>:</td>
			<td>
				<input type="text" name="email_pelanggan" required>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td>
				<input type="password" name="password" required>
			</td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td>:</td>
			<td>
				<input type="text" name="nama" required>
			</td>
		</tr>
			<tr>
			<td>Alamat</td>
			<td>:</td>
			<td>
				<input type="text" name="alamat" required>
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
			<td>Status</td>
			<td>:</td>
			<td>
				<input type="text" name="status" required>
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