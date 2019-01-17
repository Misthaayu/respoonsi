		<!-- content -->
					<form method="post" action="?page=keranjang&ac=up">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="panel-title">
								<div class="row">
									<div class="col-md-6">
										<h5><span class="glyphicon glyphicon-shoping-cart"></span>Cart</h5>
									</div>
									<div class="col-md-6">
										<a href="index.php" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-share-alt"></span>Continou Shoping</a>
									</div>
								</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<?php
										$n=0;
										$tmp=0;
										if(!empty($_SESSION['basket'])){
											foreach($_SESSION['basket'] as $key=>$val){
													$barang=sel("tbarang where kode_barang='$key'");
													$dbarang=far($barang);
													$n++;
													$tmp+=$dbarang['harga']*$val;
													?>
											
									<div class="col-md-2 col-xs-12">
										<img class="img-responsive" src="img/<?=$dbarang['gambar']?>" width="150" height="70"> 
									</div>
									<div class="col-md-2 col-xs-10">
										<h4><strong><?=$dbarang['nama_barang']?></strong></h4>
										<h4><small><?=substr($dbarang['keterangan'],0,30)?></small></h4>
									</div>
									<div class="col-md-8 col-xs-12">
										<div class="col-md-6 text-right">
											<h4><strong><?=rp($dbarang['harga'])?></strong> x</h4>
										</div>
										<div class="col-md-2 col-xs-6">
											<input type="text" class="form-control input-sm" name="jum[<?=$key?>]" value="<?=$val?>">
											<input type="hidden" class="form-control input-sm" value="<?=$dbarang['jumlah']?>" name="hst[<?=$key?>]">
											<input type="text" class="form-control input-sm" value="<?=$dbarang['jumlah']?>" name="hst1[<?=$key?>]" disabled>
										</div>
										<div class="col-md-2 text-left">
											<h4><strong><?=rp($dbarang['harga']*$val)?></strong></h4>
										</div>
										<div class="col-md-2 col-xs-2">
											<a href="?page=keranjang&ac=dl&id=<?=$key?>"class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
										</div>
									</div>
								<br>
								<br>
								<br>
								<br><br>
								<br><br>
								<?php
								}
										}
									?>
									</div>
								<hr>
									
								<div class="row">
									<div class="col-md-9 col-xs-12 text-right">
										<h5>Added Item</h5>
									</div>
									<div class="col-md-3 col-xs-12">
										<button class="btn btn-default btn-sm btn-block">Update Cart</button>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-9 col-xs-12 text-right">
										<h4><strong><?=rp($tmp)?></strong></h4>
									</div>
									<div class="col-md-3 col-xs-12">
										<?php
											$a=sess("email_pelanggan");
											if($a==""){
										?>
										<a href="?page=login"class="btn btn-primary btn-sm btn-block">Login Untuk Lanjut</a>
										<?php
											}else{
										?>
										<a href="?page=checkout"class="btn btn-primary btn-sm btn-block">Checkout</a>
										<?php
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		<!-- end content -->
			<!-- End footer -->
			<script src="asset/js/jquery-2.1.1.js"></script>
			<script src="jquery.min.js"></script>
			<script src="asset/js/bootstrap.min.js"></script>