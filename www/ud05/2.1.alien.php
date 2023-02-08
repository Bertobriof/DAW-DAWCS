
<?php 

class Alien {
    private $nombre;
    private static $numberOfAliens = 0;

    function __construct($nombre) {
        $this->nombre = $nombre;
        self::$numberOfAliens++;
    }
    public function getNumberOfAliens() {
        return Alien::$numberOfAliens;
    }
}

$alien1 = new Alien("Asier");
$alien2 = new Alien("Carmen");
$alien3 = new Alien("Marina de Leche");

echo $alien1->getNumberOfAliens()."<br>";
echo $alien2->getNumberOfAliens()."<br>";
echo $alien3->getNumberOfAliens()."<br>";


//1. Crea una clase ```Alien``` con un atributo llamado nombre y un constructor.

//2. Agregue un atributo ```numberOfAliens``` para que podamos saber la cantidad de 
//objetos de esta clase que se han creado.

//3. Cree un método ```getNumberOfAliens``` que devuelva esa información.

//Escribe el código que crea varios objetos de Alien y muestra el valor
// devuelto por el método ```numberOfAliens```.

?>
