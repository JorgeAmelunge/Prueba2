<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Estadio{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Estadio(){
 		$this->con=new DBManager;
 	}

	function Insertar_Estadio($Nombre="",$Ciudad="",$Capacidad=0,$Departamento=""){

            if($this->con->conectar()==true){			
			return mysql_query("insert into estadio values(0,'".$Nombre."','".$Ciudad."',".$Capacidad.",'".$Departamento."','Habilitado')");
		}
	}	
	function Mostrar_Tabla_Estadio(){ 
		if($this->con->conectar()==true){
			return mysql_query("SELECT idestadio as codigo_estadio,nombre,ciudad,capacidad,departamento FROM estadio where observacion='Habilitado' order by idestadio asc");
		}
	}
        
	function Eliminar_Estadio($Id_estadio=0){
		if($this->con->conectar()==true){
			return mysql_query("update estadio set observacion= 'DesHabilitado' WHERE idestadio = ".$Id_estadio);
		}
	}
      
	
        function Modificar_Estadio($ID_estadio=0,$Nombre="",$Ciudad="",$Capacidad=0,$Departamento=""){
		
            if($this->con->conectar()==true){
			
			return mysql_query("update estadio set nombre='".$Nombre."',ciudad='".$Ciudad."',capacidad=".$Capacidad.",departamento='".$Departamento."' where idestadio = ".$ID_estadio);
		}
	}
       function Verificar_nombre($nombre=""){ 
		if($this->con->conectar()==true){
			$result= mysql_query("SELECT * FROM estadio where nombre='".$nombre."' and observacion='Habilitado'");
                        return mysql_num_rows($result);
		}
	}
        
       	
	
}
?>
