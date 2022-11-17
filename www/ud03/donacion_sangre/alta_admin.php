<?php
include("funciones.php");
include("conexiones.php");
//1. Conectar a la base de datos
//2. Comprobar la conexión


//crear 
$servername = 'db';
$username = 'root';
$password = 'test';

$password;
$userName;

try{
  $connPDO = new PDO("mysql:host=$servername;dbname=donacion",$username,$password);
  $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexión realizaa con exito";
  $sql = "CREATE DATABASE IF NOT EXISTS donacion";
  $connPDO->exec($sql);
  
  $sql = "CREATE TABLE IF NOT EXISTS administradores(
    nombreUsuario VARCHAR(50) PRIMARY KEY ,
    contrasinal varchar(200) NOT NULL
    )";
    $connPDO->exec($sql);
    echo "La tabla se ha creado correctamente";
    //3. Recoger los datos del formulario 
    //4. Validar los datos del formulario evitando posibles ataques y comprobando que estén los datos obligatorios. 
    if(isset($_POST['enviar']))  {
      $password = validarFormulario($_POST['password']);
      $userName = validarFormulario($_POST['name']);
      
      //5. Insertar el registro en la base de datos
      $stmt = $connPDO->prepare("INSERT INTO administradores (nombreUsuario, contrasinal) VALUES (:usuario,:contra)");
      $stmt->bindParam(':usuario',$userName);
      $stmt->bindParam('contra',$password);
      $stmt->execute();
      //6. Comprobar la insercción 
      echo "Registro añadido";
    }


} catch (PDOException $e) {
  echo $sql."<br>". $e->getMessage();
}


//7. Cerrar la conexión 
$connPDO=null;
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
    <h1>Alta Administradores</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="form-group">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Nombre: <input type="text" name="name">
      <br><br>
      Contraseña: <input type="password" name="password">
      <br><br>
      <input type="submit" name="enviar" value="Enviar"> 
    </form>
</div>
  </body>
</html>