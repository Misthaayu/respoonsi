
<link rel="stylesheet" href="asset/css/bootstrap.min.css">
<body class="body-Login-back">
<div class="main">

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<center><h3 class="panel_tittle">Login </h3></center>
				</div>
				<div class="panel-body">
                    <form role="form"  method="post">
                    <fieldset>
                        <div class="form-group">
                          <input class="form-control" placeholder="Email" name="email_pelanggan" id="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                           <input class="form-control"  placeholder="Password" name="password" id="password" type="password" value="">
                       </div>
					  <center><input type="submit" name="login" value="login" class="btn btn-default"></center> 
					  <br>
					  <center><a href="?page=daftar" type="submit" name="daftar" class="btn btn-default">Daftar</a></center>
					</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>

<?php
		if(isset($_POST["login"])){
		extract($_POST);
		$password=md5($password);
		$query=sel("tpelanggan where email_pelanggan='$email_pelanggan' and password='$password'");
		$hasil=nur($query);
		if($hasil > 0){
			$_SESSION['email_pelanggan']=$email_pelanggan;
			alert('login berhasil');
			redir('?page=keranjang');
		} else {
			alert('login gagal');
		}
		}
?>