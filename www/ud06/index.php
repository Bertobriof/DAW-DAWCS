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
        $sql = 'SELECT * FROM clientes';;
        $sentencia = Flight::db()->prepare($sql);
        $sentencia->execute();
        $datos = $sentencia->fetchAll();
        Flight::json($datos);
});

Flight::route('GET /clientes/@id', function($id){ //Con @ en la ruta defino la variable en la ruta. Si pongo http://localhost/ud06/clientes/2 me filtra por el ID2.
    $sentencia = Flight::db()->prepare('SELECT * FROM clientes WHERE id = :id');
    $sentencia->bindParam(':id',$id);
    $sentencia->execute();
    $datos = $sentencia->fetchAll();
    Flight::json($datos);
});

//El post: - POST: Se debe poder insertar un cliente en la base de datos. 
Flight::route('POST /clientes', function() {
    $nombre = Flight::request()->data->nombre;
    $apellidos= Flight::request()->data->apellidos;
    $edad=Flight::request()->data->edad;
    $mail=Flight::request()->data->email;
    $telefono=Flight::request()->data->telefono;
    $id=Flight::request()->data->id;

    $sql="INSERT INTO clientes (id,nombre,apellidos,edad,email,telefono) VALUES (?,?,?,?,?,?)";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->bindParam(2,$nombre);
    $sentencia->bindParam(3,$apellidos);
    $sentencia->bindParam(4,$edad);
    $sentencia->bindParam(5,$mail);
    $sentencia->bindParam(6,$telefono);
    $sentencia->execute();
    Flight::jsonp(["Cliente añadido correctamente"]);
});

//Delete: - DELETE: Dado un id se debe poder eliminar un cliente.
Flight::route('DELETE /clientes', function() {
    $id=Flight::request()->data->id;
    $sql="DELETE FROM clientes WHERE id=?";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();
    Flight::json(["Cliente eliminado con id: $id"]);
}); 

Flight::route('PUT /clientes', function() {
    $id =Flight::request()->data->id;
    $nombre=Flight::request()->data->nombre;
    $apellidos=Flight::request()->data->apellidos;
    $edad=Flight::request()->data->edad;
    $email=Flight::request()->data->email;
    $telefono=Flight::request()->data->telefono;
    
    $sql="UPDATE clientes SET apellidos=?,edad=?,email=?,telefono=? WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    
    $sentencia->bindParam(1,$apellidos);    
    $sentencia->bindParam(2,$edad);
    $sentencia->bindParam(3,$email);
    $sentencia->bindParam(4,$telefono);
    $sentencia->bindParam(5,$id);
    $sentencia->execute();
    
    Flight::jsonp(["Cliente actualizado correctamente"]);
});


/* Tabla Hoteles

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/hoteles```: 

- GET: Al acceder a esta ruta se debe mostar todos los datos de los hoteles.  */
Flight::route('GET /hoteles', function () {
    $setencia = Flight::db()->prepare("SELECT * from hoteles");
     $setencia->execute();
     $datos=$setencia->fetchAll();
     Flight::json($datos);
});


/*
    Optativo. Mostrar la información de un único hotel a través del id.   */
Flight::route('GET /hoteles/@id', function($id){
    $sentencia = Flight::db()->prepare('SELECT * FROM hoteles WHERE id = ?');
    $sentencia->bindParam(1,$id);
    $sentencia->execute();
    $datos = $sentencia->fetchAll();
    Flight::json($datos);
});
    /*
- POST: Se debe poder insertar un hotel en la base de datos. */
Flight::route('POST /hoteles', function() {
    $id = Flight::request()->data->id;
    $hotel=Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email=Flight::request()->data->email;
    $sql = ('INSERT INTO hoteles(id,hotel,direccion,telefono,email) VALUES (?,?,?,?,?)');
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->bindParam(2,$hotel);
    $sentencia->bindParam(3,$direccion);
    $sentencia->bindParam(5,$email);
    $sentencia->bindParam(4,$telefono);
    $sentencia->execute();
    Flight::json(["Hotel añadido correctamente con id: $id"]);

});
/*
- DELETE: Dado un id se debe poder eliminar un hotel.*/
Flight::route('DELETE /hoteles',function() {
    $id = Flight::request()->data->id;
    $sql = "DELETE FROM hoteles WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();
    Flight::json(["Hotel con id $id eliminado"]);
});
/*
- PUT: Se podrá modificar de un hotel sus direccion, email y teléfono. 
*/
Flight::route('PUT /hoteles', function() {
    $id = Flight::request()->data->id;
    $hotel=Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email=Flight::request()->data->email;
    
    $sql="UPDATE hoteles SET hotel=?,direccion=?,telefono=?,email=? WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    
    $sentencia->bindParam(1,$hotel);    
    $sentencia->bindParam(2,$direccion);
    $sentencia->bindParam(3,$telefono);
    $sentencia->bindParam(4,$email);
    $sentencia->bindParam(5,$id);
    $sentencia->execute();
    
    Flight::jsonp(["Hotel $id actualizado correctamente"]);
});

