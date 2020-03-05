<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tecsolt Datatables</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--=====================================
   PLUGINS DE CSS
   ======================================-->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="vistas/recursos/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vistas/recursos/font-awesome/css/font-awesome.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/recursos/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/recursos/responsive.bootstrap.min.css">
    <!--=====================================
    PLUGINS DE JAVASCRIPT
    ======================================-->
    <!-- jQuery 3 -->
    <script src="vistas/recursos/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/recursos/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="vistas/recursos/jquery.dataTables.min.js"></script>
    <script src="vistas/recursos/dataTables.bootstrap.min.js"></script>
    <script src="vistas/recursos/dataTables.responsive.min.js"></script>
    <script src="vistas/recursos/responsive.bootstrap.min.js"></script>
    <style>
        #alinear {
            text-align: center;
        }
    </style>
</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->
<body>
<?php
echo '<div class="container">';
if (isset($_GET["ruta"])) {

    if (
        $_GET["ruta"] == "inicio"
    ) {
        include "modulos/" . $_GET["ruta"] . ".php";
    } else {
        include "modulos/404.php";
    }
} else {

    include "modulos/inicio.php";
}

echo '</div>';
if (isset($_GET["ruta"])) {
    if ($_GET["ruta"] == "inicio") {
        echo '<script src="vistas/js/inicio.min.js"></script>';
    }
} else {
    echo '<script src="vistas/js/inicio.min.js"></script>';
}
?>

</body>
</html>
