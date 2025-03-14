<?php
    include_once("Contacto.php");
    $contacto = new Contacto();
    $contacto->id=$_POST["id"];

    if($contacto->eliminar()>0){
        echo "Contacto Eliminado";
    }else{
        echo "Error";
    }

?>

<a href="lista-contacto.php">Ver Contactos</a>