<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1>Lista de usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <?php
    //1. Crear la conexión 
    @$conexion = new mysqli('db','root','test','tienda');
    $error = $conexion->connect_error;

    //2. Comprobar la conexión
    if($error != null) {
      die("Fallo de conexión: ".$conexion->connect_error." Con número: ".$error);
    }
    echo "Conexión exitosa";

    //3. Configurar una consulta SQL que selecciona las columnas id, nombre, apellido, edad y provincia de la tabla Cliente. 
    $sql = "SELECT * FROM usuarios";
    $resultados = $conexion->query($sql);
    //4. Comporbar si se devuelve alguna fila 
    if($resultados->num_rows>0) {
      ?>

    
  <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="co2">Nombre</th>
      <th scope="co3">Apellidos</th>
      <th scope="co4">Edad</th>
      <th scope="co5">Provincia</th>
      <th scope="co6">Editar</th>
      <th scope="co6">Eliminar</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      while($fila = $resultados->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$fila['id']."</td>";
        echo "<td>".$fila['nombre']."</td>";
        echo "<td>".$fila['apellidos']."</td>";
        echo "<td>".$fila['edad']."</td>";
        echo "<td>".$fila['provincia']."</td>";
        echo "<td><a  class='btn btn-primary' href=listar_usuarios.php?editar=".$fila['id'].">Editar</a> </td>";
        echo "<td><a  class='btn btn-primary' href=listar_usuarios.php?eliminar=".$fila['id'].">Borrar</a> </td>";
        echo "</tr>";
      }
    }
   //5. Si se devuelven más de cero filas, recorrer los resultados e imprimir en una tabla los resultados 

      //Ejemplo: echo "<td>". $row['id']. "</td> "; 

   //6. Eliminar la fila correspondiente. 
  
  $borrarID = null;
  $editarID = null;
  if($_SERVER['REQUEST_METHOD'] == 'GET' && @$editarID=$_GET['editar']) {
    echo "<br>";
    echo '<form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
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
      <input type="submit" name="edit" value="Actualizar datos"> 
    </form>';
  }
$nombre=$apelidos=$idade=$provincia="";
$nombreErr=$apelidosErr=$idadeErr=$provinciaErr="";
  if(isset($_POST['edit'])) {
    echo $provincia;
  }
  if($_SERVER['REQUEST_METHOD'] == 'GET' && @$borrarID=$_GET['eliminar']) {
    @$borrarID = $_GET['eliminar'];
    $sql = "DELETE FROM usuarios WHERE id=".$borrarID;
    $conexion->query($sql);
    echo "El regitro con ID: ".$borrarID." se ha eliminado.";
  }
//fff
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
  if(!empty($_POST['name']) && is_string($_POST['name'])) {
    $nombre = test_input($_POST['name']);
  } else {
    $nombre = null;
    $nombreErr = "Se requiere un nombre.";
  }

  if(!empty($_POST['apelidos']) && is_string($_POST['apelidos'])) {
    $apelidos = test_input($_GET['apelidos']);
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

   //7. Cerrar conexión 
   $conexion->close();
  ?>
    </tbody>
  </table>
  <footer>
<a class="btn btn-primary" href="index.php" role="button"> Volver a inicio</a>
</footer>
  </body>
</html>