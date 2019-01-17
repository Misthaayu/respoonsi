<?php
	$aksi=get("aksi");
	if($aksi=="hapus"){
	$id=get("id");
		$delete=delete("tpetugas where email_petugas='$id'");
		if($delete){
			alert('Hapus Sukses');
			redir('?hal=petugas');
		}
	}
?>
<h3>petugas</h3>
<hr>
<a href="?hal=petugas_tambah"><input type="button" class="btn btn-default" value="Tambah"></a>

<div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Email petugas</th>
		<th>Password</th>
		<th>Nama</th>
		<th>Gambar</th>
		<th colspan="2">Option</th>
	</tr>
	</div>
     </div>
     </div>
	 </div>
	<?php
		$page=get("page","1");
		$paging=paging("select * from tpetugas","4",$page);
		$no=$paging["no"];
		while($data=far($paging['query'])){
			$no++;
			echo"<tr>
				<td>$no</td>
				<td>$data[email_petugas]</td>
				<td>$data[password]</td>
				<td>$data[nama]</td>
				<td><img src='../img/$data[gambar]' style='width:100;height:100px;'></td>
				<td><a href='?hal=petugas_ubah&aksi=ubah&id=$data[email_petugas]'><input type='button' class='btn btn-default' value='Edit'></a></td>
				<td><a href='?hal=petugas&aksi=hapus&id=$data[email_petugas]'><input type='button' class='btn btn-default' value='Hapus'></a></td>
			</tr>";
		}
	?>
</table>
<center><?=nav("?hal=barang",$paging["jumlah"],$page)?></center>