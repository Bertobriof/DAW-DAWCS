
<?php 

class Empleado {
    //PROPIEDADES
    public $nombre;
    public $salario;
    public static $numEmpleados=0;
    //MÉTODOS
    public function setNombre($nombre) {
        $this->nombre=$nombre;  
    }
    public function getNombre(){
        return $this->nombre;
    }
}

/* 
Completa los siguientes apartados: 
1. Cada vez que se cree un empleado se debe aumentar la variable ```$numEmpleados```. 
2. El construtor de la clase empleado asignará un salario de entrada y un nombre, que se pasarán como argumentos. El salario de entrada no podrá superar los 2000 euros.
3. Crea un método getSalario() que devuelva el salario del objecto que lo llame.
4. Crea una clase ```Operario``` que sea clase hija de ```Empleado```. Con las siguientes características: 
    4.1. Tendrá una propiedad privada "turno".  
    4.2. Deberá ejecutar el constructor de la clase padre añadiendo la variable turno.  
    4.3. Crear el setter para turno.  Los valores para esta variable sólo pueden ser "diurno" o "nocturno".  
5. Crear objetos que permitan comprobar todos los apartados anteriores.
*/ 

