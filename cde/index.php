<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>UPEG | ADMIN</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="\SistemaWebDeDocumentosEscolares/cde/static/css/index.css">

</head>
<header class="cabecera">

    <h1 class="text-white text-center">Sistema de Documentos Escolares </h1>

</header>

<body>
    <div class="container modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="\SistemaWebDeDocumentosEscolares/cde/static/img/user.png" />
                </div>

                <form action="\SistemaWebDeDocumentosEscolares/cde/loguear.php" method="POST">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Matrícula" name="username"
                        title="Ingresar Matrícula (8 Digitos)" pattern="[0-9]{8}" required />
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" title="Ingresar NIP (4 Digitos)" 
                         pattern="[0-9]{4}" required />
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar </button>
                </form>

            </div>
        </div>
    </div>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<footer>
    <span> COPYRIGHT | GDO-SISTEMX </span>
</footer>

</html>