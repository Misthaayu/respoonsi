<?php
	$id=get("id");
	$status=get("status");
	if($status!=""){
	if($status=="0"){
			$update=update("tkomentar","status='1' where kode_komentar='$id'");
		}else{
			$update=update("tkomentar","status='0' where kode_komentar='$id'");
		}
		redir("?hal=komentar");
		}
?>
<h3>Komentar</h3> 
<br>
 <div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
	<tr>
		<th class="data">Email</th>
		<th class="data">Tanggal</th>
		<th class="data">Komentar</th>
		<th class="data">Status</th>
		<th class="data">Option</th>
	</tr>
	</div>
     </div>
     </div>
	 </div>
	<?php
		$page=get("page","1");
		$paging=paging("select * from tkomentar","4",$page);
		while($data=far($paging['query'])){
		$status=get("status");
		if($data['status']=="1"){
			$opsi="<a href='?hal=komentar&id=$data[kode_komentar]&status=$data[status]' class='btn btn-default'>Sembunyikan</a>";
			}else{
			$opsi="<a href='?hal=komentar&id=$data[kode_komentar]&status=$data[status]' class='btn btn-default'>Tampil</a>";
			}
			echo"<tr>
				
				<td>$data[email_pelanggan]</td>
				<td>$data[tanggal]</td>
				<td>$data[isikomentar]</td>
				<td>$data[status]</td>
				<td>$opsi</td>
			</tr>";
		}
	?>
</table>
<center><?=nav("?hal=komentar",$paging["jumlah"],$page)?></center>