<?php
    error_reporting(E_ALL);

    class Contacto{
        var $id;
        var $nombres;
        var $telefono;
        var $correo;

        function alta(){
            include_once("Conexion.php");
            $con = new Conexion();
            $conn = $con -> conectar();
            $query = "INSERT INTO contacto (nombre, telefono, correo) VALUES ('$this->nombres', '$this->telefono', '$this->correo')";
            $stmt = $conn -> prepare($query);
            return $stmt -> execute();
        }

        function listar(){
            include_once("Conexion.php");
            $con = new Conexion();
            $conn = $con -> conectar();
            $query = "SELECT * FROM contacto";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            $todos = []; 
            while ($data = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                $contacto = new Contacto();
                $contacto -> id = $data["id"];
                $contacto -> nombres = $data["nombre"];
                $contacto -> correo = $data["correo"];
                $contacto -> telefono = $data["telefono"];
                $todos[] = $contacto;
            }

            return $todos;
        }

        function eliminar(){
            include_once("Conexion.php");
            $con = new Conexion();
            $conn = $con -> conectar();
            $query = "DELETE FROM contacto WHERE id = '$this->id'";
            $stmt = $conn -> prepare($query);
            return $stmt -> execute();
        }

        function modificar(){
            include_once("Conexion.php");
            $con = new Conexion();
            $conn = $con -> conectar();
            $query = "UPDATE contacto SET nombre = '$this->nombres', correo = '$this->correo', telefono = '$this->telefono' WHERE id = '$this->id'";
            $stmt = $conn -> prepare($query);
            return $stmt -> execute();
        }

    }
?>