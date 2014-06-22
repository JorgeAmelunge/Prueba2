<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_partidos{
 //constructor	
 	var $con;
 	function Datos_Gestionar_partidos(){
 		$this->con=new DBManager;
 	}

	function Insertar_Partido($Codigo_jornada=0,$Codigo_Estadio=0,$Codigo_Local=0,$Codigo_Visitante=0,$Fecha="",$Hora=""){
   
            if($this->con->conectar()==true){			
			return mysql_query("insert into partido values(0,".$Codigo_jornada.",".$Codigo_Estadio.",".$Codigo_Local.",".$Codigo_Visitante.",'".$Fecha."','".$Hora."',0,0,0,0,0)");
		}
	}	
	function Mostrar_Tabla_Partido($Codigo_Jornada=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select partido.pts as pts,partido.idpartido as codigo_partido,jornada.idjornada as codigo_jornada,torneo.idtorneo as codigo_torneo,torneo.nombre as torneo,jornada.nombre as jornada,estadio.nombre as Estadio,estadio.capacidad as estadio_capacidad,estadio.ciudad as estadio_ciudad,(select equipo.nombre from equipo where equipo.idequipo=partido.idlocal)as ELocal,(select equipo.idequipo from equipo where equipo.idequipo=partido.idlocal)as codigolocal,(select equipo.escudo from equipo where equipo.idequipo=partido.idlocal)as EscudoLocal,(select equipo.nombre from equipo where equipo.idequipo=partido.idvisitante)as EVisita,(select equipo.escudo from equipo where equipo.idequipo=partido.idvisitante) as EscudoVisitante,(select equipo.idequipo from equipo where equipo.idequipo=partido.idvisitante) as codigovisitante,partido.fecha,partido.hora,if(partido.penallocal>0 || partido.penalvisitante>0,concat(partido.marcadorlocal,' (',partido.penallocal,')'),partido.marcadorlocal) as 'marcador_local',if(partido.penallocal>0 || partido.penalvisitante>0,concat(partido.marcadorvisitante,' (',partido.penalvisitante,')'),partido.marcadorvisitante) as 'marcador_visitante' from partido,jornada,torneo,estadio where partido.idjornada=".$Codigo_Jornada." and jornada.idjornada=partido.idjornada and torneo.idtorneo=jornada.idtorneo and estadio.idestadio=partido.idestadio; ");
		}
	}
        function Mostrar_Tabla_Partido_detalle($Codigo_Jornada=0,$codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select partido.idlocal as codigo_local,partido.idvisitante as codigo_visitante,partido.idpartido as codigo_partido,jornada.idjornada as codigo_jornada,torneo.idtorneo as codigo_torneo,torneo.nombre as torneo,jornada.nombre as jornada,estadio.nombre as estadio,estadio.capacidad,estadio.ciudad,estadio.departamento,(select equipo.nombre from equipo where equipo.idequipo=partido.codigolocal)as ELocal,(select equipo.escudo from equipo where equipo.idequipo=partido.idlocal)as EscudoLocal,(select equipo.nombre from equipo where equipo.idequipo=partido.idvisitante)as EVisita,(select equipo.escudo from equipo where equipo.idequipo=partido.idvisitante) as EscudoVisitante,partido.fecha,partido.hora,partido.marcadorlocal,partido.marcadorvisitante,partido.pts from partido,jornada,torneo,estadio where partido.idpartido=".$codigo_partido." and partido.idjornada=".$Codigo_Jornada." and jornada.idjornada=partido.idjornada and torneo.idtorneo=jornada.idtorneo and estadio.idestadio=partido.idestadio; ");
		}
	}
         function Mostrar_Tabla_Partido_detallado($codigo_partido=0){ 
     
		if($this->con->conectar()==true){
			return mysql_query("select partido.pts,partido.idpartido as codigo_partido,jornada.idjornada as codigo_jornada,torneo.idtorneo as codigo_torneo,torneo.nombre as torneo,jornada.nombre as jornada,estadio.nombre
as estadio,estadio.capacidad,estadio.ciudad,estadio.departamento,partido.idlocal
as ELocal,(select equipo.escudo from equipo where equipo.idequipo=partido.idlocal)as EscudoLocal,partido.idvisitante as EVisita,(select equipo.escudo from equipo where equipo.idequipo=partido.idvisitante)
  as EscudoVisitante,partido.fecha,partido.hora,partido.marcadorlocal as marcador_local,partido.marcadorvisitante as marcador_visitante from partido,jornada,torneo,estadio
  where partido.idpartido=".$codigo_partido." and jornada.idjornada=partido.idjornada and torneo.idtorneo=jornada.idtorneo and estadio.idestadio=partido.idestadio;");
		}
	}
        
        function Insertar_gol_Local($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partido set marcadorlocal=marcadorlocal+1 where idpartido=".$codigo_partido."; ");
		}
	}
        function Insertar_gol_Visitante($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partido set marcadorvisitante=marcadorvisitante+1 where idpartido=".$codigo_partido."; ");
		}
	}
	function Insertar_penal_Local($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partido set penallocal=penallocal+1 where idpartido=".$codigo_partido."; ");
		}
	}
        function Insertar_penal_Visitante($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partido set penalvisitante=penalvisitante+1 where idpartido=".$codigo_partido."; ");
		}
	}
        function Insertar_puntos($codigo_partido=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update partido set pts=1 where idpartido=".$codigo_partido."; ");
		}
	}
        
       
        
	function Eliminar_Partido($Id_partido=0){
		if($this->con->conectar()==true){
			return mysql_query("delete from partido WHERE idpartido = ".$Id_partido);
		}
	}
      
	
      function Verificar_fechas($FechaI="",$FechaF=""){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM jornada,torneo where jornada.idtorneo=torneo.idtorneo and datediff(torneo.fechainicio,'".$FechaF."')<=0 and datediff(torneo.fechafinal,'".$FechaI."')>=0");
                        return mysql_num_rows($result);
		}
	}
        
       
        
        
       	
	
}
?>
