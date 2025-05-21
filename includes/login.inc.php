<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = $_POST["nombre"];
    $contrasenya = $_POST["password"];

    if (empty($nombre) || empty($contrasenya)) {
        $_SESSION["error"] = "Faltan campos por rellenar.";
        header("Location: ../error.php");
        exit();
    }

    try {
        require_once "db_connect.inc.php";
        $consulta = $pdo->prepare("SELECT id, contrasenya,nombre,fotoPerfil FROM usuarios WHERE nombre = :nombre");
        $consulta->bindParam(":nombre", $nombre);
        $consulta->execute();

        if ($consulta->rowCount() == 0) {
            $_SESSION["error"] = "Datos de inicio de sesión incorrectos";
            header("Location: ../error.php");
            exit();
        }

        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($contrasenya, $usuario["contrasenya"])) {
            $_SESSION["error"] = "Datos de inicio de sesión incorrectos";
            header("Location: ../error.php");
            exit();
        }

        $_SESSION["username"] = $usuario["nombre"];
        $_SESSION["avatar"] = $usuario["fotoPerfil"];
        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        $_SESSION["error"] = "Error en el servidor: " . $e->getMessage();
        header("Location: ../error.php");
        exit();
    }
}
header("Location: ../index.php");
?>