<link rel="stylesheet" href="asset/css/bootstrap.min.css">
<body class="body-Login-back">
<div class="main">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<center><h3 class="panel_tittle">Login </h3>
				<div class="panel-body">
                    <form role="form"  method="post">
                    <fieldset>
                        <div class="form-group">
                          <input class="form-control" placeholder="Email" name="email_petugas" id="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                           <input class="form-control"  placeholder="Password" name="password" id="password" type="password" value="">
                       </div>
					  <input type="submit" name="login" value="login" class="btn btn-default"> 
					</fieldset>
					</form>
				</div>
				</div>
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
		session_start();
		include"../lib/fungsi.php";
		include"../lib/koneksi.php";
		$query=sel("tpetugas where email_petugas='$email_petugas' and password='$password'");
		$hasil=nur($query);
		if($hasil > 0){
			$_SESSION['email_petugas']=$email_petugas;
			alert('login berhasil');
			redir('index.php');
		} else {
			alert('login gagal');
		}
		}
?>