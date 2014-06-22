<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Partido_Observacion
{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Partido_Observacion(){
 		$this->con=new DBManager;
 	}

	function Insertar_Partido_Observacion($ID_Partido=0,$ID_Observacion=0,$ID_Equipo=0){

            if($this->con->conectar()==true){                
			return mysql_query("insert into partidoobservacion values(".$ID_Observacion.",".$ID_Partido.",0,".$ID_Equipo.")");
		}
	}	
	function Mostrar_Tabla_Observacion(){ 
		if($this->con->conectar()==true){
			return mysql_query("select nombre,idobservacion as codigo_observacion from observacion");
		}
	}
        function Mostrar_Tabla_Partido_Observacion($ID_Partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select observacion.idobservacion,observacion.nombre as onombre,equipo.nombre as enombre,partidoobservacion.idpartidoobservacion as codigo from observacion,partidoobservacion,equipo where observacion.idobservacion=partidoobservacion.idobservacion and partidoobservacion.idpartido=".$ID_Partido." and equipo.idequipo=partidoobservacion.idequipo");
		}
	}
        
	function Eliminar_Partido_Observacion($ID_Partido=0,$codigo=0){
		if($this->con->conectar()==true){
			return mysql_query("delete from partidoobservacion where  idPartido=".$ID_Partido." and idpartidoobservacion=".$codigo);
		}
	}
      function Eliminar_Partido_gol_local($ID_Partido=0,$ID_Equipo=0){
		if($this->con->conectar()==true){
			return mysql_query("update partidos set marcadorlocal=marcadorlocal-1 where idpartido = ".$ID_Partido." and idlocal=".$ID_Equipo);
		}
	}
        function Eliminar_Partido_gol_visitante($ID_Partido=0,$ID_Equipo=0){
		if($this->con->conectar()==true){
			return mysql_query("update partidos set marcadorvisitante=marcadorvisitante-1 where idpartido = ".$ID_Partido." and idvisitante=".$ID_Equipo);
		}
	}
	
        /* function Mostrar_Tabla_Alineacion_Partido($ID_Partido=0,$ID_Equipo=0){ 
            
		if($this->con->conectar()==true){
			return mysql_query("select alineacion.codigo_alineacion,alineacion.codigo_equipo,alineacion.nombre,alineacion.pais,alineacion.fecha_nacimiento,equipo.nombre as equipos FROM alineacion,equipo where alineacion.Observacion='Habilitado' and equipo.codigo_equipo=alineacion.codigo_equipo and alineacion.codigo_alineacion in (select alineacion_partido.codigo_alineacion from alineacion_partido where alineacion_partido.codigo_partido=".$ID_Partido." )  and equipo.codigo_equipo=".$ID_Equipo." order by equipo.nombre asc");
		}
	} 
        
      function Insertar_Partido_Puntaje($ID_Partido=0,$ID_Equipo=0){

            if($this->con->conectar()==true){                
			return mysql_query("insert into partidos_observaciones values(".$ID_Observacion.",".$ID_Partido.",".$Minuto.",".$ID_Alineacion.")");
		}
	}*/
       	 
         function Mostrar_Tabla_Partido_Observacion_Equipo($ID_Partido=0,$ID_Equipo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select observacion.nombre as onombre,equipo.nombre as enombre from observacion,partidoobservaciones,equipo where observacion.idobservacion=partidoobservacion.idpartidoobservacion and partidoobservacion.idpartido=".$ID_Partido." and equipo.idequipo=partidoobservacion.idequipo and partidoobservacion.idequipo=".$ID_Equipo." order by onombre" );
		}
	}	
	
}
?>
