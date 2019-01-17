<?php
	unset ($_SESSION['email_pelanggan']);
	unset ($_SESSION['password']);
	unset ($_SESSION['basket']);
	echo "<script>
	location.href='index.php';
	</script>";
	?>