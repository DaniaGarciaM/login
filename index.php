<?php
session_start();

include "php/config.php";

if (isset($_POST['submit'])) {
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
    $contrasenia = mysqli_real_escape_string($con, $_POST['contrasenia']);

    $consulta = mysqli_query($con, "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasenia='$contrasenia'") or die("Error en query");
    $respuesta = mysqli_fetch_assoc($consulta);

    if (is_array($respuesta) && !empty($respuesta)) {
        $_SESSION['usuario'] = $respuesta['usuario'];
        $_SESSION['email'] = $respuesta['email'];
        $_SESSION['usuario_id'] = $respuesta['usuario_id'];

        // Redirigir si el inicio de sesión es exitoso
        header("Location: home.php");
        exit(); // Detener la ejecución del script después de la redirección
    } else {
        echo "
            <div class='message'>
            <p>Usuario or Contraseña incorrectos</p>
            </div><br>
        ";
        echo "<a href='index.php'><button class='btn'>Volver</button></a>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" required>
                </div>
                <div class="field input">
                    <label for="contrasenia">Contraseña</label>
                    <input type="password" name="contrasenia" id="contrasenia" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login">
                </div>
                <div class="link">
                    ¿No tengo una cuenta? <a href="#">Crear ahora</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
