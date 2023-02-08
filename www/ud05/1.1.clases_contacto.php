
<?php 
/*1. Cree una clase ```Contacto```, con las siguientes propiedades privadas: nombre, apellido y número de teléfono. Definir un constructor con 3
argumentos, que asigne los valores a las propiedades. */
class Contacto {
    private $nombre;
    private $apellido;
    private $numero;

    function __construct($nombre,$apellido,$numero) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numero = $numero;
    }
/* 2. Genera los getters y los setters para todas las propiedades y 
el método ```muestraInformacion()``` que imprima los valores de las propiedades. */
    function getNombre() {
        return $this->nombre;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function getApellido() {
        return $this->apellido;
    }
    function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    function getNumero() {
        return $this->numero;
    }
    function setNumero($numero) {
        $this->numero = $numero;
    }
    function muestraInformacion() {
        return "Información: {$this->nombre}, {$this->apellido} y {$this->numero}";
    }

    function __destruct()
    {
        echo "Se ha destruido el objeto Contacto: {$this->nombre}, {$this->apellido} y {$this->numero}";
    }
/* 3.3. Crea 3 objetos de la clase ```Contacto```, asigne valores a todas sus 
propiedades y muestre a continuación sus valores, primero con los métodos get() 
y luego con el método ```muestraInformacion()```. */ 
}

$contacto1 = new Contacto("Alvaro","Pérez",1);
echo $contacto1->getNombre();
echo $contacto1->getApellido();
echo $contacto1->getNumero();
$contacto2 = new Contacto("Elena","Rodriguez",2);
echo $contacto2->muestraInformacion();
$contacto3 = new Contacto("Gus","Sano",3);
echo $contacto3 ->muestraInformacion();


/* 4. Agregue un método ```__destruct()```, que muestra en pantalla el objeto que se está destruyendo. */ 

?>