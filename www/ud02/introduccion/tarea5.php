<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/
$temperatura = 80;
function convertirFarCel($temperatura) {
    $celsius = ($temperatura - 32)*(5/9);
    return $celsius;
}
echo "<h2>Ejercicio 1</h2><br>";
echo convertirFarCel($temperatura);
echo "<br>";
/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
/*(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias. */
$x = 20;
$y = 10;
//sin variable intermedia
function suma2($x,$y) {
    return $x+$y;
}
function resta2($x,$y) {
    return $x-$y;
}
function multiplicacion2($x,$y) {
    return $x*$y;;
}
function division2($x,$y) { 
    return $x/$y;
}
function modulo2($x,$y) {
    return $x%$y;;
}

//con variable intermedia
function suma($x,$y) {
    $resultado = $x+$y;
    return $resultado;
}
function resta($x,$y) {
    $resultado = $x-$y;
    return $resultado;
}
function multiplicacion($x,$y) {
    $resultado = $x*$y;
    return $resultado;
}
function division($x,$y) {
    $resultado = $x/$y;
    return $resultado;
}
function modulo($x,$y) {
    $resultado = $x%$y;
    return $resultado;
}
//Imprimimos resultados
echo "<h1>Ejercicio 2</h1><br>";
echo suma($x,$y);
echo "<br>";
echo suma2($x,$y) ;
echo "<br>";
echo resta($x,$y);
echo "<br>";
echo resta2($x,$y) ;
echo "<br>";
echo multiplicacion($x,$y);
echo "<br>";
echo multiplicacion2($x,$y) ;
echo "<br>";
echo division($x,$y);
echo "<br>";
echo division2($x,$y) ;
echo "<br>";
echo modulo($x,$y);
echo "<br>";
echo modulo2($x,$y) ;
echo "<br>";

/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/ 
function naturalescuadrado($i) {
    for($i=0; $i<31; $i++) {
        $resultado = pow($i,2);
        echo $resultado;
        echo "<br>";
    }
}
echo "<h2>Ejercicio 3</h2>";
echo naturalescuadrado(0);


/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
 (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
 las variables base=20 y altura=10. */
$base = 20;
$altura = 10;

function area($base,$altura) {
    $resultado = $base*$altura;
    return $resultado;
}

function perimetro($base,$altura) {
    $resultado = 2*$base+2*$altura;
    return $resultado;
}
echo "<h2>Ejercicio 4</h2><br>";
echo area($base,$altura);
echo "<br>";
echo perimetro($base,$altura) ;
echo "<br>";
?>