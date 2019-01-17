<?php
if(isset($_POST["simpan"])){
	extract($_POST);
	$password=md5($password);
	$gambar=date("ymdhis").$FILES["gambar"]["name"];
	$gambartmp=$_FILES["gambar"]["tmp_name"];
	move_uploaded_file($gambartmp,"../img/$gambar");
	$insert=insert("tpetugas","'$email_petugas','$password','$nama','$gambar'");
	if($insert){
		alert('simpan sukses');
		redir('?hal=petugas');
	}else{
		alert('simpan gagal');
		redir('?hal=petugas_tambah');
	}
}
?>
<form method="post" action="?hal=petugas_tambah&aksi=simpan" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Email petugas</td>
			<td>:</td>
			<td>
				<input type="text" name="email_petugas" required>
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
			<td>Nama Petugas</td>
			<td>:</td>
			<td>
				<input type="text" name="nama" required>
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