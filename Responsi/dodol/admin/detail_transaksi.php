<?php
	$aksi=get("aksi");
	if($aksi=="hapus"){
		$id=get("id");
		$delete=delete("tdetail_transaksi where kode_transaksi='$id'");
		if($delete){
			alert('Hapus Sukses');
			redir('?hal=detail_transaksi');
		}
	}
?>
<h3>Detail Transaksi</h3>
<hr>
<a href="?hal=detail_tambah"><input type="button" class="btn btn-default" value="Tambah"></a>
<div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Kode Transaksi</th>
		<th>Kode Barang</th>
		<th>Jumlah</th>
		<th>Status</th>
		<th colspan="2">Option</th>
	</tr>
	</div>
     </div>
     </div>
	 </div>
	<?php
		$page=get("page","1");
		$paging=paging("select * from tdetail_transaksi","10",$page);
		$no=$paging["no"];
		while($data=far($paging['query'])){
			$no++;
			echo"<tr>
				<td>$no</td>
				<td>$data[kode_transaksi]</td>
				<td>$data[kode_barang]</td>
				<td>$data[jumlah]</td>
				<td>$data[status]</td>
				<td><a href='?hal=detail_ubah&aksi=edit&id=$data[kode_transaksi]'><input type='button' class='btn btn-default' value='Edit'></a></td>
				<td><a href='?hal=detail_transaksi&aksi=hapus&id=$data[kode_transaksi]'><input type='button' class='btn btn-default' value='Hapus'></a></td>
			</tr>";
		}
	?>
</table>
