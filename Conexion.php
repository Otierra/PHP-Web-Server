<?php

    class Conexion {
        function conectar() {
            $host = "php-web-app-server.mysql.database.azure.com";
            $dbname = "agendadb";
            $username = "vgfsiroowd";
            $password = 'VCXW$Yk8cWkpRcW0'; 
            $port = 3306;
            $charset = "utf8";
            $ssl_cert_path = __DIR__ . "/DigiCertGlobalRootCA.crt.pem";

            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
            
            try {
                $pdo = new PDO($dsn, $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_SSL_CA => $ssl_cert_path
                ]);
                return $pdo;
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
    }


?>