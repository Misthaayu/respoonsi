<html>
	<head>
	</head>
		<body>
			<?php 
				//untuk koneksi database
				include "../lib/koneksi.php";
				//untuk menentukan tanggal awal dan tanggal akhir data di database
				$min_tanggal_transaksi=mysqli_fetch_array(mysqli_query("select min(tanggal_transaksi) as min_tanggal_transaksi from ttransaksi"));
				$max_tanggal_transaksi=mysqli_fetch_array(mysqli_query("select max(tanggal_transaksi) as max_tanggal_transaksi from ttransaksi"));
			?>
			<form action="?hal=laporan" method="post" name="postform">
			<h3>Laporan Transaksi</h3>
				<table width="435" border="0">
					<tr>
						<td width="111">Email Pelanggan</td>
						<td colspan="2"><input type="text" name="email_transaksi" value="<?php if(isset($_POST['email_transaksi'])){ echo $_POST['email_transaksi']; }?>"/></td>
					</tr>
					<tr>
						<td>Tanggal Awal</td>
						<td colspan="2"><input type="text" name="tanggal_awal" size="15" value="<?php echo $min_tanggal_transaksi['min_tanggal_transaksi'];?>"/>
						<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="../img/kalender.PNG" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
						</td>
					</tr>
					<tr>
						<td>Tanggal Akhir</td>
						<td colspan="2">
							<input type="text" name="tanggal_akhir" size="15" value="<?php echo $max_tanggal_transaksi['max_tanggal_transaksi'];?>"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;"><img src="../img/kalender.PNG" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal"/></a>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Tampilkan Data" name="cari" class="button">
						</td>
						<td colspan="2">&nbsp;</td>
					</tr>
				</table>
			</form>
			<p>
				<?php
					//diproses jika sudah klik tombol cari
					if(isset($_POST['cari'])){
						//menangkap nilai form
						$email_transaksi=$_POST['email_transaksi'];
						$tanggal_awal=$_POST['tanggal_awal'];
						$tanggal_akhir=$_POST['tanggal_akhir'];
						
						if(empty($email_transaksi) and empty($tanggal_awal) and empty($tanggal_akhir)){
							//jika tidak menginput apa apa
							$query=mysqli_query("select * from ttransaksi");
							$jumlah=mysqli_fetch_array(mysqli_query("select email_transaksi from ttransaksi"));
						}else{
							?><font size="4"><i><b>Informasi :</b>Pencarian Kode Pelanggan<b><?php echo ucwords($_POST['email_transaksi']);?></b>dari tanggal<b><?php echo $_POST['tanggal_awal']?></b>sampai dengan<b><?php echo $_POST['tanggal_akhir']?></b></i></font><?php
							$query=mysqli_query("select * from ttransaksi where email_transaksi like '%$email_transaksi%' and tanggal_transaksi between '$tanggal_awal' and '$tanggal_akhir'");
							$jumlah=mysqli_fetch_array(mysqli_query("select email_transaksi from ttransaksi where email_transaksi like '%$email_transaksi%' and tanggal_transaksi between '$tanggal_awal' and '$tanggal_akhir'"));
						}
						
						?>
			</p>
				<button onClick='window.print();' class='btn btn-primary' type='button'>Print</button>
				 <div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
				<tr class="data">
					<th class="data"><center>Kode Transaksi</center></th>
					<th class="data"><center>Email Pelanggan</center></th>
					<th class="data"><center>Tanggal Transaksi</center></th>
					<th class="data"><center>Status</center></th>
					<th class="data"><center>Nama</center></th>
					<th class="data"><center>Alamat Tujuan</center></th>
					<th class="data"><center>Kode Pos</center></th>
					<th class="data"><center>Telepon</center></th>
				</tr>
				 </div>
     </div>
     </div>
	 </div>
				<?php
					include "../lib/koneksi.php";
					$data=mysqli_query("select * from ttransaksi");
					while($row=mysqli_fetch_array($query)){
					?>	
						<tr>
							<td class="data"><?php echo $row['kode_transaksi'];?></td>
							<td class="data"><?php echo $row['email_transaksi'];?></td>
							<td class="data"><?php echo $row['tanggal_transaksi'];?></td>
							<td class="data"><?php echo $row['status'];?></td>
							<td class="data"><?php echo $row['nama_pelanggan'];?></td>
							<td class="data"><?php echo $row['alamat'];?></td>
							<td class="data"><?php echo $row['kodepos'];?></td>
							<td class="data"><?php echo $row['telp'];?></td>
						</tr>
						<?php
						}
						?>
						<tr>
							<td colspan="4" align="center"><?php
							//jika data tidak ditemukan
							if(mysql_num_rows($query)==0){
								echo "data tidak ditemukan";
							}
							?></td>
						</tr>
			</table>
			<?php
			}else{
				unset($_POST['cari']);
			}?>
			
			<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
		</body>
</html>