<?php
    require_once "env.php";
    $contraseña = $_ENV["DB_PASSWORD"];
    $con = mysqli_connect("db", "root", $contraseña, "proy_login") or die("No se pudo conectar");
?>