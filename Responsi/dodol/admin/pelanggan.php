<?php 
	$id=get("id");
	$status=get("status");
	if($status=="1" || $status=="3"){
		$update=update("tpelanggan","status='2' where email_pelanggan='$id'");
	}else if($status=="2"){
		$update=update("tpelanggan","status='3' where email_pelanggan='$id'");
	}
?>
<h3>Pelanggan</h3>
<hr>
<div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
			<tr>
				<th>No</th>
				<th>Email Pelanggan</th>
				<th>Password</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Gambar</th>
				<th>Status</th>
				<th>Kode Pos</th>
				<th>Telepon</th>
				<th colspan="2">Option</th>
			</tr>
			</div>
     </div>
     </div>
	 </div>
			<?php 
				$l=3;
				$q="select * from tpelanggan";
				$page=paging($q,$l,$page);
				$no=$page['no'];
				while($data=far($page['query'])){
					$no++;
					if($data['status']=="1"){
						$opsi="<a href='?hal=pelanggan&id=$data[email_pelanggan]&status=$data[status]' class='btn' >Terima</a>";
					}else{
						$opsi="<a href='?hal=pelanggan&id=$data[email_pelanggan]&status=$data[status]' class='btn' onclick=\"return confirm('Apakah ingin menonaktifkan akun ini?')\">Suspend</a>";
					}
					echo "
						<tr>
							<td>$no</td>
							<td>$data[email_pelanggan]</td>
							<td>$data[password]</td>
							<td>$data[nama]</td>
							<td>$data[alamat]</td>
							<td><img src='../img/$data[gambar]' width='100' height='100'></td>
							<td>$data[status]</td>
							<td>$data[kodepos]</td>
							<td>$data[telepon]</td>
							<td>$opsi</td>
							<td><a href='?hal=pelanggan&aksi=hapus&id=$data[email_pelanggan]' onclick=\"return confrim('Apakah anda ingin menghapus?')\">Hapus</a></td>
						</tr>
					";
				}
			?>
		</table>
<center><?=nav("?hal=barang",$page["jumlah"],$page)?></center>