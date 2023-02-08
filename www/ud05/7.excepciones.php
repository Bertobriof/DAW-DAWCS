
<?php 

/*
1. Defina una nueva clase de excepción llamada ```ExPropia```que extienda de ```Excepcion```. 
No debe hacer nada más. */

class ExPropia extends Exception {
}



/*2. Crea una clase llamada ```ExPropiaClass```, con un método estático ```testNumber``` 
que recibe un número. 
Si el número es cero lanza una excepción del tipo ```ExPropia```. 
La excepción no está atrapada dentro de esta clase. */

class ExPropiaClass {
    static function testNumber($numero) {
        if($numero == 0) {
            throw new ExPropia("El número es 0");
        } else {
            return "No es cero";
        }
    }
}

/*
3. Lance el método ```testNumber``` con diferentes valores, capturando las posibles excepciones.
*/
$testNumero = new ExPropiaClass();

try {
    echo $testNumero->testNumber(0);
} catch(Exception $e) {
    echo "Exception capturada: ", $e->getMessage(), "\n";
}
echo "<br>";
try {
    echo $testNumero->testNumber(5);
} catch(Exception $e) {
    echo "Exception capturada: ", $e->getMessage(), "\n";
}

?>