<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
function rango09($a) {
    if($a>=0 && $a<=9) {
        echo $a;
        return ' es un número entre el 0 y 9<br>';
    }
    else {
        echo $a;
        return 'no es es un valor comprendido entre 0 y 9<br>';
    }
}
echo rango09(2);

// 2. Crea una función que reciba un string e devolva a súa lonxitude.
function longString($a) {
    if(is_string($a)) {
        $longitud = strlen($a);
        echo 'La cadena de texto <b>'.$a.'</b> tiene una longitud de <b>'.$longitud.'</b> carácteres<br>';
    }
    else {
        return 'Introduce una cadena de texto<br>';
    }
}
echo longString('Hola');

// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
function exponente($a,$b) {
    if(is_numeric($a) && is_numeric($b)) {
        $resultado = pow($a,$b);
        echo 'El valor de '.$a.' elevado a '.$b.' es '; 
        return $resultado;
    }
    else {
        return 'Introduce un número';
    }
}
echo exponente(2,3);
echo '<br>';

// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
function vogal($a) {
    if(is_string($a) && $a == 'a'||$a=='e'||$a=='i'||$a=='o'||$a=='u') {
        echo "Es vocal";
        return true;
    }
    elseif(is_numeric($a)) {
        return 'Introduce un caracter de texto';
    }
    elseif(is_string($a) && $a !== 'a'||$a!=='e'||$a!=='i'||$a!=='o'||$a!=='u') {
        echo "No es vocal ";
        return false;
    }

}
echo vogal('a');
echo '<br>';
// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
function parImpar($a) {
    if(is_numeric($a)) {
        $resultado = $a%2;
        if($resultado==0) {
            echo ''.$a.' es par<br>';
            return;
        }
        else {
            echo ''.$a.' es impar<br>';
            return;
        }
    }else {
        return 'Introduce un número';
    }
}
echo parImpar(4);

// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
function minToMayus($a) {
    if(is_string($a)) {
        $resultado = strtoupper($a);
        return $resultado;
    }
    else {
        return 'Introduce una cadena de texto<br>';
    }
}
echo minToMayus('Hola');
echo '<br>';

// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
function zonaHoraria() {
    return date_default_timezone_get();
}
echo zonaHoraria();

/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
function puestaSol() {
    $fecha = time(); //creo el timestamp, aunque creo que no me pilla la fecha actual
    $latitud = ini_get("date.default_latitude"); //extraigo latitud
    $longitud = ini_get("date.default_longitude");//longitud
    $zenit = ini_get("date.sunset_zenith");//el zenith que viene en php
    $gmt_offset = 1; //corrijo a GTM+1
    $resultado = date_sunset($fecha,SUNFUNCS_RET_STRING,$latitud,$longitud,$zenit,$gmt_offset);
    return $resultado;
}
echo '<br>';
echo puestaSol();
?>