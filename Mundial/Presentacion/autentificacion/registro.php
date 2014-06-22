<?php
include'../../Negocio/Negocio_Usuario.php';
$Objeto_Usuario=new Negocio_Usuario();
if (!$Objeto_Usuario->Insertar_Usuario($_POST['usuario'], $_POST['clave'],$_POST['clave2'])){
    echo"<script>
            history.back(); 
         </script>";
}
?>
