<?php
session_start();

$_SESSION = array();

session_destroy();

if (isset($_COOKIE["usuario"])) {
    setcookie("usuario", "", time() - 3600, "/");
}
if (isset($_COOKIE["tipoUser"])) {
    setcookie("tipoUser", "", time() - 3600, "/");
}

header("Location: login.php");
exit();
