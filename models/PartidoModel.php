<?php
namespace models;

use libs\DBConexion;

class PartidoModel {
	

	public $resultado;
	public $estadio;
	public $arbitro;
	public $incidencia;
	public $usuario;
	public $fecha_creacion;
	public $fecha_modificacion;


	public function __construct(){
		$this->costo_faltante = 0.0;
	}

	public function obtenerInventarioDia($dia){
		//Solicito el unico objeto de conexion que usaran todas la clases, usando el patron Singleton		
		$con = DBConexion::getInstance();

		$inventarios= $con->executeQuery('SELECT * FROM inventario WHERE inventario.dia=?;',
			array($dia), __NAMESPACE__.'\InventarioModel');

		return $inventarios;
	}

	public function crearInventario($dia, $produccion, $demanda){
		//Dia de trabajo en el ingenio.
		$this->dia=$dia;
		//Produccion y demanda del dia
		$this->produccion = $produccion;
		$this->demanda = $demanda;
		

		//Inventario inicial
		if($this->dia == 1){
			$this->inventario_inicial = $this->produccion;
		}
		else{
			//Obteniendo el inventario del dia anterior
			
			$consulta =$this->obtenerInventarioDia($this->dia - 1);
			if(count($consulta)==0){
				throw new \Exception(sprintf("No existe un inventario para el dia %s, por tanto, no se puede seguir", $dia-1));
				
			}
			$this->inventario_inicial = $consulta[0]->inventario_final + $this->produccion;


		}
		//Inventario final del dia
		$this->inventario_final = max(0, $this->inventario_inicial - $this->ventas);

		//Calculando las ventas del dia
		$this->ventas = min($this->inventario_inicial, $this->demanda);

		//Costo produccion
		$this->costo_produccion = 5 * $this->produccion;

		//Costo faltante
		if($this->demanda > $this->inventario_inicial){
			$this->costo_faltante = 6 * ($this->demanda - $this->inventario_inicial);
		}

		//Costo inventario
		$this->costo_inventario = 2 * (($this->inventario_inicial + $this->inventario_final) / 2);

		//Costo total
		$this->costo_total = $this->costo_produccion + $this->costo_faltante + $this->costo_inventario;

		
		//Guardando el inventario del dia
		$this->guardar();
	}

	public function guardar($resultado,$estadio,$arbitro,$incidencia,$usuario,$fecha_creacion,$fecha_modificacion){
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
			$resultado,
			$estadio,
			$arbitro,
			$incidencia,
			$usuario,
			$date,
			$date
			
			);

		
		//print_r($params);
		//echo "HOLAAAAAAAAAAAAAAAAAA";
			
		//$sql1 = vsprintf("INSERT INTO equipo VALUES(%s, %s, %s,%s,%s);", $params);
		$sql1 = vsprintf("INSERT INTO partido (resultados,estadio,arbitro,incidencia,usuario_creador, fecha_creacion, ultima_modificacion) VALUES ('%s','%s','%s','%s','%s','%s','%s')", $params);

		//$sql1 = vsprintf("INSERT INTO equipo VALUES(%s, %s, %s,%s,%s);", $params);
		//$sql1 = vsprintf("INSERT INTO equipo VALUES(15,'abc','aaa','juvenil','rojo','azul','pancho',12/12/2015,12/12/2015)");
		//echo $sql1;

		$con->executeUpdate(array($sql1));

		//echo "Se ejecuto el comando sql";

	}

	public function listarPartidos() {
		
		$con = DBConexion::getInstance();
		if (is_null($con)) {

			throw new Exception("Error de conexion", 1);
			
			# code...
		}

		$inventarios = $con->executeQuery('SELECT * FROM  partido;', null, __NAMESPACE__.'\PartidoModel');

		return $inventarios;

	}


}

?>