<?php
	$bdiskon=sel("tbarang where kode_kategori='1' limit 0,15");
	$all=sel("tbarang order by kode_kategori asc limit 0,8");
	$hpromo=sel("tbarang where kode_kategori='2' limit 0,3");
?>
<div class="main">
		<div class="main-top">
<div class="banner">
 <div id="wrapper">
 		<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?php
					$n=0;
					while($bpromo=far($hpromo)){
					if($n==0){
						?>
				<img src="img/<?=$bpromo['gambar']?>" alt="img1" style="width:1300px; height:400px;" >
				<?php
				} else{
					
					?>
					<img src="img/<?=$bpromo['gambar']?>" alt="img1" style="width:1300px; height:400px;"  >
				<?php
					}
					$n++;
				}
			?>
            </div>
        </div>
 </div>
</div>

			
			<div class="content_top">
	    		<div class="heading">
	    			<h3>Diskon</h3>
	    		</div>
	    		<div class="clear"></div>
    	    </div>
    		<div class="section group">
			<?php
			$n=0;
				while($hasil=far($bdiskon)){
				if($n==0){
			?>
			<div class="col_1_of_4 span_1_of_4">
						<div class="view effect">
					        <center><a href="?page=detail_item&id=<?=$hasil['kode_barang']?>"><img src="img/<?=$hasil['gambar']?>" style="width:200px; height:100px;" ></a></center>
					     </div>
							<div class="cart">
								<p class="title" style="height: 38px;"><?=rp($hasil['harga'])?></p>
								<div class="price" style="height: 19px;">
				        				<span class="actual"><?=$hasil['nama_barang']?></span>
				        		</div>
								<br>
								<a href="?page=muka&ac=add&kode_barang=<?=$hasil['kode_barang']?>"><input type="submit" value="Buy" class="button5"></a> 
							</div>
				</div>
				<?php
			}
		}
?>
				<div class="clear"></div>
			</div>
			<div class="content_top">
	    		<div class="heading">
	    			<h3>All Products</h3>
	    		</div>
    		   <div class="clear"></div>
    	   </div>
    	   <div class="section group">
		   <?php
			$n=0;
				while($ball=far($all)){
				if($n==0){
			?>
				<div class="col_1_of_4 span_1_of_4">
					<div class="view effect">
				         <a href="?page=detail_item&id=<?=$ball['kode_barang']?>"><img img src="img/<?=$ball['gambar']?>" style="width:200px; height:100px;"></a>
				     </div>
						<div class="cart">
							<p class="title" style="height: 38px;"><?=rp($ball['harga'])?></p>
							<div class="price" style="height: 19px;">
			        				<span class="actual"><?=$ball['nama_barang']?></span>
			        		</div>
							<br>
							<a href="?page=muka&ac=add&kode_barang=<?=$ball['kode_barang']?>"><input type="submit" value="Buy" class="button5"></a> 
						</div>
				</div>
			<?php
			}
			}
			?>
				<div class="clear"></div>
			</div>
		</div>
    <div class="footer-bottom">
	 		<div class="row">
							<div class="col-md-12">
								<p class="pull-right"><a href="#">Back to Top</a></p>
								<p>Design 2016 <a href="#">Privacy</a> . <a href="#">Terms</a></p>
							</div>
						</div>
			
			<div class="clear"></div>	
	 </div>
	</div>