<?php
    $nombres = $_POST["txtNombres"];
    $tel = $_POST["txtTel"];
    $correo = $_POST["txtCorreo"];
    $id = $_POST["id"];

    include_once("Contacto.php");

    $contacto = new Contacto();
    $contacto -> nombres = $nombres;
    $contacto -> telefono = $tel;
    $contacto -> correo = $correo;
    $contacto -> id = $id;

    if($contacto -> modificar() > 0){
        echo "Contacto modificado";
    }else{
        echo "Error";
    }
    
?>

<a href="lista-contacto.php">Ver Contactos</a>