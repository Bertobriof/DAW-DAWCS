
<?php 

interface CalculosCentroEstudios {
    public function numeroDeAprobados();
    public function numeroDeSuspensos();
    public function notaMedia();
}

/*
1. Declara una **interface** llamada `CalculosCentroEstudios` con los siguientes métodos:
    - ```numeroDeAprobados```, que devuelve el número de aprobados.
    - ```numeroDeSuspensos```, que devuelve el número de suspensos.
    - ```notaMedia```, que devuelve la nota media. */

    class Notas {
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


/*2. Crea una clase ```Notas```:
    - Tendrá un atributo llamado ```notas```. Este atributo será un array con diferentes notas enteras. 
    - Tendrá una función abstracta ```toString()```. Esta función pasará el array a string y lo devolverá. Ejemplo:

    ```php
        public function toString()
        {
            $listaDeNotas = "";
            foreach ($this->get_notas() as $nota) {
                $listaDeNotas .= "[$nota]";
            }
            return $listaDeNotas;
        }
    ```*/

    class NotasDaw extends Notas implements CalculosCentroEstudios {
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
    /*
3. Crea por último, una clase denominada ```NotasDaw``` que hereda de la clase ```Notas``` e implementa ```CalculosCentroEstudos```.
*/
/*4. Escribe el código correspondente para "testear" la anterior clase:
    -  Crea un objeto de la clase ```NotasDaw``` e invocar todos los métodos de esta clase mostrando por pantalla los resultados
*/
$calcularNota = new NotasDaw();
$calcularNota->addNota(5);
$calcularNota->addNota(3);
$calcularNota->addNota(8);
echo "Número de aprobados: ".$calcularNota->numeroDeAprobados().'<br>';
echo "Número de suspensos: ".$calcularNota->numeroDeSuspensos().'<br>';
echo "Nota media: ".$calcularNota->notaMedia().'<br>';

?>