<?php
include"lib/koneksi.php";
session_start();
$kode_barang=isset($_GET['kode_barang'])?$_GET['kode_barang']:"";
$status=$_GET['status'];
$isikomentar=$_POST['isikomentar'];
$email_pelanggan=isset($_SESSION['email_pelanggan'])?$_SESSION['email_pelanggan']:"
";
mysql_query("insert into tkomentar(kode_barang,email_pelanggan,tanggal,isikomentar,status)values('$kode_barang','$email_pelanggan',now(),'$isikomentar','0')");
echo"<script>alert('Komentar Ditambahkan ! Mohon Tunggu verifikasi');
	location.href='index.php';
</script>";
?>