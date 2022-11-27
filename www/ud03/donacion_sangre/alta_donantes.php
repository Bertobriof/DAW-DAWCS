<?php
include("funciones.php");
//1. Conectar a la base de datos & //2. Comprobar la conexión
  $servername = 'db';
  $username = 'root';
  $password = 'test';
  $nombre=$apellidos=$grupoSanguineo=$codPostal=$tMovil=$edad = "";
  $nombreErr=$apellidosErr=$grupoSanguineoErr=$codPostalErr=$tMovilErr=$edadErr = "";
 // $fechaDonacion =  strtotime(date("d-m-Y")); //fecha que se da de alta
 
  try {
      $connPDO = new PDO("mysql:host=$servername;dbname=donacion",$username,$password);
      $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

        
      //3. Recoger los datos del formulario  
      //4. Validar los datos del formulario evitando posibles ataques y comprobando que estén los datos obligatorios. 

      if(isset($_POST['submit'])) {
        if(!empty($_POST['name'])) {
          $nombre=validarFormulario($_POST['name']);
        } else {
          $nombreErr = "Introduce un nombre";
        }
        if(!empty($_POST['apellido'])) {
          $apellidos=validarFormulario($_POST['apellido']);
        } else {
          $apellidosErr = "Introduce un apellido";
        }
        if(!empty($_POST['grupos'] && $_POST['grupos'] != 'Elegir:')) {
          $grupoSanguineo = validarFormulario($_POST['grupos']);
        } else {
          $grupoSanguineoErr = "Introduce un grupo sanguíneo";
        }
        if(!empty($_POST['edad']) && is_numeric($_POST['edad']) && $_POST['edad']>=18) {
          $edad = validarFormulario($_POST['edad']);
        } elseif(!empty($_POST['edad']) && is_numeric($_POST['edad']) && $_POST['edad']<18) {
          $edadErr ="Solo pueden donar mayores de 18";
          $edad = null;
        }
         else {
          $edadErr = "Introduce un valor numérico para la edad";
        }
        if(!empty($_POST['codpostal']) && is_numeric($_POST['codpostal']) && strlen($_POST['codpostal']) == 5) {
          $codPostal= validarFormulario($_POST['codpostal']);
        } else {
          $codPostalErr = "Introduce un código postal de 5 dígitos";
        }
        if(!empty($_POST['movil']) && is_numeric($_POST['movil']) && strlen($_POST['movil']) == 9) {
          $tMovil = validarFormulario($_POST['movil']);
        } else {
          $tMovilErr = "Introduce un teléfono móvil de 9 dígitos";
        }
      }

//5. Insertar el registro en la base de datos
      if(isset($_POST['submit']) && !empty($nombre) && !empty($apellidos) && !empty($edad) && !empty($grupoSanguineo) && !empty($codPostal) && !empty($tMovil)) {
        $stmt = $connPDO -> prepare("INSERT INTO donantes (nombre,apellidos,edad,grupoSanguineo,codPostal,telefonoMovil) VALUES (:nombre,:apellidos,:edad,:grupo,:codigoP,:movil)");
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":apellidos",$apellidos);
        $stmt->bindParam(":edad",$edad);
        $stmt->bindParam(":grupo",$grupoSanguineo);
        $stmt->bindParam(":codigoP",$codPostal);
        $stmt->bindParam(":movil",$tMovil);
        $stmt->execute();  
//6. Comprobar la insercción
        echo "Alta realizada";
      } else {
        echo "Faltan datos, no se pudo completar el alta en la base de datos";
      }


    } catch(PDOException $e) {
      echo "Fallo de conexión: " .$e->getMessage();
    }
        //7. Cerrar la conexión 
        $connPDO = null;
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
    <h1>Alta Donantes</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Nombre: <input type="text" name="name"><?php echo $nombreErr; ?>
      <br><br>
      Apellidos: <input type="text" name="apellido"><?php echo $apellidosErr; ?>
      <br><br>
      Edad:  <input type="text" name="edad"><?php echo $edadErr; ?>
      <br><br>
     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Grupo sanguíneo:</label>
      <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="grupos">
        <option selected>Elegir: </option>
        <option value="1">O-</option>
        <option value="2">O+</option>
        <option value="3">A-</option>
        <option value="4">A+</option>
        <option value="5">B-</option>
        <option value="6">B+</option>
        <option value="7">AB-</option>
        <option value="8">AB+</option>
      </select><?php echo $grupoSanguineoErr; ?>
      <br><br>
      Código Postal:  <input type="text" name="codpostal"><?php echo $codPostalErr; ?>
      <br><br>
      Teléfono móvil:  <input type="text" name="movil"><?php echo $tMovilErr; ?>
      <br><br>

      <input type="submit" name="submit" value="Submit"> 
        <!-- 6. Completar el formulario -->
    </form>
  </body>
</html>