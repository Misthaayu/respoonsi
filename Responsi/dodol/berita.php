<?php
	$n=0;
	$id=get("id");
	$query=sel("tberita");
	while($hasil=far($query)){
	$n++;
?>
<center>
	<div class="container">
	<div class="col-md-5 col-xs-5">
	<div class="thumbnail">
		<h3><?=$hasil["judul"]?></h3>
		<img src="img/<?=$hasil["gambar"]?>" style="width:200;height:200;"></br>
		<p><?=$hasil["isi"]?></p>
		<div class="clear"></div>
		<div class="clear"></div>
	</div>
	</div>
<?php
	}
?>
</div>
</center>