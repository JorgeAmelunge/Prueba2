<?php
class Negocio_Usuario{
var $objD_Gestionar_Usuario;

	function Negocio_Usuario(){
            
		require('../../Datos/D_Usuario.php');
             
		$this->objD_Gestionar_Usuario=new Datos_Usuario();
	}

  
  
   
 function Insertar_Usuario($User="",$Clave="",$Clave2=""){
    if($User=="")
            echo "<script>alert('Inserte un Usuario!!');	
            location.href='Usuario_Admin.php';
            </script>";
    else{	

        if($Clave!=""){
            if($Clave==$Clave2){
                 $Usuario=$this->objD_Gestionar_Usuario->Existe_Usuario($User, $Clave);
                 $Usuario= mysql_num_rows($Usuario);
                 if($Usuario!=0){
                    if ( $this->objD_Gestionar_Usuario->Insertar_Usuarios($User,$Clave) == true){ 
                    echo "<script>window.location.href=\"../Presentacion/Principales/Partidos.php\";alert('Insercion Realizada con Exito!!');          
                    </script>";
                    }
                    return true;
                }else{
                    echo "<script>alert('Ese nombre de usuario, ya esta siendo usado.');          
                    </script>";
                }
            }else{
                echo "<script>alert('Los passwords no coinciden');          
                    </script>";
            }
        }	
        else{
            echo "<script>alert('Inserte una Contraseña!!');
            </script>";
        }

            }						
  }
  
    

  
  function Tabla_Usuario(){
  
  return $consulta=$this->objD_Gestionar_Usuario->Mostrar_Tabla_usuarios();
 
	
  }  
  
  function Modificar_Usuario($ID_Empresa=0,$User="",$Clave=""){
	
		
                        if($User=="")
                                echo "<script>alert('Inserte un Usuario!!');	
                                location.href='Usuario_Admin.php';
                                </script>";
                        else{	
                            if($Clave=="")
                                "<script>alert('Inserte una Contraseña!!');	
                                location.href='Usuario_Admin.php';
                                </script>";
                            else{
                           
                              
                                    if ( $this->objD_Gestionar_Usuario->Modificar_usuario($ID_Empresa,$User,$Clave) == true){ 

                                    echo "<script>alert('Modificacion Realizada con Exito!!');
                                    location.href='Usuario_Admin.php';
                                    </script>";
                                    }
                            }	
                           
                            }
                                }

			
				
  }
  
  
  

?>

