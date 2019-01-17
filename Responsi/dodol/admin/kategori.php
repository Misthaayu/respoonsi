<?php
	$aksi=get("aksi");
	if($aksi=="hapus"){
		$id=get("id");
		$delete=delete("tkategori where kode_kategori='$id'");
		if($delete){
			alert('Hapus Sukses');
			redir('?hal=kategori');
		}
	}
?>
<h3>kategori</h3>
<hr>
<a href="?hal=kategori_tambah"><input type="button" class="btn btn-default" value="Tambah"></a>
 <div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tr>
					<th>No</th>
					<th>Kode kategori</th>
					<th>Nama kategori</th>
					<th colspan="2">Option</th>
				</tr>
            </div>
            </div>
            </div>
			</div>
	<?php
		$page=get("page","1");
		$paging=paging("select * from tkategori","4",$page);
		$no=$paging["no"];
		while($data=far($paging['query'])){
			$no++;
			echo"<tr>
				<td>$no</td>
				<td>$data[kode_kategori]</td>
				<td>$data[nama_kategori]</td>
				<td><a href='?hal=kategori_ubah&aksi=edit&id=$data[kode_kategori]'><input type='button' class='btn btn-default' value='Edit'></a></td>
				<td><a href='?hal=kategori&aksi=hapus&id=$data[kode_kategori]'><input type='button' class='btn btn-default' value='Hapus'></a></td>
			</tr>";
		}
	?>
</table>