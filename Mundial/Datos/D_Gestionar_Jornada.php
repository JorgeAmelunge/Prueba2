<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Jornada{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Jornada(){
 		$this->con=new DBManager;
 	}

	function Insertar_Jornada($Codigo_Torneo=0,$FechaI="",$FechaF="",$Nombre=""){
   
            if($this->con->conectar()==true){			
			return mysql_query("insert into jornada values(0,".$Codigo_Torneo.",'".$FechaI."','".$FechaF."','".$Nombre."')");
		}
	}	
	function Mostrar_Tabla_Jornada($Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT jornada.idjornada as codigo_Jornada,jornada.fechainicio as fecha_inicio,jornada.fechafin as fecha_fin,jornada.nombre as Njornada,torneo.nombre as Ntorneo,torneo.idtorneo as codigo_torneo FROM jornada,torneo where jornada.idtorneo=".$Codigo_Torneo."  and torneo.idtorneo=jornada.idtorneo order by jornada.idtorneo asc");
		}
	}
        
        function Mostrar_Cant_Jornada($Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT torneo.cantidadfechas-count(*) as cantidad FROM jornada,torneo where jornada.idtorneo=".$Codigo_Torneo." and torneo.idtorneo=jornada.idtorneo");
		}
	}
        function Verificar_nombre($nombre="",$FechaI="",$FechaF=""){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM jornada where nombre='".$nombre."' and ((datediff(fechainicio,'".$FechaF."')<0 and datediff(fechafin,'".$FechaI."')>0) or (datediff(fechainicio,'".$FechaF."')>0 and datediff(fechafin,'".$FechaI."')<0))");
                        return mysql_num_rows($result);
		}
	}
        
	function Eliminar_jornada($Id_jornada=0){
		if($this->con->conectar()==true){
			return mysql_query("delete from jornada WHERE idjornada = ".$Id_jornada);
		}
	}
      
	
        function Modificar_Jornada($ID_jornada=0,$FechaI="",$FechaF="",$Nombre=""){
		if($this->con->conectar()==true){
			
			return mysql_query("update jornada set fechainicio='".$FechaI."',fechafin='".$FechaF."',nombre='".$Nombre."' where idjornada = ".$ID_jornada);
		}
	}
       
         function Verificar_fechas($FechaI="",$FechaF="",$Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM torneo where torneo.idtorneo=".$Codigo_Torneo." and datediff(torneo.fechainicio,'".$FechaF."')<=0 and datediff(torneo.fechafinal,'".$FechaI."')>=0");
                        return mysql_num_rows($result);
		}
	}
        
       	function Mostrar_Combo_Jornada($Codigo_Torneo=0){
            if($this->con->conectar()==true){		
		
	$consulta = mysql_query("SELECT jornada.idjornada as codigo_Jornada,jornada.fechainicio as fecha_inicio,jornada.fechafin as fecha_fin,jornada.nombre as Njornada,torneo.nombre as Ntorneo,torneo.idtorneo as codigo_torneo FROM jornada,torneo where jornada.idtorneo=".$Codigo_Torneo."  and torneo.idtorneo=jornada.idtorneo order by jornada.idtorneo asc");
		$num_total_registros = mysql_num_rows($consulta);
		if($num_total_registros>0)
		{
			$jornadas = array();
			while($jornada = mysql_fetch_array($consulta))
			{
				$code = $jornada["codigo_Jornada"];
				$name = $jornada["Njornada"];                                				
				$jornadas[$code]=$name;
			}
			return $jornadas;
		}
		else
		{
			return false;
		}	
			
		
	}
        }
}
?>
