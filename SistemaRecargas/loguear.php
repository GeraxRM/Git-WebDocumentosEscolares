<?php
include 'conexion.php';

session_start();

$user = $_POST['user'];//obtener campo usuario
$pass = $_POST['pass'];

$q = "SELECT * FROM admin WHERE usuario = '$user' and pass = '$pass'";

$consulta = mysqli_query($con, $q);//EJECUTAR CONSULTA
$filas = mysqli_num_rows($consulta);

if($filas > 0){
    $_SESSION['username'] = $user;
    header("location:principal.php");
}else{
    header("location:index.php");
}
mysqli_close($con);//cerrar para evitar consumir recursos

?>