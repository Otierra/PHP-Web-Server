<html>

    <head></head>

    <body>
        <?php
            include_once("Contacto.php");
            $contacto = new Contacto();
            $arr = $contacto->listar();
        ?>

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
                <td>
                    <form action="eliminar_contacto.php" method="post">
                        <input type="hidden" value="<?php echo $c->id;?>" name="id">
                        <input type="submit" value="eliminar">
                    </form>

                </td>

                <td>
                    <form action="alta.php" method="post">
                        <input type="hidden" value="<?php echo $c->id;?>" name="id">
                        <input type="hidden" value="<?php echo $c->nombres;?>" name="nombre">
                        <input type="hidden" value="<?php echo $c->telefono;?>" name="telefono">
                        <input type="hidden" value="<?php echo $c->correo;?>" name="correo">
                        <input type="submit" value="modificar">
                    </form>

                </td>

            </tr>
            
            <?php
                    }
                }
            ?>
        

        </table>

        <a href="alta.php">Agregar Contacto</a>

    </body>

</html>