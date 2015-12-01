<?php
namespace models;

use libs\DBConexion;

class JugadorModel {
	
	public $id_jugador;
	public $nombre;
	public $apellidos;
	public $direccion;
	public $telefono;
	public $fecha_nacimiento;
	public $num_dorsal;
	
	public function guardar($nombre,$apellidos,$direccion,$telefono,$fecha_nacimiento,$num_dorsal,$id_equipo,$fecha_creacion,$fecha_modificacion){
		//Solicito un objeto conexion, usando el patron Singleton
		//echo "aqui toy";

		/*echo $nombre_equipo;
		echo $patrocinadores;
		echo $categoria;
		echo $camiseta1;*/


		//$timezone = date_default_timezone_get();
		//echo "The current server timezone is: " . $timezone;

		//date_default_timezone_set('America/Mexico_City');
		$date = date('Y-m-d h:i:s', time());
		echo $date;
		

	
		$con = DBConexion::getInstance();
		$params = array(			
			$nombre,
			$apellidos,
			$direccion,
			$telefono,
			$fecha_nacimiento,
			$num_dorsal,
			$id_equipo,
			$date,
			$date	
			);

		
		//print_r($params);
		//echo "HOLAAAAAAAAAAAAAAAAAA";

		//INSERT INTO jugador (nombre,apellidos,direccion, telefono, fecha_nacimiento, num_dorsal, id_equipo, usuario_creador, fecha_creacion, ultima_modificacion) VALUES ('Luis bernardo', 'Garcia Lopez', 'Jungla', '83115152626' , 12/12/2012, '10', '27', 'PANCHO',2015-11-12 12:31:35, 2015-11-12 12:31:35); 

			
		//$sql1 = vsprintf("INSERT INTO equipo VALUES(%s, %s, %s,%s,%s);", $params);
		//$sql1 = vsprintf("INSERT INTO jugador (nombre,apellidos,direccion, telefono, fecha_nacimiento, num_dorsal, id_equipo, usuario_creador, fecha_creacion, ultima_modificacion) VALUES ('%s','%s','%s','%s','%s',%s,%s, '%s', '%s', '%s')", $params);
		$sql1 = "INSERT INTO jugador (nombre,apellidos,direccion, telefono, fecha_nacimiento, num_dorsal, id_equipo, usuario_creador, fecha_creacion, ultima_modificacion) VALUES
		('$nombre', '$apellidos', '$direccion', '$telefono' , '$fecha_nacimiento', '$num_dorsal',
			'$id_equipo', 'PANCHO','$date', '$date');";
//		echo $sql1;

		//$sql1 = vsprintf("INSERT INTO equipo VALUES(%s, %s, %s,%s,%s);", $params);
		//$sql1 = vsprintf("INSERT INTO equipo VALUES(15,'abc','aaa','juvenil','rojo','azul','pancho',12/12/2015,12/12/2015)");
		//echo $sql1;

		$con->executeUpdate(array($sql1));

		//echo "Se ejecuto el comando sql";

	}

	public function listarEquipos() {

		$con = DBConexion::getInstance();
		if (is_null($con)) {

			throw new Exception("Error de conexion", 1);
			
			# code...
		}

		$equipos = $con->executeQuery('SELECT id_equipo, nombre_equipo FROM  equipo;', null, __NAMESPACE__.'\JugadorModel');

		
		
		//echo "<pre>";
		//print_r($jugadores);

		return $equipos;

	}

	public function listarJugadores() {
		
		$con = DBConexion::getInstance();
		if (is_null($con)) {

			throw new Exception("Error de conexion", 1);
			
			# code...
		}

		$jugadores = $con->executeQuery('SELECT * FROM  jugador;', null, __NAMESPACE__.'\JugadorModel');

		
		//printf($jugadores);
		//echo "WHAT??";
		//print_r($jugadores);

		return $jugadores;

	}

	public function getJugadorById($id){
		try{
		$con = DBConexion::getInstance();
		if (is_null($con)) {
			throw new Exception("Error en la conexion a la base de datos, verifique",1);
		}

		$proveedor = $con->executeQuery("SELECT * FROM jugador WHERE id_jugador = ?;",array($id), __NAMESPACE__.'\JugadorModel');

		return $proveedor;
	}
	catch (Exception $e) {
		throw $e;	
	}
	}

	public function actualizarJugador($id_jugador, $nombre, $apellidos, $direccion, $telefono, $fecha_nacimiento,$dorsal) {
		try {
			$this->id_jugador=$id_jugador;
			$this->nombre=$nombre;			
			$this->apellidos = $apellidos;
			$this->direccion = $direccion;
			$this->telefono = $telefono;
			$this->fecha_nacimiento = $fecha_nacimiento;
			$this->num_dorsal = $dorsal;			
			echo "<script language='javascript'>"; 
			echo "alert('LLEGO.')"; 
			echo "</script>";
			$this->update();
		} catch (Exception $e) {
			throw $e;
		}
	}

	public function update(){
		try {
			$con = DBConexion::getInstance();

			$params = array(					
					$this->nombre,
					$this->apellidos,
					$this->direccion,
					$this->telefono,
					$this->fecha_nacimiento,
					$this->num_dorsal,
					$this->id_jugador
					
				);

			$sql1 = vsprintf("UPDATE jugador SET nombre='%s', apellidos='%s',direccion='%s',telefono='%s',fecha_nacimiento='%s', num_dorsal='%s' WHERE id_jugador='%s';", $params);					
			$con->executeUpdate(array($sql1));

			

		} catch (Exception $e) {
			throw $e;	
		}
	}

	
		public function eliminarJugador($id){
		try {
			$con = DBConexion::getInstance();

			if (is_null($con)) {
			throw new Exception("Error en la conexion a la base de datos, verifique",1);
			}

			$sql1 = vsprintf("DELETE FROM jugador WHERE id_jugador = '%s'", $id);			
			$con->executeUpdate(array($sql1));

		} catch (Exception $e) {
			throw $e;
		}
	}



	


}

?>