<?php
namespace models;

use libs\DBConexion;

class EquipoModel {
	

	public $id_equipo;
	public $nombre_equipo;
	public $patrocinador;
	public $categoria;
	public $color_camiseta1;
	public $color_camiseta2;
	public $usuario_creador;
	public $fecha_creacion;
	public $ultima_modificacion;



	public function guardar($nombre_equipo,$patrocinador,$categoria,$color_camiseta1,$color_camiseta2,$usuario_creador,$fecha_creacion,$fecha_modificacion){
		//Solicito un objeto conexion, usando el patron Singleton
		//echo "aqui toy";

		/*echo $nombre_equipo;
		echo $patrocinadores;
		echo $categoria;
		echo $camiseta1;*/


		//$timezone = date_default_timezone_get();
		//echo "The current server timezone is: " . $timezone;

		//date_default_timezone_set('America/Mexico_City');
		$fecha_modificacion = date('Y-m-d h:i:s', time());
		
		

	
		$con = DBConexion::getInstance();
		$params = array(			
			$nombre_equipo,
			$patrocinador,
			$categoria,
			$color_camiseta1,
			$color_camiseta2,
			$usuario_creador,
			$fecha_modificacion,
			$fecha_modificacion
			
			);

		
		//print_r($params);
		//echo "HOLAAAAAAAAAAAAAAAAAA";
			
		//$sql1 = vsprintf("INSERT INTO equipo VALUES(%s, %s, %s,%s,%s);", $params);
		$sql1 = vsprintf("INSERT INTO equipo (nombre_equipo,patrocinador,categoria, color_camiseta1, color_camiseta2,usuario_creador, fecha_creacion, ultima_modificacion) VALUES ('%s','%s','%s','%s','%s','%s','%s', '%s')", $params);
		echo $sql1;
		//$sql1 = vsprintf("INSERT INTO equipo VALUES(%s, %s, %s,%s,%s);", $params);
		//$sql1 = vsprintf("INSERT INTO equipo VALUES(15,'abc','aaa','juvenil','rojo','azul','pancho',12/12/2015,12/12/2015)");
		//echo $sql1;

		$con->executeUpdate(array($sql1));

		//echo "Se ejecuto el comando sql";

	}

	public function getEquipoById($id){
		try{
		$con = DBConexion::getInstance();
		if (is_null($con)) {
			throw new Exception("Error en la conexion a la base de datos, verifique",1);
		}

		$proveedor = $con->executeQuery("SELECT * FROM equipo WHERE id_equipo = ?;",array($id), __NAMESPACE__.'\EquipoModel');

		return $proveedor;
	}
	catch (Exception $e) {
		throw $e;	
	}
	}

	public function listarEquipos() {
		
		$con = DBConexion::getInstance();
		if (is_null($con)) {

			throw new Exception("Error de conexion", 1);
			
			# code...
		}

		$equipos = $con->executeQuery('SELECT * FROM  equipo;', null, __NAMESPACE__.'\EquipoModel');
		//echo "<pre>";
		//print_r($equipos);
		return $equipos;

	}

	public function actualizarEquipo($id_equipo, $nombre_equipo, $patrocinador, $categoria, $camiseta1, $camiseta2) {
		try {
			$this->id_equipo=$id_equipo;
			$this->nombre_equipo=$nombre_equipo;			
			$this->patrocinador = $patrocinador;
			$this->categoria = $categoria;
			$this->color_camiseta1 = $camiseta1;
			$this->color_camiseta2 = $camiseta2;			
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
					$this->nombre_equipo,
					$this->patrocinador,
					$this->categoria,
					$this->color_camiseta1,
					$this->color_camiseta2,
					$this->id_equipo
					
				);

			$sql1 = vsprintf("UPDATE equipo SET nombre_equipo='%s', patrocinador='%s',categoria='%s',color_camiseta1='%s',color_camiseta2='%s' WHERE id_equipo='%s';", $params);					
			$con->executeUpdate(array($sql1));

			

		} catch (Exception $e) {
			throw $e;	
		}
	}

	public function eliminarEquipo($id){
		try {
			$con = DBConexion::getInstance();

			if (is_null($con)) {
			throw new Exception("Error en la conexion a la base de datos, verifique",1);
			}

			$sql1 = vsprintf("DELETE FROM equipo WHERE id_equipo = '%s'", $id);			
			$con->executeUpdate(array($sql1));

		} catch (Exception $e) {
			throw $e;
		}
	}




}

?>