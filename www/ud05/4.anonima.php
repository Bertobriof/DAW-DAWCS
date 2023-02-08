
<?php 

/*
Utilizando una **clase anónima** crea diferentes objetos con los siguientes requisitos:
- La clase tiene **dos propiedades**:
    - `$base`
    - `$altura`
- La clase tiene **dos métodos**:
    - `area()`: devolve la (base * altura) / 2 .

Escribe un ejemplo de uso.
*/

$obj = new class($base,$altura) {
    public $base;
    public $altura;

    public function __construct($base,$altura) {
        $this->base = $base;
        $this->altura = $altura;
    }
    public function area() {
        return ($this->base*$this->altura)/2;
    }
};
$obj->base= 4;
$obj->altura= 2;
echo $obj->area();



?>

