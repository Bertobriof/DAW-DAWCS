<?php
//conexión a bd donacion
function conexionCrearBD() {
    $servername = 'db';
    $username = 'root';
    $password = 'test';
    try {
        $conn = new PDO("mysql:host=$servername;",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión correcta";
        $sql = "CREATE DATABASE IF NOT EXISTS donacion";
        $conn->exec($sql);
      } catch(PDOException $e) {
        echo "Fallo de conexión: " .$e->getMessage();
      }
}

?> 
