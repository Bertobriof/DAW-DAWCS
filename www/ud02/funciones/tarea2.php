<?php 
/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */

 function comprobar_nif($a) {
    $digitos_control = [ //array con los restos y digitos de control
        0 => 'T',
        1 => 'R',
        2 => 'W',
        3 => 'A',
        4 => 'G',
        5 => 'M',
        6 => 'Y',
        7 => 'F',
        8 => 'P',
        9 => 'D',
        10 => 'X',
        11 => 'B',
        12 =>'N',
        13 => 'J',
        14 => 'Z',
        15 => 'S',
        16 =>'Q',
        17=>'V',
        18 =>'H',
        19=>'L',
        20=>'C',
        21=>'K',
        22=>'E'
    ];
    //el DNI se compone por 8 digitos + el dígito de control
    $longitud = strlen($a);
    if($longitud==9) { //verificamos si se trata de un string con 9 caracteres
        $b = strtoupper($a); //transformo a mayúsculas la letra del string para que en caso de un programa mas complejo, no den problemas las minúsculas
        $DNI_num = substr($b,0, 8); //extraigo del DNI la parte numerica
        $DNI_letra = substr($b,8,9); //extraigo la letra
        $resto = $DNI_num%23;
        if($DNI_letra==$digitos_control[$resto]) { //Si coinciden las letras devuelve ok
            return 'DNI válido';
        }
        else { //si no inválido
            return 'DNI inválido';
        }
    }
    else {
        echo 'Introduce un DNI válido, incluye los 0 a la izquierda si los tuviese'; 
    }
 }
 echo comprobar_nif('45687648B');
?>