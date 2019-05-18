<?php
  error_reporting(0);
  include 'conexion.php';
  session_start();
    $usuario = $_SESSION['username'];
    if(!isset($usuario)){
      header("location: index.php");
    }
   $q = "SELECT * FROM alumnos WHERE matricula = '$usuario'";
  $consulta = mysqli_query($con, $q);//EJECUTAR CONSULTA
  $filas = mysqli_num_rows($consulta);
  $dato = $consulta->fetch_assoc();
  $sald_old = $dato['saldo'];
//#################################################################
if(isset($_POST['const'])){
  // $matri = $_POST['matri'];//obtener campo usuario
  // $pass = $_POST['pass'];
  $const = $_POST['const']; 
  // echo ('constancia'.$const);
  // echo ('<br>');
  if($filas > 0){
    $cal = "SELECT * FROM documentos WHERE id_doc = '$const'";
    $res = mysqli_query($con,$cal);
    while($r = $res->fetch_assoc()){
      $doc = $r['precio'];
    }
    // echo ('<br>');
    // echo ($doc);
    // echo ('<br>');
    if($sald_old >= $doc){
      $sald_new = $sald_old - $doc;
      $pago = "UPDATE alumnos SET saldo='$sald_new' WHERE matricula = '$usuario'";
      $res = mysqli_query($con,$pago);
            // echo "correcto";
            // echo "<br>";
            echo "$sald_new";
            header("location:constancia.php");

    }else{
      echo "Saldo Insuficiente";
    }
  
  }else{
    echo "Datos incorrectos";
    mysqli_close($con);//cerrar para evitar consumir recursos

  }
}
//#################################################################
      if(isset($_POST['kard']) ){
  // $matri = $_POST['matri'];//obtener campo usuario
  // $pass = $_POST['pass'];
  $kard = $_POST['kard'];
  // echo ('kardex'.$kard);
  // echo ('<br>');
  if($filas > 0){
    $cal = "SELECT * FROM documentos WHERE id_doc = '$kard'";
    $res = mysqli_query($con,$cal);
    while($r = $res->fetch_assoc()){
      $doc = $r['precio'];
    }
    // echo ('<br>');
    // echo ($doc);
    // echo ('<br>');
    if($sald_old >= $doc){
      $sald_new = $sald_old - $doc;
      $pago = "UPDATE alumnos SET saldo='$sald_new' WHERE matricula = '$usuario'";
      $res = mysqli_query($con,$pago);
            // echo "correcto";
            // echo "<br>";
            echo ($sald_new);
            header("location:kardex.php");

    }else{
      echo "Saldo Insuficiente";
    }
  }else{
    echo "Datos incorrectos";
    mysqli_close($con);//cerrar para evitar consumir recursos  
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CDE</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Regna
    Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a class="text-white vert" style="font-size: 35px" href="#hero">
          <h1>UPEG</h1>
        </a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="text-center"><a href="#hero">Alumno <h5><?php echo($dato['nombre']);?></h5></a></li>
          <li class="text-center"><a href="#hero">Matrícula <h5><?php echo($usuario);?></h5></a></li>
          <li class="text-center"><a href="#hero">Saldo <h5><?php echo('$'.$dato['saldo']);?></h5></a></li>
          <li class="text-center"><a href="salir.php"><h4>Salir</h4></a></li>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Selecciona un documento</h1>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
        <button type="submit" class="btn-get-started bg-transparent " name="const" value="1">Constancia</button> 

        <button type="submit" class=" btn-get-started bg-transparent " name="kard" value="2">Kardex
        </button>
      </form>



    </div>
  </section><!-- #hero -->

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>GDO-SYSTEMX</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>

</html>