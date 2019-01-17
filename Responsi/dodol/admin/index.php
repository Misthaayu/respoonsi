	<?php
	session_start();
	include("../lib/koneksi.php");
	include("../lib/fungsi.php");
	//if(!sess("email_petugas")){redir("login.php");return false;};
	$page=get("page","1");
	include("../lib/cart.php");
?>
<html>
	<head>
	<title>Admin</title>
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
		<link rel="stylesheet" href="../css/style(2).css">
	</head>
	<body>
		<div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="?hal=dashboard">AdminBootstrap 
                </a>
            </div>
            <div class="notifications-wrapper">
			<ul class="nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="?hal=akun">
                        <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                    
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?hal=akun"><i class="fa fa-user-plus"></i> My Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
						</a>
                    </ul>
                </li>
            </ul>   
            </div>
        </nav>
		<nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="../img/user.JPG" class="img-circle" />
                        </div>
                    </li>
                     <li>
                        <a  href="#"> <strong> Mistha Wardoyo </strong></a>
                    </li>
					<li>
                        <a href="?hal=dashboard"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="?hal=barang"><i class="fa fa-file "></i> Barang </a>
                    </li>
                    <li>
                        <a href="?hal=kategori"><i class="fa fa-th "></i> Kategori </a>
                    </li>
                     <li>
                        <a href="?hal=petugas"><i class="fa fa-user "></i> Petugas </a>
                    </li> 
                    <li>
                        <a href="?hal=pelanggan"><i class="fa fa-user "></i> Pelanggan </a>
                    </li>
					<li>
                        <a href="?hal=komentar"><i class="fa fa-user "></i> Komentar </a>
                    </li>
					<li>
                        <a href="?hal=berita"><i class="fa fa-ok-sign "></i> Berita </a>
                    </li>
					<li>
                        <a href="?hal=transaksi"><i class="fa fa-dashcube "></i> Transaksi </a>
                    </li>
					<li>
                        <a href="?hal=laporan"><i class="fa fa-dashcube "></i> Detail Transaksi </a>
					</li>
                </ul>
            </div>
			
			</nav>
			<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
				<?php
					$hal=get("hal","dashboard");
					if($hal){
						require_once("$hal.php");
					}
				?>
			</div>
			</div>
			
		</div>
		 <footer >
        <a>&copy; 2016 YourCompany</a>
    </footer>
		</div>
		</div>
		</div>
		    <script src="jquery.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>