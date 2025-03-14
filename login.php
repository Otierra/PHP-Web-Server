<?php
session_start();
include_once("Conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $passw = $_POST["passw"];
    
    $con = new Conexion();
    $conn = $con->conectar();

    $query = "SELECT * FROM tbLogin WHERE user = :user";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":user", $user);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        if ($passw == $usuario["password"]) {
            $_SESSION["usuario"] = $usuario["user"];
            $_SESSION["tipoUser"] = $usuario["tipoUser"];
            
            // Establecer cookies por 7 días
            setcookie("usuario", $usuario["user"], time() + (7 * 24 * 60 * 60), "/");
            setcookie("tipoUser", $usuario["tipoUser"], time() + (7 * 24 * 60 * 60), "/");
            
            header("Location: lista-contactos.php");
            exit();
        } else {
            $error = "Usuario o contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form action="" method="POST"> 
        Usuario: <input type="text" name="user" required value="<?php echo isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : ''; ?>"><br>
        Contraseña: <input type="password" name="passw" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
