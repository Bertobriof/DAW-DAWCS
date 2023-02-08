
<?php 

class Data
{
     public static $calendario = "Calendario gregoriano";

     public static function getData()
     {
         $ano = date('Y'); //Nos da el año actual 
         $mes = date('m');
         $dia = date('d');
         return $dia . '/' . $mes . '/' . $ano;
     }
     public function getCalendar() {
        return $this->calendario;
    }
    public static function getHora() {
        $hora = date('H');
        $minutos = date('i');
        return $hora . ':' . $minutos;
    }
    public function getDataHora() {
        echo self::getData().' '. self::getHora();
    }
}

$prueba = new Data();
echo $prueba->getDataHora();

/*
- ```getCalendar()```: que devolverá el valor de esta propiedad. 
- ```getHora()```: que devuelve la hora en el siguiente formato HH:MM:SS. 
- ```getDataHora()```: que llamará a los métodos ```getData()``` y ```getHora()``` para mostrar tanto la fecha como la hora. 
*/ 

?>