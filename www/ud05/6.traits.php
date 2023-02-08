
<?php 
/*
1. Cree un *Trait* llamado ```CalculosCentroEstudos``` 
con las mismas funciones que la interfaz del ejercicio 4.5.*/ 
    trait CalculosCentroEstudos {
        public function numeroDeAprobados() {
            $aprobados = 0;
            foreach(self::getNotas() as $nota) {
                if($nota >=5 && $nota <= 10) {
                    $aprobados++;
                }
            }
            return $aprobados;
        }
        public function numeroDeSuspensos() {
            $suspensos = 0;
            foreach(self::getNotas() as $nota) {
                if($nota < 5 && $nota >= 0) {
                    $suspensos++;
                }
            }
            return $suspensos;
        }
        public function notaMedia() {
            $notamedia = 0;
            $contador = 0;
            foreach(self::getNotas() as $nota) {
                if($nota >= 0 && $nota <= 10) {
                    $notamedia = $notamedia + $nota;
                    $contador++;
                }
            }
            if($contador >0) {
                return $notamedia/$contador;
            } else {
                return false;
            }
            
        }
    }

/*2. Cree otro *Trait* denominado ```MostrarCalculos``` con dos funciones: 
- la función de saludo que muestra "Bienvenido al centro de cálculo" 
- la función ```showCalculusStudyCenter```, que recibe el número de aprobados, 
suspensos y la calificación promedio y los muestra en la pantalla dándoles formato.*/
    trait MostrarCalculos {
        use CalculosCentroEstudos;
        public function saludo() {
            return "Bienvenido al centro de cálculo.";
        }
        public function showCalcusStudyCenter() {
            echo "<table>";
            echo  "<tr><th>Número de aprobados</th><th>Número de suspensos</th><th>Nota media</th></tr>";
            echo  "<tr><td>".$this->numeroDeAprobados()."</td><td>".$this->numeroDeSuspensos()."</td><td>".$this->notaMedia()."</td></tr>";
            echo "</table>";
        }
    }

/*
3. Cree una clase llamada ```NotasTrait``` que use los dos *traits* anteriores.

Escriba el código correspondiente para "probar" el código anterior.
*/
class NotasTrait {
    use MostrarCalculos;
    private $notas = array();
        
    public function getNotas() {
        return $this->notas;
    }
    public function addNota($notas) {
        $this->notas[] = $notas;
    }

    public function toString() {
        $listaDeNotas = "";
        foreach($this->getNotas() as $nota) {
            $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas;
    }
}

$calcularNota = new NotasTrait();
$calcularNota->addNota(5);
$calcularNota->addNota(3);
$calcularNota->addNota(8);
echo $calcularNota->saludo()."<br>";
$calcularNota->showCalcusStudyCenter();





?>