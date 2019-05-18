<?php
error_reporting(0);
include '../conexion.php';

session_start();

$matri = $_POST['matri'];//obtener campo usuario
$pass = $_POST['pass'];

$q = "SELECT * FROM alumnos WHERE matricula = '$matri'";

$consulta = mysqli_query($con, $q);//EJECUTAR CONSULTA
$filas = mysqli_num_rows($consulta);

if($filas > 0){
    $_SESSION['username'] = $user;
    echo "correcto";
    // header("location:principal.php");
}else{
    echo "Datos incorrectos";
}
mysqli_close($con);//cerrar para evitar consumir recursos

?>