
<?php 

/*
1. Cree una clase abstracta `Persona`:
    - Con las siguientes propiedades: 
        - `$id` private (`private`).
        - `$nombre` protegida (`protected`).
        - `$apellidos` protegida (`protected`).
    - Tiene como métodos abstractos los getters, los setters y el constructor. 
    - Tiene un método abstracto llamado `accion()`. */
abstract class Persona {
    private static $id = 0;
    protected $nombre;
    protected $apellidos;

    abstract public function getId();
    abstract public function setId();
    abstract public function getNombre();
    abstract public function setNombre($nombre);
    abstract public function getApellidos();
    abstract public function setApellidos($apellido);
    abstract public function accion();
}

/*
2. Crea dos subclases:
    - `Usuarios`
    - `Administradores`
    */ 
    class Usuarios extends Persona {
        public function getId() {
            return $this->id++;
        }
        public function setId() {
            $this->id++;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function setNombre($nombre) {
            $this->nombre=$nombre;
        }
        public function getApellidos() {
            return $this->apellidos;
        }
        public function setApellidos($apellido) {
            $this->apellidos = $apellido;
        }
        public function accion() {
            return "El usuario ".self::getNombre().' '.self::getApellidos().' tiene ID '.self::getId();
        }
    }

    class Administradores extends Persona {
        public function getId() {
            return $this->id;
        }
        public function setId() {
            $this->id++;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function setNombre($nombre) {
            $this->nombre=$nombre;
        }
        public function getApellidos() {
            return $this->apellidos;
        }
        public function setApellidos($apellido) {
            $this->apellidos = $apellido;
        }
        public function accion() {
            return "El uadministrador ".self::getNombre().' '.self::getApellidos().' tiene ID '.self::getId();
        }
    }


    
//3. Implementa el método `accion()` 
//que muestre el nombre y los apellidos de la persona, a
//sí como una frase identificando si es un usuario o un administrador. 

$persona = new Usuarios();
$persona->setId();
$persona ->setNombre("Marina");
$persona->setApellidos("Garbanzo");
echo $persona->accion();

$adm = new Administradores();
$adm->setId();
$adm ->setNombre("Carmen");
$adm->setApellidos("Lobo");
echo $adm->accion();

//4. Genera los objetos que nos permitan identificar un buen funcionamiento de la aplicación. 
?>