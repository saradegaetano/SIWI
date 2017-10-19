<?php
include "variables.inc";
if (!isset($_POST['uname']) || !isset($_POST['psw'])) 
	exit;
$mysqli = new mysqli($host, $user, $pass, $base);
$usu=$_POST['uname'];
$clave=$_POST['psw'];
$r=$mysqli->query("select orden,clave from usuario where usu='$usu'");
if($r->num_rows == 1) {
	$data=$r->fetch_array();
	if (! strcmp(crypt($clave,'Acavatuclave'),$data['clave'])) {
		setcookie("usuario",$data['orden'],0,"/");
		header("location: index.php"); 
		exit;
	}
}
header("location: login.html");
exit;
?>
