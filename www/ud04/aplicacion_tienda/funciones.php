<?php
function compruebaExtension($a) {
    if($a != "jpg" && $a != "png" && $a != "jpeg" && $a != "gif") {
        echo "Introduce un archivo en formato JPG/PNG/GIF";
        return false;
    } else {
        return true;
        }
    }

//*.png, *.jpg, *.jpeg o *.gif.

//a imagen no debe superar 50MB de tamaño, 
//por lo que se debe comprobar por medio de una nueva función, comprobaTamanho.
// Ambas funciones deben ponerse en un fichero anexo requirido llamado “funciones.php”.

function comprobaTamanho($a) {
    if($a <500000) {
        return true;
    } else {
        echo "El archivo pesa demasiado";
        return false;
    }
}
?>