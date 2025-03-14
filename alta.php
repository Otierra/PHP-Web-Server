<html>

    <head></head>

    <body>
        <form action=<?php if ($_POST) { echo "modificar_contacto.php"; }else{ echo "alta-contacto.php";}?> method="post">
            Nombres: <input type="text" name="txtNombres" value= <?php if ($_POST) { echo $_POST["nombre"]; }else{ echo "";}?>>
            Telefono: <input type="text" name="txtTel" value= <?php if ($_POST) { echo $_POST["telefono"]; }else{ echo "";}?>>
            Correo: <input type="text" name="txtCorreo" value= <?php if ($_POST) { echo $_POST["correo"]; }else{ echo "";}?>>
            <input type="hidden" value="<?php echo $_POST["id"];?>" name="id">
            <input type="submit">
        </form>
    </body>

    

</html>


