<?php
	$kode_barang=get("kode_barang");
?>
<div class="main">
		<?php
				$id=get("id");
				$ambilbarang=sel("tbarang where kode_barang='$id'");
				$hasilbrg=far($ambilbarang);
		?>
		<div class="main-top">
			<div class="section group">
				<div class="content span_1_of_2">	
<div class="about">				
	<div class="thumbnail">
		<h5>About</h5>

		  <img src="img/<?=$hasilbrg['gambar']?>" style="width:500;height:400;" >
		<h3 class="pull-right"><?=rp($hasilbrg['harga'])?></h3>
		<h3><?=$hasilbrg['nama_barang']?></h3>
		<p><?=$hasilbrg['keterangan']?></p>
		
	</div>
	<center><a href="?page=detail_item&ac=add&id=<?=$hasilbrg['kode_barang']?>" class="button5">Beli</a></center>
	</div>	
</div>	
<div class="rightsidebar span_5_of_2">
	<div class="blog-bottom">
		<h2>Komentar</h2>
<i>Jumlah Komentar : <?php 
$t=mysql_query("select * from tkomentar where kode_barang='$kode_barang' and status='1'");
$d=mysql_num_rows($t);
echo $d;
?></i><br />
<br />
<?php
while($s=mysql_fetch_array($t)){
?>
<b><?php echo $s['email_pelanggan'];?></b><br />
<i><?php echo $s['tanggal'];?></i><br />
<?php echo $s['isikomentar'];?><br />
<hr style="border:#999 dashed  1px;" width="100%" />
<?php }?>
<h2>Tambah Komentar</h2>
<form  method="post" action="komentar.php?status=1&kode_barang=<?=get("kode_barang")?>">
  <table width="60%" border="0">
    <?php
	if(!isset($_SESSION['tpelanggan'])){
	?>
   
    <?php }else{?>
    <tr>
      <td>Oleh</td>
      <td><?php echo $_SESSION['tpelanggan'];?></td>
    </tr>
    <?php }?>
    <tr>
      <td>Komentar</td>
      <td><label>
        <textarea name="isikomentar" cols="45" rows="5" class="textarea" id="isikomentar"></textarea>
      </label></td>
    </tr>
    <tr>
      <td><input name="kode_barang" type="hidden" id="id" value="<?php echo $id;?>" /></td>
      <td><label>
        <input name="button" type="submit" class="tombol" id="button" value="Komentar" />
      </label></td>
    </tr>
  </table>
</form>
</div>
  </div>
</body>
</html>  