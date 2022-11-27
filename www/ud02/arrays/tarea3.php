<?php 

/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/ 

$matriz = [rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20),rand(0,20)];

foreach($matriz as $a) {
    echo $a, '<br>';
}

echo '<h1>Ejercicio 2 (optativo)</h1><br>';
/* 
2. (Optativo) Cree una matriz con los siguientes datos: 
`Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.
    - Elimine la última posición de la matriz. 
    - Imprima la posición donde se encuentra la cadena 'Superman'. 
    - Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    - Ordene los elementos de la matriz e imprima la matriz ordenada. 
    - Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
*/

$matriz2 = [
    'Batman','Superman', 'Krusty', 'Bob', 'Mel', 'Barney'
];
foreach($matriz2 as $m) {
    echo $m, " ";
}
echo '<br>';
echo "Se ha eliminado ", array_pop($matriz2), " del array"; //eliminamos lo que hay en última posición, también permite nombrarlo con el echo
echo '<br>';
foreach($matriz2 as $m) {
    echo $m, " ";
}
echo '<br>';
echo $matriz2[1], '<br>';

array_push($matriz2,'Carl', 'Lenny', 'Burns', 'Lisa' ); //añadir al final del array
foreach($matriz2 as $m) {
    echo $m, " ";
}
echo '<br>';
sort($matriz2);
foreach($matriz2 as $m) {
    echo $m, " ";
}
echo '<br>';
array_unshift($matriz2,'Apple', 'Melon', 'Watermelon' ); //añadir al inicio del array
foreach($matriz2 as $m) {
    echo $m, " ";
}
echo '<br>';

/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */ 
$copia = array_slice($matriz2,2,3); //cortamos y copiamos para incluir los elementos situados en 3 a 5 posición.
foreach($copia as $m) {
    echo $m, ' ';
}
?>