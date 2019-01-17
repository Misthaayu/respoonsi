<div class="card">
	<button class="btn btn-primary" onClick="print_d()">Print</button><br><br>
		<script>
			function print_d(){
				window.open("laporan.php","_blank");
			}
		</script>
</div>
<?php
	include"../lib/koneksi.php";
	$aksi=get("aksi");
	if($aksi=="kembali"){
		$id=get("id");
		$email_transaksi=get("email_transaksi");
		$jl=mysql_query("update ttransaksi set status='Dikirim' where kode_transaksi='$id' and email_transaksi='$email_transaksi'");
		if($jl){
			echo"<script>alert('barang dikirim');
			location.href='index.php?hal=transaksi';
			</script>";
		}
	}
	$result=mysql_query("select * from ttransaksi where status='bayar'");
	echo"<h3>transaksi</h3>";
	while($row=mysql_fetch_array($result)){
	echo'
<hr>
<div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
	<tr>
		<th>Email Pelanggan</th>
		<th>Tanggal transaksi</th>
		<th>status</th>
		<th>Nama pelanggan</th>
		<th>Alamat</th>
		<th>Kode pos</th>
		<th>Telpon</th>
		<th colspan="2">Option</th>
	</tr>
		<tr>
			<td>'.$row['email_transaksi'].'</td>
			<td>'.$row['tanggal_transaksi'].'</td>
			<td>'.$row['status'].'</td>
			<td>'.$row['nama_pelanggan'].'</td>
			<td>'.$row['alamat'].'</td>
			<td>'.$row['kodepos'].'</td>
			<td>'.$row['telp'].'</td>
			<td><a href="?hal=transaksi&aksi=kembali&id='.$row['kode_transaksi'].'&email_transaksi='.$row['email_transaksi'].'">Proses</td>
		</tr>
</table>
';
}