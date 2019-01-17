<?php
	if(isset($_POST["daftar"])){
		extract($_POST);
		$password=md5($password);
		$gambar=date("ymdhis").$_FILES["gambar"]["name"];
		$gambartmp=$_FILES["gambar"]["tmp_name"];
		move_uploaded_file($gambartmp,"img/$gambar");
		alert($kel.$kec.$kota.$prop);
		$r=far(select("inf_lokasi where lokasi_id='$kel'"));
		$kel=$r=['lokasi_nama'];
		$c=far(select("inf_lokasi where lokasi_id='$kec'"));
		$kec=$c=['lokasi_nama'];
		$t=far(select("inf_lokasi where lokasi_id='$kota'"));
		$kota=$t=['lokasi_nama'];
		$pr=far(select("inf_lokasi where lokasi_id='$prop'"));
		$prop=$pr=['lokasi_nama'];
		$alamat= $alamat ." " .$kel ." " .$kec ." " .$kota ." " .$prop;
		$insert=insert("tpelanggan","'$email_pelanggan','$password','$nama','$alamat','$gambar','1','$kodepos','$telepon'");
		if($insert){
			alert('Daftar Sukses, Silahkan Login');
			redir('?page=login');
		}else{
			alert('Daftar gagal');
			redir('?page=daftar');
		}
		}
?>

<link rel="stylesheet" href="asset/css/bootstrap.min.css">
<div class="main">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<center><h3 class="panel_tittle">Daftar </h3></center>
				</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                          <input class="form-control" placeholder="Email" name="email_pelanggan" id="email_pelanggan" type="email" autofocus>
                        </div>
                        <div class="form-group">
                           <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                       </div>
					   <div class="form-group">
                           <input class="form-control" placeholder="Nama Pelanggan" name="nama" id="nama"  value="">
                       </div>
					   <div class="form-group">
                           <input class="form-control" placeholder="Alamat" name="alamat" id="alamat"  value="">
						   <table>
								<tr>
								<td>Pilih Provinsi</td>
								<td>:</td>
								<td>
									<script type="text/javascript" src="js/ajax_kota.js"></script>
									<select name="prop" id="prop" onchange="ajaxkota(this.value)">
										<option value="">Pilih Provinsi</option>
										<?php 
										$queryProvinsi=mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
										while ($dataProvinsi=mysql_fetch_array($queryProvinsi)){
											echo '<option value="'.$dataProvinsi['lokasi_propinsi'].'">'.$dataProvinsi['lokasi_nama'].'</option>';
										}
										?>
									<select>
								</td>
							</tr>
							<tr>
								<td>Pilih Kota/Kab</td>
								<td>:</td>
								<td>
									<select name="kota" id="kota" onchange="ajaxkec(this.value)" required>
										<option value="">Pilih Kota</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Pilih Kec</td>
								<td>:</td>
								<td>
									<select name="kec" id="kec" onchange="ajaxkel(this.value)">
										<option value="">Pilih Kecamatan</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Pilih Kelurahan/Desa</td>
								<td>:</td>
								<td>
									<select name="kel" id="kel">
										<option value="">Pilih Kelurahan/Desa</option>
									</select>
								</td>
							</tr>
							</table>
                       </div>
                       </div>
					   <div class="form-group">
                           <input class="form-control" placeholder="Kode Pos" name="kodepos" id="kodepos"  value="">
                       </div>
					   <div class="form-group">
                           <input class="form-control" placeholder="No Telp" name="telepon" id="telepon"  value="" onKeyPress='return isNumberKeyTrue(event)'>
                       </div>
					   <div class="form-group">
                           <input class="form-control" placeholder="Gambar" name="gambar" id="gambar" type="file" value="">
                       </div>
					  <center><input type="submit" name="daftar" value="Daftar" class="btn btn-lg btn btn-default"></center>
					</fieldset>
					</form>
					</div>
					</div>
</div>
</div>
</div>