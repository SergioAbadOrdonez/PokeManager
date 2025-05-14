<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = $_POST["nombre"];
    $contrasenya = $_POST["password"];

    if (empty($nombre) || empty($contrasenya)) {
        $_SESSION["error_login"] = "Faltan campos por rellenar.";
        header("Location: ../index.php");
        exit();
    }

    try {
        require_once "db_connect.inc.php";
        $consulta = $pdo->prepare("SELECT id, contrasenya FROM usuarios WHERE nombre = :nombre");
        $consulta->bindParam(":nombre", $nombre);
        $consulta->execute();

        if ($consulta->rowCount() == 0) {
            $_SESSION["error_login"] = "Nombre no registrado";
            header("Location: ../index.php");
            exit();
        }

        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($contrasenya, $usuario["contrasenya"])) {
            $_SESSION["error_login"] = "Contraseña incorrecta.";
            header("Location: ../index.php");
            exit();
        }

        $_SESSION["token"] = $usuario["id"];
        header("Location: ../perfil.php");
        exit();

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
header("Location: ../index.php");
?>