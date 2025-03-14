<?php
    session_start();

    if (!isset($_SESSION["usuario"])) {
        header("Location: login.php");
        exit();
    }
            
    $usuarioActivo = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : (isset($_COOKIE["usuario"]) ? $_COOKIE["usuario"] : "");
    $tipoUsuario = isset($_SESSION["tipoUser"]) ? $_SESSION["tipoUser"] : (isset($_COOKIE["tipoUser"]) ? $_COOKIE["tipoUser"] : "");            

    include_once("Contacto.php");
    $contacto = new Contacto();
    $arr = $contacto->listar();
?>

<html>

    <head></head>

    <body>
        

        <h2>Usuario Activo: <?php echo htmlspecialchars($usuarioActivo); ?></h2>
        <table>
            <tr>
                <th>Id</th> <th>Nombre</th> <th>Correo</th> <th>Telefono</th> <th>Operaciones</th>
            </tr>

            <?php
                if (!empty($arr)) { 
                    foreach($arr as $c){
            ?>

            <tr>
                <td><?php echo $c->id;?></td>
                <td><?php echo $c->nombres;?></td>
                <td><?php echo $c->correo;?></td>
                <td><?php echo $c->telefono;?></td>

                <?php if ($tipoUsuario == "1") { ?>
                        <td>
                            <form action="eliminar_contacto.php" method="post">
                                <input type="hidden" value="<?php echo $c->id; ?>" name="id">
                                <input type="submit" value="Eliminar">
                            </form>
                        </td>
                        <td>
                            <form action="alta.php" method="post">
                                <input type="hidden" value="<?php echo $c->id; ?>" name="id">
                                <input type="hidden" value="<?php echo $c->nombres; ?>" name="nombre">
                                <input type="hidden" value="<?php echo $c->telefono; ?>" name="telefono">
                                <input type="hidden" value="<?php echo $c->correo; ?>" name="correo">
                                <input type="submit" value="Modificar">
                            </form>
                        </td>
                <?php } ?>

            </tr>
            
            <?php
                    }
                }
            ?>
        

        </table>

        <a href="alta.php">Agregar Contacto</a>

    </body>

</html>