<?php 

//AÑADO LO NECESARIO PARA USAR EL FRAMEWORK:
require 'flight/Flight.php'; //Librería del framkework flight
/*Flight::route('/', function() {
    echo 'Hello world';
});*/

Flight::register('db','PDO',array('mysql:host=db;dbname=dbTarea6','root','test'));

/*  Tabla Clientes
Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/clientes```: 
- GET: Al acceder a esta ruta se debe mostar todos los datos de los clientes. HECHO
    Optativo. Mostrar la información de un único cliente a través del id.  HECHO
- POST: Se debe poder insertar un cliente en la base de datos. 
- DELETE: Dado un id se debe poder eliminar un cliente.
- PUT: Se podrá modificar de un cliente sus apellidos, edad, email y teléfono. 
*/ 

Flight::route('GET /clientes', function(){
        $sql = 'SELECT * FROM clientes';
        $parametros = array();
        $sentencia = Flight::db()->prepare($sql);
        $sentencia->execute();
        $datos = $sentencia->fetchAll();
        Flight::json($datos);
        

});

Flight::route('GET /clientes/filtro', function(){
    $sql = 'SELECT * FROM clientes WHERE id = ?';
    $parametros = Flight::request()->data->id;
    $sentencia = Flight::db()->prepare($sql);
    
    $sentencia->bindParam(1,$parametros);
    $sentencia->execute();
    $datos = $sentencia->fetchAll();
    Flight::json($datos);
});
Flight::route('GET /clientes/@id', function($id){ //Con @ en la ruta defino la variable en la ruta. Si pongo http://localhost/ud06/clientes/2 me filtra por el ID2.
    $sentencia = Flight::db()->prepare('SELECT * FROM clientes WHERE id = ?');
    $sentencia->bindParam(1,$id);
    $sentencia->execute();
    $datos = $sentencia->fetchAll();
    Flight::json([$datos]);
});

/* Tabla Hoteles

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/hoteles```: 

- GET: Al acceder a esta ruta se debe mostar todos los datos de los hoteles.  
    Optativo. Mostrar la información de un único hotel a través del id.   
- POST: Se debe poder insertar un hotel en la base de datos. 
- DELETE: Dado un id se debe poder eliminar un hotel.
- PUT: Se podrá modificar de un hotel sus direccion, email y teléfono. 
*/
/* Tabla Reserva

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/reservas```. Hay que tener en cuenta que esta tabla tiene dependencias con las otras dos tablas. 

- GET: Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.  
    Optativo. Mostrar la información de un única reserva a través del id.  
- POST: Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.  
- DELETE: Dado un id se debe poder eliminar una reserva.
- PUT: Se podrá modificar de una reserva la fecha de entrada y la fecha de salida.
 */
Flight::start(); //inicializar el servicio
 ?>