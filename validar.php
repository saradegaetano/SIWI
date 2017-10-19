<?php
require("connect_db.php");

$usuario=$_POST['usuario'];
$password=$_POST['password'];

$sql=mysql_query("SELECT * FROM login WHERE usuario='$usuario'");
if($f=mysql_fetch_array($sql)){
	if($password==$f['password']){
		header("Location: index.html");
	}
	else {
		echo '<script>alert("Contraseña incorrecta")</script>';
		echo "<script>location.href='login.html'</script>";
	}
}
else {
	echo '<script>alert("el usuario no existe we xD")</script>';
	echo "<script>location.href='login.html'</script>";
}
?>