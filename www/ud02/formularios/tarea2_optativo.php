<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <form action="tarea2_optativo.php" method="POST">
                <label for="opcion" >Selecciona bebida</label><br>
                <select name="opcion" requiered>
                    <option value="cocacola">Coca Cola | 1€</option>
                    <option value="pepsi">Pepsi Cola | 0,80 €</option>
                    <option value="fanta">Fanta Naranja | 0,90 €</option>
                    <option value="trina">Trina Manzana | 1,10 €</option>
                </select><br>
                <label for="unidades">Unidades</label><br>
                <input type="number" name="unidades" required><br>
                <input type="submit" name="enviar" value="Enviar"><br>
            </form>
<?php 
/*
Crea un formulario para solicitar una de las siguientes bebidas:

    Bebida|PVP
    :-|:-:
    Coca Cola|1 €
    Pepsi Cola|0,80 €
    Fanta Naranja|0,90 €
    Trina Manzana|1,10 €
    
    A mayores, necesitamos un campo adicional con la cantidad de bebidas a comprar y un botón de <kbd>Solicitar</kbd>.
    
    La aplicación mostrará algo como:

    Pediste 3 botellas de Coca Cola. Precio total a pagar: 3 Euros.
    Puedes utilizar sentencias `switch` o `if`.
    */
    if(isset($_POST['enviar'])) {
        $bebida = $_POST['opcion'];
        $unidades = $_POST['unidades'];
        $bebidas_precio = [
            'cocacola' => 1,
            'pepsi' => 0.80,
            'fanta' => 0.90,
            'trina' => 1.10
        ];
        $precio = $unidades*$bebidas_precio[$bebida];
        echo 'Pediste '.$unidades.' botellas de '.$bebida.'. Precio total a pagar: '.$precio.' euros.';
    };

?>
</body>
</html>