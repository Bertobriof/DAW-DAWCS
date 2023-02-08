
<?php 

class Empleado {
    //PROPIEDADES
    public $nombre;
    public $salario;
    public static $numEmpleados=0;
    //MÉTODOS
    public function __construct($nombre,$salario) {
        $this->nombre = $nombre;
        if($salario<=2000 && $salario>0) { //2
            $this->salario = $salario;
        } else {
            $this->salario = 2000;
        }
        $this->numEmpleados++; //1
    }

    public function setNombre($nombre) {
        $this->nombre=$nombre;  
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getSalario() { //3
        return $this->salario;
    }
    public function getNumEpleados() {
        return $this->numEmpleados;
    }
}

//4
class Operario extends Empleado {
    private $turno;
    public function __construct($nombre,$salario,$turno) {
        $this->nombre = $nombre;
        if($salario<=2000 && $salario>0) { //2
            $this->salario = $salario;
        } else {
            $this->salario = 2000;
        }
        $this->numEmpleados++; //1
        switch($turno) {
            case "diurno":
                $this->turno = $turno;
                break;
            case "nocturno":
                $this->turno = $turno;
                break;
            default:
                echo "Solovale diurno o nocturno";
                break;
        }
        
    }
    public function setTurno($turno) {
        $this->turno = $turno;
    }
    public function getTurno() {
        return $this->turno;
    }
}

$operario = new Operario("Rubén",1500, "diurno");
echo $operario->getTurno();
echo "<br>";
echo $operario->getNombre();
echo "<br>";
echo $operario->getSalario();
echo "<br>";
echo $operario->getNumEpleados();


/* 
Completa los siguientes apartados: 
1. Cada vez que se cree un empleado se debe aumentar la variable ```$numEmpleados```. 
2. El construtor de la clase empleado asignará un salario de entrada y
un nombre, que se pasarán como argumentos. El salario de entrada no podrá superar los 2000 euros.
3. Crea un método getSalario() que devuelva el salario del objecto que lo llame.
4. Crea una clase ```Operario``` que sea clase hija de ```Empleado```. Con las siguientes características: 
    4.1. Tendrá una propiedad privada "turno".  
    4.2. Deberá ejecutar el constructor de la clase padre añadiendo la variable turno.  
    4.3. Crear el setter para turno.  Los valores para esta variable sólo pueden ser "diurno" o "nocturno".  
5. Crear objetos que permitan comprobar todos los apartados anteriores.
*/ 

?>