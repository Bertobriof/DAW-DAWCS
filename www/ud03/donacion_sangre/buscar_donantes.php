<?php
include("funciones.php");
  $servername = 'db';
  $username = 'root';
  $password = 'test';
  $codPostal ="";
  $codPostalErr="";
//1. Conectar a la base de datos
try {
  $connPDO = new PDO("mysql:host=$servername;dbname=donacion",$username,$password);
  $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //2. Comprobar la conexión
  echo "Conexión correcta";
  $sql = "CREATE DATABASE IF NOT EXISTS donacion";
  $connPDO->exec($sql);
  $sql = "CREATE TABLE if NOT EXISTS donantes(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellidos VARCHAR(30) NOT NULL,
    edad INT(3) NOT NULL,
    grupoSanguineo VARCHAR(3) NOT NULL,
    codPostal INT(5) NOT NULL,
    telefonoMovil INT(9) NOT NULL
    )";
    $connPDO->exec($sql);
  $sql = "CREATE TABLE IF NOT EXISTS historico(
    idDonante INT(6) NOT NULL,
    fechaDonacion DATE NOT NULL,
    proximaDonacion DATE NOT NULL,
    PRIMARY KEY (idDonante, fechaDonacion),
    FOREIGN KEY (idDonante) REFERENCES donantes(id) ON DELETE CASCADE
    )";
    $connPDO->exec($sql);
    //3. Recoger el código postal del formulario 
    if(isset($_POST['submit'])) {
      if(!empty($_POST['codigopostal']) && is_numeric($_POST['codigopostal']) && strlen($_POST['codigopostal']) == 5) {
        $codPostal= validarFormulario($_POST['codigopostal']);
      } else {
        $codPostalErr = "Introduce un código postal de 5 dígitos";
      }
    }
    ?>
 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1>Buscar donantes</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="form-group">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Código Postal: <input type="text" name="codigopostal"> <?php echo $codPostalErr; ?>
      <br><br>
      <input type="submit" name="submit" value="Submit"> 
        <!-- 6. Completar el formulario -->
    </form>
</div>
<div>
  <table>
    
  </table>
  <?php
     //4. Realizar la consulta a base de datos y recuperar los datos 
     if(isset($_POST['submit'])) {
      $stmt = $connPDO->prepare("SELECT * FROM donantes WHERE codPostal = :codigoP");
      $stmt->bindParam(':codigoP',$codPostal);
      $stmt->execute();
          //5. Mostrar los datos
      echo "<table><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Edad</th><th>Grupo Sanguíneo</th><th>Código Postal</th><th>Teléfono Móvil</th></tr>";
      while ($fila = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>".$fila['id'] . "</td>";
        echo "<td>".$fila['nombre'] . "</td>";
        echo "<td>".$fila['apellidos'] . "</td>";
        echo "<td>".$fila['edad'] . "</td>";
        echo "<td>".$fila['grupoSanguineo'] . "</td>";
        echo "<td>".$fila['codPostal'] . "</td>";
        echo "<td>".$fila['telefonoMovil'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    }




    } catch(PDOException $e) {
      echo "Fallo de conexión: " .$e->getMessage();
    }
  
    //6. Cerrar la conexión 
    $connPDO = null;
?>
</div>
  </body>
</html>