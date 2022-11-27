<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <form action="tarea1.php" method="get">
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" placeholder="Nombre"><br>
                <label for="apellidos">Apellidos</label><br>
                <input type="text" name="apellidos" placeholder="Apellidos"><br>
                <input type="submit" name="Enviar" value="Enviar">
            </form>
        </div>

            <div>
                <?php 
                    /**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
                     * Nombre: `xxxxxxxxx`
                     *  Apellidos: `xxxxxxxxx`
                     * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
                     * Su nombre tiene caracteres `X`.
                     * Los 3 primeros caracteres de tu nombre son: `xxx`
                     * La letra A fue encontrada en sus apellidos en la posición: `X`
                     * Tu nombre en mayúsculas es: `XXXXXXXXX`
                     * Sus apellidos en minúsculas son: `xxxxxx`
                     * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
                     * Tu nombre escrito al revés es: `xxxxxx`
                    */
                    if(isset($_GET['Enviar'])) {
                        $nombre = $_GET['nombre'];
                        $apellidos = $_GET['apellidos'];
                        echo 'Nombre: ',$nombre,'<br>';
                        echo 'Apellidos: ',$apellidos,'<br>';
                        $nombrecompleto = $nombre.' '.$apellidos;
                        echo 'Nombre y apellidos: ',$nombrecompleto,'<br>';
                        echo 'Tu nommbre tiene '. strlen($nombre).' caracteres <br>';
                        echo 'Los 3 primeros caracteres de tu nombre son '. substr($nombre,0,3).'. <br>';
                        $buscar = 'a';
                        echo 'La letra A fue encontrada en tus apellidos en la posición '. strpos($apellidos, $buscar).' caracteres <br>';
                        echo 'Nombre en mayúsculas: '.strtoupper($nombre).'<br>';
                        echo 'Apellido en mayúsculas: '.strtoupper($apellidos).'<br>';
                        echo 'Nombre y apellido en mayúsculas: '.strtoupper($nombrecompleto).'<br>';
                        echo 'Tu nombre al revés: '.strrev($nombre).'<br>';

                    }
                ?>
        </div>
    </body>
</html>
