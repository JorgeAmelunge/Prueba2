<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Equipos{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Equipos(){
 		$this->con=new DBManager;
 	}

	function Insertar_Equipo($Nombre="",$Escudo="",$Ciudad="",$Presidente="",$Fecha="",$Direccion="",$Telefonos="",$WEB="",$Email=""){
		
            if($this->con->conectar()==true){			
			return mysql_query("insert into equipo values(0,'".$Nombre."','".$Escudo."','".$Ciudad."','".$Presidente."','".$Fecha."','".$Direccion."','".$Telefonos."','".$WEB."','".$Email."','Habilitado')");
		}
	}	
	function Mostrar_Tabla_Equipos(){ 
		if($this->con->conectar()==true){
			return mysql_query("select idequipo as codigo_equipo,nombre,escudo,ciudad,presidente,fechafundacion as fecha_fundacion,direccion,telefono as telefonos,web,email from equipo where observacion='Habilitado' and idequipo!=33 and idequipo!=34 order by nombre asc");
		}
	}
        function Mostrar_Tabla_Equipos_Especifico($ID_Equipo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select idequipo as codigo_equipo,nombre,escudo,ciudad,presidente,fechafundacion as fecha_fundacion,direccion,telefono as telefonos,web,email from equipo where idequipo=".$ID_Equipo." and observacion='Habilitado' order by nombre asc");
		}
	}
        function Mostrar_Tabla_Equipos_series($ID_torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select equipo.idequipo as codigo_equipo,equipo.nombre from equipo where equipo.observacion='Habilitado' and equipo.idequipo not in (select serieequipo.idequipo from serieequipo,serie where serie.idtorneo=".$ID_torneo." and serieequipo.idserie=serie.idserie) order by equipo.nombre asc");
		}
	}
        function Mostrar_Tabla_Equipos_Partido($ID_torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select equipo.idequipo as codigo_equipo,equipo.nombre from equipo where equipo.idequipo in (select serieequipo.idequipo from serieequipo,serie where serie.idtorneo=".$ID_torneo." and serieequipo.idserie=serie.idserie) order by equipo.nombre asc");
		}
	}
        function Mostrar_Nombre_Equipos(){ 
		if($this->con->conectar()==true){
			return mysql_query("select idequipo as codigo_equipo,nombre from equipo where observacion='Habilitado' order by nombre asc");
		}
	}
        
	function Eliminar_Equipo($Id_equipo=0){
		if($this->con->conectar()==true){
			return mysql_query("update equipo set observacion= 'DesHabilitado' where idequipo = ".$Id_equipo);
		}
	}
        function Obtener_Escudo($Id_equipo=0){
		if($this->con->conectar()==true){
			return mysql_query("select escudo from equipo where idequipo=".$Id_equipo);
		}
	}
	
        function Modificar_equipo($ID_equipo=0,$Nombre="",$Escudo="",$Ciudad="",$Presidente="",$Fecha="",$Direccion="",$Telefonos="",$WEB="",$Email=""){
		if($this->con->conectar()==true){
			
			return mysql_query("update equipo set nombre='".$Nombre."',escudo='".$Escudo."',ciudad='".$Ciudad."',presidente='".$Presidente."',fechafundacion='".$Fecha."',direccion='".$Direccion."',telefono='".$Telefonos."',web='".$WEB."',email='".$Email."' where idequipo = ".$ID_equipo);
		}
	}
        function Modificar_Equipo_S_Escudo($ID_equipo=0,$Nombre="",$Ciudad="",$Presidente="",$Fecha="",$Direccion="",$Telefonos="",$WEB="",$Email=""){
		if($this->con->conectar()==true){
			return mysql_query("update equipo set nombre='".$Nombre."',ciudad='".$Ciudad."',presidente='".$Presidente."',fechafundacion='".$Fecha."',direccion='".$Direccion."',telefono='".$Telefonos."',web='".$WEB."',email='".$Email."' where idequipo = ".$ID_equipo);
		}
	}
        
       		function Mostrar_Combo_Equipo($ID_torneo=0){
            if($this->con->conectar()==true){		
		
	$consulta = mysql_query("select equipo.idequipo as codigo_equipo,equipo.nombre from equipo where equipo.observacion='Habilitado' and equipo.idequipo not in (select serieequipo.idequipo from serieequipo,serie where serie.idtorneo=".$ID_torneo." and serieequipo.idserie=serie.idserie) order by equipo.nombre asc");
		$num_total_registros = mysql_num_rows($consulta);
		if($num_total_registros>0)
		{
			$equipos = array();
			while($equipo = mysql_fetch_array($consulta))
			{
				$code = $equipo["codigo_equipo"];
				$name = $equipo["equipo"];                                				
				$equipos[$code]=$name;
			}
			return $equipos;
		}
		else
		{
			return false;
		}	
			
		
	}
        }
	
}
?>
