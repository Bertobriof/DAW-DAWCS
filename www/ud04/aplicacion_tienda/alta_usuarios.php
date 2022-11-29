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

<?php
//1. Conectar a la base de datos
@$conexion = new mysqli('db','root','test'); //el @ para omitir el warning
//2. Comprobar la conexión
$error = $conexion->connect_error;
if($error != null) {
  die("Fallo de conexión: ".$conexion->connect_error." Con número: ".$error);
}
echo "Conexión correcta. ";

$sql = "CREATE DATABASE IF NOT EXISTS tienda";
if($conexion->query($sql)) {
  echo "Base de datos creada correctamente. ";
  $conexion->select_db("tienda");
} else {
  echo "Error creando base de datos.".$conexion->error;
}


//3. Recoger los datos del formulario 
 /* if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = test_input($_POST['name']);
    $apelidos = test_input($_POST['apelidos']);
    $idade = test_input($_POST['edad']);
    $provincia = test_input(($_POST['provincia']));
  }*/

//4. Validar los datos del formulario evitando posibles ataques y comprobando que estén los datos obligatorios. 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$nombre=$apelidos=$idade=$provincia="";
$nombreErr=$apelidosErr=$idadeErr=$provinciaErr="";
if($_SERVER['REQUEST_METHOD'] == "POST") {
  if(!empty($_POST['name']) && is_string($_POST['name'])) {
    $nombre = test_input($_POST['name']);
  } else {
    $nombre = null;
    $nombreErr = "Se requiere un nombre.";
  }

  if(!empty($_POST['apelidos']) && is_string($_POST['apelidos'])) {
    $apelidos = test_input($_POST['apelidos']);
  } else {
    $apelidos=null;
    $apelidosErr = "Se requiere un apelido.";
  }

  if(!empty($_POST['edad']) && is_numeric($_POST['edad'])) {
    $idade = test_input($_POST['edad']);
  } else {
    $idade=null;
    $idadeErr = "Se requiere un valor numérico para el campo Edad.";
  }
  if(!empty($_POST['provincia']) && is_string($_POST['provincia'])) {
    $provincia = test_input($_POST['provincia']);
  } else {
    $provincia=null;
    $provinciaErr = "Se requiere seleccionar una provincia.";
  }
}
//5. Insertar el registro en la base de datos
//5.1 CREAR TABLA 
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  edad int(3) NOT NULL,
  provincia VARCHAR(50) NOT NULL
  )";
  if($conexion->query($sql)) {
    echo "Tabla creada correctamente";
  } else {
    echo "Error creando table. ".$conexion->error;
  }
//5.2 INSERCCIÓN DE REGISTROS
$editarID;

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']== 'POST' && !is_null($nombre) && !is_null($apelidos) && !is_null($idade) && !is_null($provincia) && is_null($editarID)) {
  $stmt = $conexion->prepare("INSERT INTO usuarios (nombre,apellidos,edad,provincia) VALUES (?,?,?,?)");
  $stmt->bind_param("ssis",$nombre,$apelidos,$idade,$provincia);
  $stmt->execute();
  $ultimoID = $conexion->insert_id;
  $stmt->close();
  echo "Datos insertados con ID: ".$ultimoID;
  //editar_usuario
} elseif($_SERVER['REQUEST_METHOD'=='GET'] && !is_null($nombre) && !is_null($apelidos) && !is_null($idade) && !is_null($provincia) && @$editarID=$_GET['id']) {
  $sql = "UPDATE tienda SET nombre = ".$nombre.",apellidos=".$apellidos.",edad=".$idade.",provincia=".$provincia." WHERE id=".$editarID;
}
//6. Comprobar la insercción 

//7. Cerrar la conexión f
$conexion->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1>Alta usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="form-group">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="name">Nombre:  </label>
    <input type="text" name="name"><?php echo $nombreErr;?>
      <br><br>
      <label for="apelidos">Apellidos: </label>
      <input type="text" name="apelidos"><?php echo $apelidosErr;?>
      <br><br>
      <label for="edad">Edad: </label>
      <input type="text" name="edad"><?php echo $idadeErr;?>
      <br><br>
     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Provincia:</label>
      <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="provincia">
        <option selected>Elegir: </option>
        <option value="A CORUÑA">A Coruña</option>
        <option value="LUGO">Lugo</option>
        <option value="OURENSE">Ourense</option>
        <option value="PONTEVEDRA">Pontevedra</option>
      </select><?php echo $provinciaErr;?>
      <br><br>
      <input type="submit" name="submit" value="Submit"> 
        <!-- 6. Completar el formulario -->
    </form>
</div>
<footer>
<a class="btn btn-primary" href="index.php" role="button"> Volver a inicio</a>
</footer>
  </body>
</html>