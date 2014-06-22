<?php

/*
 * To change this template, choose Tools | Templates
 * and oPEn the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_A_Series{
 //constructor	
 	var $con;
 	function Datos_Gestionar_A_Series(){
 		$this->con=new DBManager;
 	}

	function Insertar_A_Serie($Codigo_Serie=0,$Codigo_Equipo=0,$Bonificacion=0){
   
            if($this->con->conectar()==true){			
			return mysql_query("insert into serieequipo values(".$Codigo_Serie.",".$Codigo_Equipo.",0,".$Bonificacion.",0,0,0,0,0,0)");
		}
	}
        function Insertar_A_Serie_Vinculo($Codigo_Serie=0,$Codigo_Equipo=0,$PJ=0,$PTS=0,$PG=0,$PP=0,$PE=0,$GF=0,$GC=0,$Codigo_Vinculo=0){

            if($this->con->conectar()==true){			
			return mysql_query("insert into serieequipo values(".$Codigo_Serie.",".$Codigo_Equipo.",".$PJ.",".$PTS.",".$PG.",".$PP.",".$PE.",".$GF.",".$GC.",".$Codigo_Vinculo.")");
		}
	}
	function Mostrar_Tabla_A_Serie($Codigo_Serie=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select serie.idserie as codigo_serie,serie.nombre as Nserie,equipo.nombre as Nequipo,equipo.idequipo as codigo_equipo,torneo.nombre as Ntorneo,torneo.idtorneo as codigo_torneo,serieequipo.PTS from serie,equipo,serieequipo,torneo where serieequipo.idserie=".$Codigo_Serie." and serie.idserie=serieequipo.idserie  and equipo.idequipo=serieequipo.idequipo and torneo.idtorneo=serie.idtorneo");
		}
	}
        
       
        
	function Eliminar_A_Serie($Id_serie=0,$Id_Equipo=0){
		if($this->con->conectar()==true){
			return mysql_query("delete from serieequipo where idserie = ".$Id_serie." and idequipo=".$Id_Equipo);
		}
	}
      
	function Asignar_puntaje_ganador($Codigo_Torneo=0,$Codigo_Equipo=0,$GF=0,$GC=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update serieequipo,torneo,serie set serieequipo.pj=serieequipo.pj+1, serieequipo.PG=serieequipo.PG+1,serieequipo.GF=serieequipo.GF+".$GF.",serieequipo.GC=serieequipo.GC+".$GC." where torneo.idtorneo=".$Codigo_Torneo." and serie.idtorneo=torneo.idtorneo and serieequipo.idserie=serie.idserie and serieequipo.idequipo=".$Codigo_Equipo);
		}
	}
     
       function Asignar_puntaje_PErdedor($Codigo_Torneo=0,$Codigo_Equipo=0,$GF=0,$GC=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update serieequipo,torneo,serie set serieequipo.pj=serieequipo.pj+1, serieequipo.PP=serieequipo.PP+1,serieequipo.GF=serieequipo.GF+".$GF.",serieequipo.GC=serieequipo.GC+".$GC." where torneo.idtorneo=".$Codigo_Torneo." and serie.idtorneo=torneo.idtorneo and serieequipo.idserie=serie.idserie and serieequipo.idequipo=".$Codigo_Equipo);
		}
	}
        
       function Asignar_puntaje_empate($Codigo_Torneo=0,$Codigo_Equipo=0,$GF=0,$GC=0){ 
		if($this->con->conectar()==true){
			return mysql_query("update serieequipo,torneo,serie set serieequipo.pj=serieequipo.pj+1, serieequipo.PE=serieequipo.PE+1,serieequipo.GF=serieequipo.GF+".$GF.",serieequipo.GC=serieequipo.GC+".$GC." where torneo.idtorneo=".$Codigo_Torneo." and serie.idtorneo=torneo.idtorneo and serieequipo.idserie=serie.idserie and serieequipo.idequipo=".$Codigo_Equipo);
		}
	}  
       	
	function mostrar_tabla_torneo($Codigo_Torneo=0,$codigo_Serie=0){
          
		if($this->con->conectar()==true){
			return mysql_query("select equipo.idequipo as codigo_equipo,equipo.nombre,serieequipo.PG,serieequipo.PE,serieequipo.PP,serieequipo.GF,serieequipo.GC,((serieequipo.PG*3)+serieequipo.PE)+serieequipo.PTS as PTS, if((serieequipo.GF)<(serieequipo.GC),-((serieequipo.GC)-(serieequipo.GF)),(serieequipo.GF)-(serieequipo.GC)) as DIF,(serieequipo.PG+serieequipo.PE+serieequipo.PP) as PJ,serieequipo.vinculo,torneo.comentario,serieequipo.PTS as Bonificacion from serieequipo,torneo,serie,equipo where torneo.idtorneo=".$Codigo_Torneo." and serie.idtorneo=torneo.idtorneo and serieequipo.idserie=serie.idserie and serie.idserie=".$codigo_Serie." and equipo.idequipo=serieequipo.idequipo  and equipo.idequipo!=33 and equipo.idequipo!=34 order by PTS desc,dif desc,GF desc,GC desc;");
		}
	}
        function mostrar_tabla_torneo_vinculado($codigo_Serie=0,$Codigo_Equipo=0){
           
		if($this->con->conectar()==true){
			return mysql_query("select equipo.idequipo as codigo_equipo,equipo.nombre,serieequipo.PG,serieequipo.PE,
serieequipo.PP,serieequipo.GF,
serieequipo.GC,((serieequipo.PG*3)+serieequipo.PE)+serieequipo.PTS as PTS,
if((serieequipo.GF)<(serieequipo.GC),-((serieequipo.GC)-(serieequipo.GF)),(serieequipo.GF)-(serieequipo.GC)) as DIF,
(serieequipo.PG+serieequipo.PE+serieequipo.PP) as PJ,serieequipo.vinculo,serieequipo.PTS as Bonificacion
from serieequipo,equipo where   serieequipo.idserie=".$codigo_Serie." and serieequipo.idequipo=".$Codigo_Equipo."
 and equipo.idequipo=serieequipo.idequipo  and equipo.idequipo!=33 and equipo.idequipo!=34 order by PTS desc,dif desc,GF desc,GC desc;");
		}
	}
        function mostrar_tabla_torneo_vinculo($Codigo_Torneo=0,$codigo_Serie=0,$vinculo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select equipo.idequipo as codigo_equipo,equipo.nombre,serieequipo.PG+(select serieequipo.PG from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo) as PG,
serieequipo.PE+(select serieequipo.PE from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo) as PE,
serieequipo.PP+(select serieequipo.PP from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo) as PP,
serieequipo.GF+(select serieequipo.GF from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo) as GF,
serieequipo.GC+(select serieequipo.GC from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo) as GC,
((serieequipo.PG*3)+serieequipo.PE)+(select ((serieequipo.PG*3)+serieequipo.PE) from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo) as PTS,
if((serieequipo.GF+(select serieequipo.GF from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo))<(serieequipo.GC+(select serieequipo.GC from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo)),
-((serieequipo.GC+(select serieequipo.GC from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo))
-(serieequipo.GF+(select serieequipo.GF from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo))),
(serieequipo.GF+(select serieequipo.GF from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo))-
(serieequipo.GC+(select serieequipo.GC from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo))) as DIF,
(serieequipo.PG+serieequipo.PE+serieequipo.PP)+(select (serieequipo.PG+serieequipo.PE+serieequipo.PP) as pj from serieequipo where serieequipo.idserie=".$vinculo." and serieequipo.idequipo=equipo.idequipo) as PJ from serieequipo,torneo,serie,equipo where
torneo.idtorneo=".$Codigo_Torneo." and serie.idtorneo=torneo.idtorneo and serieequipo.idserie=serie.idserie
and serie.idserie=".$codigo_Serie." and equipo.idequipo=serieequipo.idequipo order by PTS desc,DIF desc,GF asc;
");
		}
	}
        
        /*function mostrar_tabla_torneo_goleadores($Codigo_Torneo=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select count(partidosobservacion.codigo_alineacion) as goles,alineacion.nombre as jugador, equipo.nombre as equipo,equipo.codigo_equipo,sum(partidos_observaciones.minuto)as minuto from partidos_observaciones,alineacion,equipo,serieequipo,serie where (partidos_observaciones.codigo_observacion=3 or partidos_observaciones.codigo_observacion=6) and alineacion.codigo_alineacion=partidos_observaciones.codigo_alineacion and equipo.codigo_equipo=alineacion.codigo_equipo and serieequipo.codigo_equipo=equipo.codigo_equipo and serie.codigo_serie=serieequipo.codigo_serie and serie.codigo_torneo=".$Codigo_Torneo." group by alineacion.codigo_alineacion order by goles desc,minuto;");
		}
	}*/
     
}
?>
