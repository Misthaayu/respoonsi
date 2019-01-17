<?php
$id=get("id");
$query=sel("tpelanggan where email_pelanggan='$id_pelanggan'");
$data=far($query);
?>
<div class="container">

<center><h3>MY ACCOUNT</h3></center>
<br>
<br>
<div class="col-md-2 col-sm-2 col-xs-12">
</div>
<div class="row">
<div class="col-md-8 col-sm-6 col-xs-12">
<div class="thumbnail">
<center><a href="?page=pelanggan_ubah&aksi=ubah&kode_kategori=<?=$data['email_pelanggan']?>"><input type="button" class='btn btn-default btn-lg' value='Edit'></a></center>
<br>
<form method="post" enctype="multipart/form-data" style="margin-right:50px;">
	<table>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
					<label>Email Pelanggan</label>
					<input type="text" name="email_pelanggan" class="form-control" value="<?=$data['email_pelanggan']?>" readonly>
				</div>
			</div>
		</div>
		<tr>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td colspan="3"></td>
		</tr>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="form-group">
				<label for="exampleInputEmail1">Nama</label>
				<input type="text" name="nama" class="form-control" value="<?=$data['nama']?>" readonly>
			 </div>
			</div>
		</div> 
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="form-group">
				<label for="exampleInputEmail1">Alamat</label>
					<input type="text" name="alamat" class="form-control" value="<?=$data['alamat']?>" readonly>
			  </div>
			</div>
		</div> 
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="form-group">
				<label for="exampleInputEmail1">Kode Pos</label>
					<input type="text" name="kodepos" class="form-control" value="<?=$data['kodepos']?>" readonly>
			  </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="form-group">
				<label for="exampleInputEmail1">Telp</label>
					<input type="text" name="telepon" class="form-control" value="<?=$data['telepon']?>" readonly>
			  </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="form-group">
				<label for="exampleInputEmail1">Gambar</label>
				<br>
				<img src="img/<?=$data["gambar"]?>" style="max-width:150px;max-height:150px;">
			  </div>
			</div>
		</div>
		</div>
	</table>
</form>
</div>
</div>
</div>
