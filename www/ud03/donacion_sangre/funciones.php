
<?php
//validación de formularios
$datosValidados;
function validarFormulario($a) {
    $datosValidados=stripcslashes($a);
    $datosValidados=htmlspecialchars($datosValidados);
    $datosValidados=trim($datosValidados);
    return $datosValidados;
}


?>