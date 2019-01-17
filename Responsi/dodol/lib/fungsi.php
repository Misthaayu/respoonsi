<?php
	function post($p,$a=""){
		return isset($_POST["$p"])?$_POST["$p"]:"$a";
	}
	function get($p,$a=""){
		return isset($_GET["$p"])?$_GET["$p"]:"$a";
	}
	function sess($p,$a=""){
		return isset($_SESSION["$p"])?$_SESSION["$p"]:"$a";
	}
	function query($q){
		return mysqli_query($q);
	}
	function sel($t,$f="*"){
		return mysqli_query("select $f from $t ");
	}
	function insert($t,$f){
		return mysql_query("insert into $t values($f)");
	}
	function update($t,$f){
		return mysqli_query("update $t set $f");
	}
	function delete($t){
		return mysqli_query("delete from $t");
	}
	function far($q){
		return mysqli_fetch_array($q);
	}
	function nur($q){
		return mysqli_num_rows($q);
	}
	function rp($d){
		return "Rp ".number_format($d);
	}
	function alert($a){
		echo"<script>alert('$a')</script>";
	}
	function redir($url){
		echo"<script>location.href='$url';</script>";
	}
	function back(){
		echo"<script>history.back();</script>";
	}
	function paging($q,$l,$p){
		$off=($p-1)*$l;
		$query=query("$q limit $off,$l");
		$jum=ceil(nur(query($q))/$l);
		$paging=array("q"=>$query,"j"=>$jum,"no"=>$off);
		return $paging;
	}
	function nav($url,$j,$p){
		for($i=1;$i<=$j;$i++){
			if($i==$p) echo"<span>$i</span>";
			else echo"<a href='$url&pg=$i'>$i</a>";
		}
	}
	
?>