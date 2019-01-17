<?php
	$ac=isset($_GET['ac'])?$_GET['ac']:"";
	$jumlah=0;
	if($ac){
		$kode_barang=isset($_GET['kode_barang'])?$_GET['kode_barang']:0;
		switch($ac){
			case 'add' :
			if(!empty($_SESSION['basket'])){
				foreach($_SESSION['basket']as $key=>$val){
					$jumlah++;
				}
			}
			if($jumlah<=3)
			{
				if(!empty($_SESSION['basket'][$kode_barang])){
					$_SESSION['basket'][$kode_barang] += 1;
				} else{
					$_SESSION['basket'][$kode_barang] =1;
				}
			}
			else{
				echo"<script>alert('pembelian melampaui batas')</script>";
			}
			break;
			case 'up' :
			
			if(! empty($_SESSION['basket'])){
				$jum=isset($_POST['jum'])?$_POST['jum']:"";
				$hst=isset($_POST['hst'])?$_POST['hst']:"";
					
					foreach($jum as $key => $val){
						if($jum[$key] > $hst [$key]){
							alert("barang ra cukup!!!");
							redir("?page=keranjang");
						}
						else{
							$_SESSION['basket'][$key]=$val;
						}
					}
				}
				else{
					$p="<fieldset class='alert'>barang tidk ada di keranjang</fieldset>";
				}
				break;
				case 'dl':
				if(! empty($_SESSION['basket'][$kode_barang])){
					unset($_SESSION['basket'][$kode_barang]);
				}
				else{
					$p="<fieldset class='alert'>barang tidak ada di keranjang!</fieldset>";
				}
				break;
			}
				if(! empty($_SESSION['basket'])){
						$basket=$_SESSION['basket'];
					}
		}
?>