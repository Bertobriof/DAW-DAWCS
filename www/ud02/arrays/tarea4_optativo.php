<table>
    <tr><th>Ciudad</th><th>País</th><th>Continente</th></tr>
<?php 
/*
En un *string*, tenemos almacenados varios datos agrupados en ciudad, país y continente. El formato es `ciudad,pais,continente` y cada grupo *ciudad-pais-continente* se separa co un `;`.$informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";Crea una aplicación PHP que imprima toda la información almacenada en el *string* en una tabla con 3 columnas. Con la información anterior, realiza las seguintes tareas:
1. Crea la estrutura de datos y almacena toda la información anterior.
1. Utilizando a instrución `foreach` e listas HTML,
 imprime toda a información almacenada para que apareza de xeito similar ao exemplo mostrado.
*/ 
$informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";
$infoarray = explode(';',$informacion); //convierto el string a un array usando el separador
foreach($infoarray as $a) {
    $trio = explode(",",$a); //creo un nuevo array con la información de cada pais y lo voy listando
    echo '<tr>';
    foreach($trio as $b) {
        echo '<td>',$b,'</td>';
    }
    echo '</tr>';
}
?>
</table>