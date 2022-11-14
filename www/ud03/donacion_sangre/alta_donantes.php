<?php

//1. Conectar a la base de datos

//2. Comprobar la conexión

//3. Recoger los datos del formulario 

//4. Validar los datos del formulario evitando posibles ataques y comprobando que estén los datos obligatorios. 

//5. Insertar el registro en la base de datos

//6. Comprobar la insercción 

//7. Cerrar la conexión 

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
      Nombre: <input type="text" name="name">
      <br><br>
      Apellidos: <input type="text" name="email">
      <br><br>
      Edad:  <input type="text" name="edad">
      <br><br>
     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Grupo sanguíneo:</label>
      <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
        <option selected>Elegir: </option>
        <option value="1">O-</option>
        <option value="2">O+</option>
        <option value="3">A-</option>
        <option value="4">A+</option>
        <option value="5">B-</option>
        <option value="6">B+</option>
        <option value="7">AB-</option>
        <option value="8">AB+</option>
      </select>
      <br><br>
      Código Postal:  <input type="text" name="edad">
      <br><br>
      Teléfono móvil:  <input type="text" name="edad">
      <br><br>
      <input type="submit" name="submit" value="Submit"> 
        <!-- 6. Completar el formulario -->
    </form>
  </body>
</html>