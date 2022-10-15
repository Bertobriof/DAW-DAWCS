<?php 

/*
Necesitamos almacenar la siguiente información en un array multidimensional:

- **John**
    - email: `john@demo.com`
    - website: `www.john.com`
    - age: `22`
    - password: `pass`
- **Anna**
    - email: `anna@demo.com`
    - website: `www.anna.com`
    - age: `24`
    - password: `pass`
- **Peter**
    - email: `peter@mail.com`
    - website: `www.peter.com`
    - age: `42`
    - password: `pass`
- **Max**
    - email: `max@mail.com`
    - website: `www.max.com`
    - age: `33`
    - password: `pass`

Almacena e imprime la información. 
*/ 
$datos = [
    'John' => [
        'email' => 'john@demo.com',
        'website' => 'www.john.com',
        'edad' => 22,
        'password' => 'pass'
    ],
    'Anna' => [
        'email' => 'anna@demo.com',
        'website' => 'www.peter.com',
        'edad' => 24,
        'password' => 'pass'
    ],
    'Peter' => [
        'email' => 'peter@mail.com',
        'website' => 'www.anna.com',
        'edad' => 42,
        'password' => 'pass'
    ],
    'Max' => [
        'email' => 'max@mail.com',
        'website' => 'www.max.com',
        'edad' => 33,
        'password' => 'pass'
        ]
    ];

    //lo imprimo con un foreach por optimizar código
    foreach($datos as $nombre => $valor) {
        echo $nombre, ':<br>';
        echo $valor['email'],'<br>';
        echo $valor['website'],'<br>';
        echo $valor['edad'],'<br>';
        echo $valor['password'],'<br>';
        echo '<br>';
    }


?>