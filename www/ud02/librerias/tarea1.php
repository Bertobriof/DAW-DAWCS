<?php 
/**Realiza los seguintes pasos:

1. Crea un fichero PHP a modo de librería con todas las funciones creadas.
2. Escribe la diferencia entre `include`, `include_once`, `require` y `require_once` dentro del código de la librería de funciobes como un comentario del código fuente.
3. Descarga [**esta plantilla**](/03/template-307.zip) y divide el `index.php` de tal forma que tengas distintos recursos repartidos en ficheros:

Fichero         | Contiene el `div` con `id`
:-              |:-
`logo.php`      |`id="logo"`
`menu.php`      |`id="menu"`
`pictures.php`  |`id="pictures"`
`content.php`   |`id="content"`
`sidebar.php`   |`id="sidebar"`
`footer.php`    |`id="footer"`

Modifica el `index.php` para que cargue los recursos indicados en el paso anterior
*/
include("logo.php");
include("footer.php");
include("content.php");
include("pictures.php");
include("sidebar.php");
include("menu.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Web Portal - Includes and requires</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id="header" class="container">

	<?php logo(); ?>
	
    <?php menu();?>
	
</div>

<?php pictures()?>

<div id="page">
	<div id="bg1">
		<div id="bg2">
			<div id="bg3">
			
				<?php content() ?>
				
			    <?php sidebar() ?>
				
			</div>
		</div>
	</div>
</div>

 <?php footer() ?>

</body>
</html>