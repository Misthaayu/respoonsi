<?php
	session_start();
	include"lib/koneksi.php";
	include"lib/fungsi.php";
	include"lib/cart.php";
	$id_pelanggan=sess("email_pelanggan");
	
?>
<html>
<head>
<title>Art Shop</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="asset/css/bootstrap.min.css">
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
	
<!-- thumbs -->
<script src="js/home.js"></script>
<script src="js/jquery.carouFredSel-6.0.5-packed.js"></script>
	<script type="text/javascript">
       $("#foo1").carouFredSel();
    </script>
	<script type="application/javascript">
		function isNumberKey(evt){
			var charCode = (evt.which)?evt.which : event.keyCode
			if((charCode<65) || (charCode==32))
			return false;
			return true;
		}
	</script>
	<script type="application/javascript">
		function isNumberKeyTrue(evt){
			var charCode = (evt.which)?evt.which : event.keyCode
			if(charCode>65)
			return false;
			return true;
		}
	</script>
</head>
<body>
<div class="wrap">
    <div class="header">
		
		<div class="header-bot">
			<div class="logo">
				<a href="index.php"><img src="img/logo.PNG" alt="" style="width:267;height:70;"/></a>
			</div>
			<div class="top-nav">
			<?php
				$total=0;
				if(!empty ($_SESSION['basket'])){
					foreach($_SESSION['basket']as $key=>$val){
						$total+=$val;
					}
				}
			?>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="?page=keranjang"> Keranjang (<?=$total?>)</a></li>
					<li><a href="?page=akun">My Account</a></li>
					<li><a href="?page=berita">Berita</a></li>
					<?php
				if(!isset($_SESSION['email_pelanggan'])){
				?>
				<li><a href="?page=login">Login</a></li>
				<?php
					} else {
				?>
					<li><a href="?page=logout">Logout</a></li>
				<?php
					}
				?>
				</ul>
			</div>
			<div class="clear"></div> 
		</div>
	
</div>
<?php
			$page=get("page","muka");
				require_once"$page.php";
		?>
 </div>
</body>
</html>