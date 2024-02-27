<?php
session_start();
include "php/config.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
}

$id = $_SESSION['usuario_id'];
$query = mysqli_query($con, "SELECT*FROM usuarios WHERE usuario_id=$id");

while ($result = mysqli_fetch_assoc($query)) {
    $res_usuario = $result['usuario'];
    $res_email = $result['email'];
    $res_id = $result['usuario_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Home</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p>Garmon</p>
        </div>

        <div class="right-links">
            <a href="php/logout.php">
                <button class="btn">Log Out</button>
            </a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hola <b><?php echo $res_usuario ?></b>, Bienvenido </p>
                </div>
                <div class="box">
                    <p>Tu corrreo es <b><?php echo $res_email ?></b>.</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>