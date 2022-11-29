<?php 
session_start();

/*## Ejercicio 2
Crea una página en la que el usuario pueda seleccionar su idioma a través de un combo 
(introducir al menos los idiomas; gallego, castellano e inglés) y muestre la siguiente
frase en el idioma correspondiente: Bienvenido a mi página!. */
if(isset($_POST['Seleccionar'])) {
    $idioma = $_POST['idioma'];
    setcookie("idioma",$idioma, time()+86400);
    header("Refresh:0"); //PARA QUE SE RECARGE LA PÁGINA CUANDO GENERA LA COOKIE
}


?>
<html>
    <head>
        <title>DWCS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST">
                <select name="idioma" id="idioma">
                    <option value="0">ES</option>
                    <option value="1">GAL</option>
                    <option value="2">EN</option>
                </select>
                <input type="submit" value="Seleccionar" name="Seleccionar">
            </form>
        </div>
        <div>
            <?php
            if(!isset($_COOKIE['idioma'])) {
                echo "Selecciona un idioma";
            } else {
                switch($_COOKIE['idioma']) {
                    case 0:
                        echo "<p>Bienvenido/a. Has seleccionado visualizar la página en Español.</p>";
                        break;
                    case 1: 
                        echo "<p>Benvido/a. A páxina seleccionada está en Galego.</p>";
                        break;
                    case 2:
                        echo "<p>Wellcome. This website is displayed in English</p>";
                        break;
                }
            }
            ?>
        </div>
    </body>
</html>