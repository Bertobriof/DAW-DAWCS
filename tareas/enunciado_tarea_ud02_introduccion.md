### Boletín UD02. Introducción

##### Tarea 2.1. Localizar errores. 

Localiza y corrige los errores de este programa PHP:
```php
<? php
echo '¿Cómo estás';
echo 'Estoy bien, gracias.';
??>
```

##### Tarea 2.2. Variable, declaración. 

Indica cuál de los siguientes son nombres de variables válidas e inválidos, indica por qué (en comentarios) y corrige los fallos:
```php
- valor 
- $_N
- $valor_actual 
- $n
- $#datos 
- $valorInicial0
- $proba,valor 
- $2saldo
- $n
- $meuProblema
- $meu Problema
- $echo
- $m&m
- $registro
- $ABC
- $85 Nome
- $AAAAAAAAA
- $nome_apelidos
- $saldoActual
- $92
- $*143idade
```

##### Tarea 2.3. Funciones para trabajar con tipos de datos. 

Busca en la documentación de PHP las funciones de [manejo de variables](http://www.php.net/manual/es/funcref.php)

Comprueba el resultado devuelto por los siguientes fragmentos de código y analiza el resultado:
```php
- $a = “true”; // imprime el valor devuelto por is_bool($a)...
- $c = “false”; // imprime el valor devuelto por gettype($c);
- $d = “”; // el valor devuelto por empty($d);
- $e = 0.0; // el valor devuelto por empty($e);
- $f = 0; // el valor devuelto por empty($f);
- $g = false; // el valor devuelto por empty($g);
- $h; // el valor devuelto por empty($h);
- $i = “0”; // el valor devuelto por empty($i);
- $j = “0.0”; // el valor devuelto por empty($j);
- $k = true; // el valor devuelto por isset($k);
- $l = false; // el valor devuelto por isset($l);
- $m = true; // el valor devuelto por is_numeric($m);
- $n = “”; // el valor devuelto por is_numeric($n);
```

##### Tarea 2.4. Variables globales.

Haz una página que ejecute la función phpinfo() y que muestre las principales variables de servidor mencionadas en teoría.

##### Tarea 2.5. Operadores.

1. Escribe un programa que pase de grados Fahrenheit a Celsius. Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, se multiplica por 5 y se divide entre 9.
2. Crea un programa en PHP que declare e inicialice dos variables x e y con los valores 20 y 10 respectivamente y muestre la suma, la resta, la multiplicación, la división y el módulo de ambas variables. 
(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias.
3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 30 primeros números naturales.
4. Hacer un programa php que calcule el área y el perímetro de un rectángulo (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar las variables base=20 y altura=10. 

##### Tarea 2.6. Cadenas.

- Usando la instrucción ```echo``` crea un programa en PHP que muestre el mensaje: ```Hola, Mundo!```  Optativo. Muéstralo en cursiva.
- Crea un programa en PHP que guarde en una variable tu nombre y lo muestre en negrita formando el siguiente mensaje: Bienvenido tunombre
