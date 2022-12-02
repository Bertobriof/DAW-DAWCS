<?php 
/*## Ejercicio 1
Cuenta el número de visitas que realiza un usuario a una página web. */
session_start();
if(!isset($_SESSION['contar'])) {
  $_SESSION['contar'] = 0;
} else {
  $_SESSION['contar']++;
}
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda _ </title>
  <!-- Completar el nombre de la tienda con la temática elegida. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div>
      <?php 
        if(!is_null(@$_SESSION['usuario'])) {
          echo "Bienvenido/a ".$_SESSION['usuario'];
        }
      ?>
    </div>
    <br>
      <!-- Completar el nombre de la tienda con la temática elegida. -->
    <h1>Tienda Generica </h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <br>

    <a class="btn btn-primary" href="alta_usuarios.php" role="button"> Alta usuarios</a>
    <a class="btn btn-primary" href="listar_usuarios.php" role="button"> Listar usuarios</a>
    <a class="btn btn-primary" href="alta_producto.php" role="button"> Alta producto</a>
    <a class="btn btn-primary" href="login.php" role="button"> Login</a>

    <br>
  </body>
</html>