/* Tabla Reserva

Se debe permitir las siguientes acciones sobre la tabla clientes y la ruta ```/reservas```. Hay que tener en cuenta que esta tabla tiene dependencias con las otras dos tablas. 

- GET: Al acceder a esta ruta se debe mostar todas las reservas realizadas por todos los clientes en todos los hoteles.  
    Optativo. Mostrar la información de un única reserva a través del id.  */
    Flight::route('GET /reservas', function () {
        $setencia = Flight::db()->prepare("SELECT * from reservas");
         $setencia->execute();
         $datos=$setencia->fetchAll();
         Flight::json($datos);
    });
    
    Flight::route('GET /reservas/@id', function($id){
        $sentencia = Flight::db()->prepare('SELECT * FROM reservas WHERE id = ?');
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        $datos = $sentencia->fetchAll();
        Flight::json($datos);
    });
    /*
- POST: Se debe poder insertar una reserva en la base de datos. Identificar los datos necesarios.  
*/
Flight::route('POST /reservas', function() {
    $id = Flight::request()->data->id;
    $idCliente=Flight::request()->data->id_cliente;
    $idHotel = Flight::request()->data->id_hotel;
    $fechaReserva = Flight::request()->data->fecha_reserva;
    $fechaEntrada=Flight::request()->data->fecha_entrada;
    $fechaSalida=Flight::request()->data->fecha_salida;
    $sql = ('INSERT INTO reservas(id,id_cliente,id_hotel,fecha_reserva,fecha_entrada,fecha_salida) VALUES (?,?,?,?,?,?)');
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->bindParam(2,$idCliente);
    $sentencia->bindParam(3,$idHotel);
    $sentencia->bindParam(4,$fechaReserva);
    $sentencia->bindParam(5,$fechaEntrada);
    $sentencia->bindParam(6,$fechaSalida);
    $sentencia->execute();
    Flight::json(["Registrada la reserva con id: $id"]);

});
/*
- DELETE: Dado un id se debe poder eliminar una reserva.*/
Flight::route('DELETE /reservas',function() {
    $id = Flight::request()->data->id;
    $sql = "DELETE FROM reservas WHERE id = ?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();
    Flight::json(["La reserva con id $id ha sido eliminada"]);
});
/*
- PUT: Se podrá modificar de una reserva la fecha de entrada y la fecha de salida.
 */
Flight::route('PUT /reservas', function() {
    $id = Flight::request()->data->id;
    $idCliente=Flight::request()->data->id_cliente;
    $idHotel = Flight::request()->data->id_hotel;
    $fechaReserva = Flight::request()->data->fecha_reserva;
    $fechaEntrada=Flight::request()->data->fecha_entrada;
    $fechaSalida=Flight::request()->data->fecha_salida;
    
    $sql="UPDATE reservas SET id_cliente=?,id_hotel=?,fecha_reserva=?,fecha_entrada=?,fecha_salida=? WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    
    $sentencia->bindParam(6,$id);
    $sentencia->bindParam(1,$idCliente);
    $sentencia->bindParam(2,$idHotel);
    $sentencia->bindParam(3,$fechaReserva);
    $sentencia->bindParam(4,$fechaEntrada);
    $sentencia->bindParam(5,$fechaSalida);
    $sentencia->execute();
    
    Flight::jsonp(["La reserva con ID $id ha sido actualizada correctamente"]);
});


Flight::start(); //inicializar el servicio
 ?>