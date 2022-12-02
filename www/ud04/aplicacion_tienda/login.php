<?php 
/*## Ejercicio 1
Cuenta el número de visitas que realiza un usuario a una página web. */
session_start();
if(!isset($_SESSION['contar'])) {
  $_SESSION['contar'] = 0;
} else {
  $_SESSION['contar']++;
}
if(isset($_POST['registrar'])) {
  header("Location: alta_usuarios.php");
  }
  include("funciones.php");
  //toma de registros y validación
  $userName=$password="";
  $userNameErr=$passwordErr="";
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_POST['userName']) && is_string($_POST['userName']) && strlen($_POST['userName']) <= 50) {
      $userName = test_input($_POST['userName']);
    } else {
      $userNameErr = "Introduce un nombre válido: texto y menos de 50 carácteres.";
    }
    if(!empty($_POST['password']) && is_string($_POST['password']) && strlen($_POST['password']) <= 100) {
      $password = test_input($_POST['password']); //encriptamos la contraseña
    } else {
      $passwordErr = "Introduce una descripción válida: tezto y menos de 100 carácteres.";
    }
  }

//Conectar a la base de datos
$servername ="db";
$dbusername = "root";
$dbpassword = "test"; 
try {
  $connPDO = new PDO("mysql:host=$servername;dbname=tienda",$dbusername,$dbpassword);
  $connPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//crear tablas y DB
  $sql = "CREATE DATABASE IF NOT EXISTS tienda";
  $connPDO->exec($sql);
  $sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    edad int(3) NOT NULL,
    provincia VARCHAR(50) NOT NULL,
    nombreUsuario VARCHAR(50) NOT NULL UNIQUE,
    contrasena VARCHAR(100) NOT NULL
    )";
  $connPDO->exec($sql);
//consultas:
//login:
if(isset($_POST['login']) && !is_null($userName)||!is_null($password)) {
  $PDOstmt = $connPDO->prepare("SELECT nombreUsuario, contrasena FROM usuarios WHERE nombreUsuario= :usuario");
  $PDOstmt->bindParam(":usuario",$userName);
  $PDOstmt->setFetchMode(PDO::FETCH_ASSOC);
  $PDOstmt->execute();
  while($fila = $PDOstmt->fetch()) {
    $_SESSION['usuario']=$fila['nombreUsuario'];
    $_SESSION['pass']=$fila['contrasena'];
  }
}
$logingErr=false;
} catch(PDOException $e) {
  echo "Error: ". $e->getMessage();
}
if(@password_verify($password,$_SESSION['pass'])) {
    header('Location: index.php');
  } else {
    $logingErr=true;
  }
?>

<?php




//6. Comprobar la insercción 
$connPDO = null;
//7. Cerrar la conexión
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1>Alta & loging usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div class="form-group">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <label for="userName">Nombre del producto:  </label>
        <input type="text" name="userName" placeholder="Introduce un hombre de usuario"><?php echo @$userNameErr;?>
        <br><br>
        <label for="password">Contraseña: </label>
        <input type="password" name="password"><?php echo @$passwordErr;?>        <?php 
        if($logingErr) {
          echo "<strong>La contraseña es errónea</strong>";
        }
        ?>
        <br><br>
        <input type="submit" name="login" value="Conectarse">
        <input type="submit" name="registrar" value="Alta de usuario"> 
        <br>

         
      </form>
    </div>
    <footer>
      <a class="btn btn-primary" href="index.php" role="button"> Volver a inicio</a>
    </footer>
</body>
</html>