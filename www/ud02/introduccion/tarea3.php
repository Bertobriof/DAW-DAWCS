<?php
 //Por ejemplo
 echo "<h3>Resultados:</h3>";
 $a = "true"; // imprime el valor devuelto por is_bool($a)...
 echo(is_bool($a));
 echo "echo(is_bool($a)); no imprime nada ya que $a = true es una cadena de texto<br>";
  $c = "false"; // imprime el valor devuelto por gettype($c);
  echo(gettype($c));
  echo " gettype muestra el tipo de variable, en este caso mueastra que es una cadena de texto<br>";
 $d = ""; // el valor devuelto por empty($d);
 echo(empty($d));
 echo " devuelve true, en este caso 1, porque la variable d está vacía<br>";
 
 $e = 0.0; // el valor devuelto por empty($e);
 echo(empty($e));
 echo " devuelve true, en este caso 1, porque la variable e está vacía<br>";
 $f = 0; // el valor devuelto por empty($f);
 echo(empty($f));
 echo " devuelve true, en este caso 1, porque la variable f está vacía<br>";
 $g = false; // el valor devuelto por empty($g);
 echo(empty($g));
 echo " devuelve true, en este caso 1, porque la variable g es false y según la documentación false también da vacío https://www.php.net/manual/es/function.empty.php<br>";
 $h; // el valor devuelto por empty($h);
 echo(empty($h));
 echo " devuelve true, en este caso 1, porque la variable h no tiene ningún valor asignado<br>";
 $i = "0"; // el valor devuelto por empty($i);
 echo(empty($i));
 echo " devuelve true, en este caso 1, porque la variable i está vacía al tener asignado 0 como string<br>";
 $j = "0.0"; // el valor devuelto por empty($j);
 echo(empty($j));
 echo " debería devolver true porque la variable j tiene asignado 0.0 como float<br>";
 $k = true; // el valor devuelto por isset($k);
 echo(isset($k));
 echo " devuelve true, define si una variable es definida y nos es null<br>";
 $l = false; // el valor devuelto por isset($l);
 echo(isset($l));
 echo " devuelve true, define si una variable es definida y nos es null<br>";
 $m = true; // el valor devuelto por is_numeric($m);
 echo(is_numeric($m));
 echo " devuelve false al no ser ningún número ni cadena numerica<br>";
 $n = ""; // el valor devuelto por is_numeric($n);
 echo(is_numeric($n));
 echo " devuelve false porque la variable está vacía y no contiene ningún número<br>";




?>