<?php 

//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea.
$pares = [2,4,6,8,10];
for($i=0; $i<5;$i++) {
    echo $pares[$i];
    echo "<br>";
}

echo "<h1>Parte2</h1><br>";
/* 2. Imprime los valores del array asociativo siguiente usando un foreach:*/
$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';

foreach($v as $key) {
    echo $key, "<br>";
}
?>