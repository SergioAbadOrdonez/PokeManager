<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $confirmarEmail = $_POST["confirmarEmail"];
        $password = $_POST["password"];
        $confirmarPassword = $_POST["confirmarPassword"];
        $edad = $_POST["edad"];
        
        if (empty($nombre) || empty($email) || empty($confirmarEmail) || empty($password) || empty($confirmarPassword) || empty($edad)) {
            $_SESSION["error"] = "Faltan campos por rellenar";
            header("Location: ../error.php");
            exit();
        }

        if ($edad < 14) {
            $_SESSION["error"] = "Necesitas tener más de 14 años";
            header("Location: ../error.php");
            exit();
        }

        if ($email !== $confirmarEmail) {
            $_SESSION["error"] = "Los correos electrónicos no coinciden";
            header("Location: ../error.php");
            exit();
        }

        if ($password !== $confirmarPassword) {
            $_SESSION["error"] = "No se ha podido completar el registro";
            header("Location: ../error.php");
            exit();
        }

        if (
            strlen($password) < 8 ||
            !preg_match('/[A-Za-z]/', $password) ||
            !preg_match('/[0-9]/', $password)
        ) {
            $_SESSION["error"] = "La contraseña debe tener al menos 8 caracteres, una letra y un número";
            header("Location: ../error.php");
            exit();
        }

        if (is_uploaded_file($_FILES['fotoPerfil']['tmp_name'])) {
            $directorio = "../img/profiles/";
            $id = time();
            $nombreFichero = $id . "-" . $_FILES['fotoPerfil']['name'];
            move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $directorio . $nombreFichero);
            $rutaFoto = "img/profiles/" . $nombreFichero;
        } else {
            $rutaFoto = "img/profile_placeholder.png";
        }

        try {
            require_once "db_connect.inc.php";
            
            $consulta = $pdo->prepare("SELECT email FROM usuarios WHERE email = :email");
            $consulta->bindParam(":email", $email);
            $consulta->execute();
    
            if ($consulta->rowCount() > 0) {
                $_SESSION["error"] = "Este email ya se está usando";
                header("Location: ../error.php");
                exit();
            }

            $contrasenya = password_hash($password, PASSWORD_BCRYPT);

            $consulta2 = $pdo->prepare("INSERT INTO usuarios (nombre, email, contrasenya, edad, fotoPerfil) 
                VALUES (:nombre, :email, :contrasenya, :edad, :fotoPerfil)");
            $consulta2->bindParam(":nombre", $nombre);
            $consulta2->bindParam(":email", $email);
            $consulta2->bindParam(":contrasenya", $contrasenya);
            $consulta2->bindParam(":edad", $edad);
            $consulta2->bindParam(":fotoPerfil", $rutaFoto);
            $consulta2->execute();
    
            $pdo = null;
            $consulta2 = null;
            header("Location: ../index.php");
            exit();
            
        } catch (PDOException $e) {
            $_SESSION["error"] = "No se ha podido completar el registro";
            header("Location: ../error.php");
            exit();
        }
    }
    header("Location: ../index.php");
    exit();
?>