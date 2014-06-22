<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Torneo{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Torneo(){
            
 		$this->con=new DBManager;
 	}

	function Insertar_Torneo($FechaI="",$FechaF="",$Nombre="",$Cant_Fechas=0,$Comentario="",$Cant_Series=0){
            
            if($this->con->conectar()==true){			
			return mysql_query("insert into torneo values(0,'".$FechaI."','".$FechaF."','".$Nombre."',".$Cant_Fechas.",'".$Comentario."',".$Cant_Series.",'Habilitado')");
		}
	}	
	function Mostrar_Tabla_Torneo(){ 
		if($this->con->conectar()==true){
			return mysql_query("select idtorneo as codigo_torneo,fechainicio as fecha_inicio,fechafinal as fecha_final,nombre,cantidadfechas as cantidad_fechas,comentario,cantidadseries as cantidad_series from torneo where Observacion='Habilitado' order by fecha_inicio desc");
		}
	}
        function Mostrar_Tabla_Torneo_Equipo($ID_Equipo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select torneo.idtorneo as codigo_torneo,torneo.fechainicio as fecha_inicio,torneo.fechafinal as fecha_final,torneo.nombre,torneo.cantidadfechas as cantidad_fechas,torneo.comentario,torneo.cantidadseries as cantidad_series from torneo,serie,serieequipo where torneo.observacion='Habilitado' and torneo.idtorneo=serie.idtorneo and serie.idserie=serieequipo.idserie and serieequipo.idequipo=".$ID_Equipo." order by torneo.fechainicio desc");
		}
	}
        function Verificar_nombre($nombre="",$FechaI="",$FechaF=""){ 
		if($this->con->conectar()==true){
			$result= mysql_query("select * from torneo where observacion='Habilitado' and nombre='".$nombre."' and ((datediff(fechainicio,'".$FechaF."')<0 and datediff(fechafinal,'".$FechaI."')>0) or (datediff(fechainicio,'".$FechaF."')>0 and datediff(fechafinal,'".$FechaI."')<0)) order by idtorneo asc");
                        return mysql_num_rows($result);
		}
	}
         
        
	function Eliminar_Torneo($Id_torneo=0){
		if($this->con->conectar()==true){
			return mysql_query("update torneo set observacion= 'DesHabilitado' where idtorneo = ".$Id_torneo);
		}
	}
      
	
        function Modificar_Torneo($ID_torneo=0,$FechaI="",$FechaF="",$Nombre="",$Cant_Fechas=0,$Comentario="",$Cant_Series=0){
	
            if($this->con->conectar()==true){
			
			return mysql_query("update torneo set fechainicio='".$FechaI."',fechafinal='".$FechaF."',nombre='".$Nombre."',cantidadfechas=".$Cant_Fechas.",comentario='".$Comentario."',cantidadseries=".$Cant_Series." where idtorneo = ".$ID_torneo);
		}
	}
       
        function Cargar_Combo_Torneo()
	{
		if($this->con->conectar()==true){
		$consulta = mysql_query("select idtorneo as codigo_torneo,fechainicio as fecha_inicio,fechafinal as fecha_final,nombre,cantidadfechas as cantidad_fechas,comentario,cantidadseries as cantidad_series from torneo where observacion='Habilitado' order by fechainicio desc");
		$num_total_registros = mysql_num_rows($consulta);
		if($num_total_registros>0)
		{
			$Torneos = array();
			while($torneo = mysql_fetch_array($consulta))
			{
				$code = $torneo["codigo_torneo"];
				$name = $torneo["nombre"];				
				$Torneos[$code]=$name;
			}
			return $Torneos;
		}
		else
		{
			return false;
		}
		}
	}
       	
	
}
?>
