<?php
include 'conexion.php';

session_start();

$user = $_POST['username'];//obtener campo usuario
$pass = $_POST['password'];

$q = "SELECT * FROM alumnos WHERE matricula = '$user' AND nip = '$pass'";

$consulta = mysqli_query($con, $q);//EJECUTAR CONSULTA
$filas = mysqli_num_rows($consulta);

if(mysqli_num_rows($consulta)!=0){
    $_SESSION['username'] = $user;
    header("location:principal.php");
}else{
    header("location:index.php");
}
mysqli_close($con);//cerrar para evitar consumir recursos

?>