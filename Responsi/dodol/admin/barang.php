<?php
	$aksi=get("aksi");
	if($aksi){
		$id=get("id");
		$delete=delete("tbarang where kode_barang='$id'");
		if($delete){
			alert('Hapus Sukses');
			redir('?hal=barang');
		}
	}
?>
<h3>Barang</h3>
<hr>
<a href="?hal=barang_tambah"><input type="button" class="btn btn-default" value="Tambah"></a><br>
 <div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Kode Kategori</th>
		<th>Jumlah</th>
		<th>Gambar</th>
		<th>Keterangan</th>
		<th>Harga</th>
		<th colspan="2">Option</th>
	</tr>
	 </div>
     </div>
     </div>
	 </div>
	<?php
		$page=get("page","1");
		$paging=paging("select * from tbarang","4",$page);
		$no=$paging["no"];
		while($data=far($paging['query'])){
			$no++;
			echo"<tr>
				<td>$no</td>
				<td>$data[nama_barang]</td>
				<td>$data[kode_kategori]</td>
				<td>$data[jumlah]</td>
				<td><img src='../img/$data[gambar]' style='width:100;height:100px;'></td>
				<td>$data[keterangan]</td>
				<td>$data[harga]</td>
				<td><a href='?hal=barang_ubah&aksi=edit&id=$data[kode_barang]'><input type='button' class='btn btn-default' value='Edit'></a></td>
				<td><a href='?hal=barang&aksi=hapus&id=$data[kode_barang]'><input type='button' class='btn btn-default' value='Hapus'></a></td>
			</tr>";
		}
	?>
</table>
<center><?=nav("?hal=barang",$paging["jumlah"],$page)?></center>