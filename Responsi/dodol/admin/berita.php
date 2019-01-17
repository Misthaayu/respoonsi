<?php
	$aksi=get("aksi");
	if($aksi=="hapus"){
		$delete=delete("tberita where kode_berita");
		if($delete){
			alert('Hapus Sukses');
			redir('?hal=berita');
		}
	}
?>
<h3>Berita</h3>
<hr>
<a href="?hal=berita_tambah"><input type="button" class="btn btn-default" value="Tambah"></a>
<div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>judul</th>
		<th>isi</th>
		<th>Gambar</th>
		<th colspan="2">Option</th>
	</tr>
	</div>
     </div>
     </div>
	 </div>
	<?php
		$page=get("page","1");
		$paging=paging("select * from tberita","4",$page);
		$no=$paging["no"];
		while($data=far($paging['query'])){
			$no++;
			echo"<tr>
				<td>$no</td>
				<td>$data[judul]</td>
				<td>$data[isi]</td>
				<td><img src='../img/$data[gambar]' style='width:100;height:100px;'></td>
				<td><a href='?hal=berita_ubah&aksi=ubah&id=$data[kode_berita]'><input type='button' class='btn btn-default' value='Edit'></a></td>
				<td><a href='?hal=berita&aksi=hapus&id=$data[kode_berita]'><input type='button' class='btn btn-default' value='Hapus'></a></td>
			</tr>";
		}
	?>
</table>
<center><?=nav("?hal=barang",$paging["jumlah"],$page)?></center>