
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1>Listar Donantes</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php
      //1. Conectar a la base de datos
      include("funciones.php");
      $servername = 'db';
      $username = 'root';
      $password = 'test';
      $idDonante = $fechaDonacion = $fechaProximaDonacion = "";

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

        //3. Recuperar de base de datos los donantes
        $stmt = $connPDO->prepare("SELECT * FROM donantes");
        $stmt->bindParam(':codigoP',$codPostal);
        $stmt->execute();
            //5. Mostrar los datos
        echo "<table><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Edad</th><th>Grupo Sanguíneo</th><th>Código Postal</th><th>Teléfono Móvil</th><th>Añadir donación</th><th>Eliminar registro</th></tr>";
        while ($fila = $stmt->fetch()) {
          echo "<tr>";
          echo "<td>".$fila['id'] . "</td>";
          echo "<td>".$fila['nombre'] . "</td>";
          echo "<td>".$fila['apellidos'] . "</td>";
          echo "<td>".$fila['edad'] . "</td>";
          echo "<td>".$fila['grupoSanguineo'] . "</td>";
          echo "<td>".$fila['codPostal'] . "</td>";
          echo "<td>".$fila['telefonoMovil'] . "</td>";
          echo "<td><input type ='submit' name='donar' value=".$fila['id'].">Registrar donación</input> </td>";
          echo "<td><input type ='submit' name='eliminar' value=".$fila['id'].">Eliminar registro</input> </td>";
          echo "</tr>";
      }
      echo "</table>";

      if(isset($_GET['donar'])) {
        $idDonante =validarFormulario($_GET['donar']);
        $fechaDonacion = date("Y-m-d");
        $fechaProximaDonacion = date("Y-m-d", strtotime($fechaDonacion."+4 month"));
        $stmt = $connPDO->prepare("INSERT INTO historico (idDonante,fechaDonacion,proximaDonacion) VALUES (:id,:fecha1,:fecha2)");
        $stmt->bindParam(":id", $idDonante);
        $stmt->bindParam(":fecha1",$fechaDonacion);
        $stmt->bindParam(":fecha2",$fechaProximaDonacion);
        $stmt->execute();
        echo "El donante con ID ".$idDonante." ha donado el ".$fechaDonacion." y no podrá donar hasta el ".$fechaProximaDonacion;
      }
      if(isset($_GET['eliminar'])) {
        $idDonante = validarFormulario($_GET['eliminar']);
        $stmt = $connPDO->prepare("DELETE d FROM donantes d LEFT JOIN historico h ON d.id = h.idDonante where d.id =$idDonante");
        $stmt->execute();
        echo "Se ha borrado el donante con id ".$idDonante;
      }
      } catch(PDOException $e) {
        echo "Fallo de conexión: " .$e->getMessage();
      }
    



      

      //4. Imprimir los donantes en forma de tabla e insertar los botones de registrar, eliminar y listar donaciones. 
      /*AYUDA: Usar un bucle e intercalar etiquetas de html en el php. 
      Para los botones pasar el id como argumento. 
      Cuando registremos las donaciones debemos insertar una entrada en el historico. 
      */ 

      //5. Cerrar la conexión 
      $connPDO = null;

    ?>
  </form>
 
  </body>
</html>