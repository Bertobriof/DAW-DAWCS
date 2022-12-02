<?php 
/*## Ejercicio 1
Cuenta el número de visitas que realiza un usuario a una página web. */
session_start();
if(!isset($_SESSION['contar'])) {
  $_SESSION['contar'] = 0;
} else {
  $_SESSION['contar']++;
}?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1>Alta productos</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="form-group">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <label for="productName">Nombre del producto:  </label>
        <input type="text" name="productName"><?php echo @$nombreProductoErr;?>
        <br><br>
        <label for="descripcion">Descripción: </label>
        <input type="text" name="descripcion"><?php echo @$descripcionErr;?>
        <br><br>
        <label for="precio">Precio: </label>
        <input type="text" name="precio"><?php echo @$precioErr;?>
        <br><br>
        <label for="unidades">Unidades: </label>
        <input type="text" name="unidades"><?php echo @$unidadesErr;?>
        <br><br>
        <label for="archivo">Subir foto: </label>
        <input type="file" name="archivo" id="archivo"><?php echo @$nombreArchivoErr; ?>
        <br><br>
        <input type="submit" name="submit" value="Registrar producto"> 
      </form>


      <?php
include("funciones.php");
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
//toma de registros y validación
$nombreProducto=$descripcion=$precio=$unidades="";
$nombreProductoErr=$descripcionErr=$precioErr=$unidadesErr=$nombreArchivoErr="";
$archivo = false;
if($_SERVER['REQUEST_METHOD'] == "POST") {
  if(!empty($_POST['productName']) && is_string($_POST['productName']) && strlen($_POST['productName']) <= 50) {
    $nombreProducto = test_input($_POST['productName']);
  } else {
    $nombreProductoErr = "Introduce un nombre válido: texto y menos de 50 carácteres.";
  }
  if(!empty($_POST['descripcion']) && is_string($_POST['descripcion']) && strlen($_POST['descripcion']) <= 100) {
    $descripcion = test_input($_POST['descripcion']);
  } else {
    $descripcionErr = "Introduce una descripción válida: tezto y menos de 100 carácteres.";
  }
  if(!empty($_POST['precio'])&& is_numeric($_POST['precio'])) {
    $precio = test_input($_POST['precio']);
  } else {
    $precioErr = "Introduce un precio. Solo admite valores numéricos.";
  }
  if(!empty($_POST['unidades']) && is_numeric($_POST['unidades'])) {
    $unidades = test_input($_POST['unidades']);
  } else {
    $unidadesErr = "Introduce unidades. Solo admite valores numéricos.";
  }
  if(!empty($_FILES['archivo']['name'])) {
    $nombreArchivo = test_input($_FILES['archivo']['name']);
    $archivo = true;
  } else {
    $nombreArchivoErr = "Adjunta un archivo";
  }

}

//subida de archivos:
$targetDir = "archivos/";
$FotoBD = "";
$targetFile = $targetDir . basename(@$nombreArchivo);
$uploaded = false; //un booleano para controlar cuando se sube en archivo y asi controlar e la BD el registro.
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
if(!empty($_FILES['archivo']['name']) && !file_exists($targetFile) && $archivo == true) {
  if(comprobaTamanho($_FILES["archivo"]["size"])) {
    if(compruebaExtension($imageFileType)) {
      if(move_uploaded_file($_FILES['archivo']['tmp_name'],$targetFile)) {
        echo "El fichero ". htmlspecialchars(basename($_FILES['archivo']['name'])). "ha sido subido.";
        $FotoBD = $_FILES['archivo']['tmp_name'];
        $uploaded = true;
        
      } else {
        echo "No se ha podido subir el archivo";
        $uploaded = false;
      }
    }
  }
} else {
  echo "El fichero ya existe";
  $uploaded = false;
}


//5. Insertar el registro en la base de datos
//5.1 CREAR TABLA 
$sql = "CREATE TABLE IF NOT EXISTS productos (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descipcion VARCHAR(100) NOT NULL,
    precio FLOAT(8) NOT NULL,
    unidades FLOAT(8) NOT NULL,
    foto BLOB NOT NULL
  )";
  if($conexion->query($sql)) {
    echo "Tabla creada correctamente";
  } else {
    echo "Error creando table. ".$conexion->error;
  }
//5.2 INSERCCIÓN DE REGISTROS
if(isset($_POST['submit']) && $uploaded == true && !is_null($nombreProducto) && !is_null($descripcion) && !is_null($unidades) && !is_null($precio) && !is_null($nombreArchivo)) {
  $subirFotoBD = addslashes($_FILES['archivo']['tmp_name']);
  $stmt = $conexion->prepare("INSERT INTO productos (nombre,descipcion,precio,unidades, foto) VALUES (?,?,?,?,?)");
  $stmt->bind_param("ssiib",$nombreProducto,$descripcion,$precio,$unidades,$subirFotoBD);
  $stmt->execute();
  $ultimoID = $conexion->insert_id;
  $stmt->close();
  echo "Datos insertados con ID: ".$ultimoID;
}
//6. Comprobar la insercción 

//7. Cerrar la conexión
$conexion->close();
?>

    </div>
    <footer>
      <a class="btn btn-primary" href="index.php" role="button"> Volver a inicio</a>
    </footer>
</body>
</html>