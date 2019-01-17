 <?php
	$aksi=get("aksi");
	if($aksi=="simpan"){
		$tgl=date("Y-m-d");
		$seltrans=query("select left(kode_transaksi,10) from ttransaksi where left(kode_transaksi,10)='$tgl'");
		$count=nur($seltrans);
		if($count==0){
			$no_trans=date("Y-m-d").str_pad(1,4,0,STR_PAD_LEFT);
			
		}else{
			$no_trans=date("Y-m-d").str_pad($count+1,4,0,STR_PAD_LEFT);
		}
		$ins=insert("transaksi","'$no_trans',now(),'".$_SESSION['email_pelanggan']."','bayar'");
		if($ins){
		extract($_POST);
			insert("ttransaksi","'$no_trans','".$_SESSION['email_pelanggan']."',now(),'bayar','$nama','$alamat','$kodepos','$telp'");
			if(!empty($_SESSION['basket'])){
				foreach($_SESSION['basket'] as $key=>$val){
					$barang=sel("tbarang where kode_barang='$key'");
						$ins_det=insert("detail_transaksi","'$no_trans','$key','$val','1'");
						$updatebrg=update("tbarang","jumlah=jumlah-$val where kode_barang='$key'");
						unset($_SESSION['basket'][$key]);
					
				}
			}
			alert("terima kasih sudah menyelesaikan transaksi");
			redir("index.php");
		}
	}
?>