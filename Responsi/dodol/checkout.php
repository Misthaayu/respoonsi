<?php
	if(! empty($_SESSION['email_pelanggan'])){
		$q=sel("tpelanggan where email_pelanggan='".$_SESSION['email_pelanggan']."'");
		$que=sel("tkategori");
		$data=far($q);
	}
?> 
<div class="main">
		<div class="main-top">
			<!-- CONTENT -->
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-sm-7 col-xs-12">
							 <div class="panel panel-primary">
							  <div class="panel-heading">Shipping Addres</div>
							  <div class="panel-body">
								<form role="form" method="post" action="?page=simpan_order&aksi=simpan">
								<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
								  <div class="form-group">
									<label>Email Pelanggan</label>
									<input type="text" class="form-control" value="<?=$data['email_pelanggan']?>">
								  </div>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
								  <div class="form-group">
									<label for="exampleInputEmail1">Nama</label>
									<input type="text" name="nama" class="form-control" value="<?=$data['nama']?>" onkeypress='return isNumberKey(event)'>
								  </div>
								</div>
								</div> 
								<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
								  <div class="form-group">
									<label for="exampleInputEmail1">Alamat</label>
									<input type="text" name="alamat" class="form-control" value="<?=$data['alamat']?>">
								  </div>
								</div>
								</div> 
								<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
								  <div class="form-group">
									<label for="exampleInputEmail1">Kode Pos</label>
									<input type="text" name="kodepos" class="form-control" value="<?=$data['kodepos']?>" onkeypress='return isNumberKeyTrue(event)'>
								  </div>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
								  <div class="form-group">
									<label for="exampleInputEmail1">Telp</label>
									<input type="text" name="telp" class="form-control" value="<?=$data['telepon']?>" onkeypress='return isNumberKeyTrue(event)'>
								  </div>
								</div>
								</div>
								<input type="submit" name="simpan" value="Order" class="btn btn-lg btn-success btn-block">
							</form>
							</div>
							</div>
							<!-- -->
								
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<div class="panel panel-success">
							  <div class="panel-heading">
								<span class="pull-right"><a href="#">Edit Chart</a></span>
								Review Order
							  </div>
							  <div class="panel-body">
								<div class="row">
									<?php
										$n=0;
										$tmp=0;
										if(!empty($_SESSION['basket'])){
											foreach($_SESSION['basket'] as $key => $val){
												$barang=sel("tbarang where kode_barang='$key'");
												$pbarang=far($barang);
												$n++;
												$tmp+=$pbarang['harga']*$val;
												?>
											
									<div class="col-md-4 col-sm-4">
										<img class="img-responsive" src="img/<?=$pbarang['gambar']?>" style="width:100; height:100;">
									</div>
									<div class="col-md-6  col-sm-6">
										<span style="font-size:16px;"><?=$pbarang['nama_barang']?></span><br>
										<span style ="color:rgba(99, 95, 95, 0.86);"><?=$val?></span>
									</div>
									<div class="col-md-2 col-sm-2">
										<span class="pull-right" style="font-weight:bold;font-size:20px;"><?=rp($pbarang['harga']*$val)?><span>
									</div>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
							
								<?php
									}
										}
									?>
									</div>
									<hr>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<span style="font-weight:bold;font-size:20px;" >Sub total</span>
									</div>
									<div class="col-md-6 col-sm-6">
										<span class="pull-right" style="font-weight:bold;font-size:20px;"><?=rp($tmp)?><span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<span style="font-weight:bold;font-size:20px;" >Shipping</span>
									</div>
									<div class="col-md-6 col-sm-6">
										<span class="pull-right" style="font-weight:bold;font-size:20px;">0<span>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<span style="font-weight:bold;font-size:20px;color:green;" >Grand Total</span>
									</div>
									<div class="col-md-6 col-sm-6">
										<span class="pull-right" style="font-weight:bold;font-size:20px;color:green;">0<span>
									</div>
								</div>
							  </div>
							  
							</div>
						</div>
					</div>
				</div>
				
			<!-- END CONTENT -->
	<footer>
						<div class="row">
							<div class="col-md-12">
								<p class="pull-right"><a href="#">Back to Top</a></p>
								<p>Design by 2016 <a href="#">Privacy</a> . <a href="#">Terms</a></p>
							</div>
						</div>
					</footer>
				</div>
			<!-- End footer -->
			</div>
				</div>