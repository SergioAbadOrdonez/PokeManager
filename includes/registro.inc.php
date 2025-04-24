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
        echo "Faltan campos por rellenar.";
        exit();
        }

        if ($edad < 14) {
            echo "Tienes que tener más de 14 años.";
            exit();
        }

        if ($email !== $confirmarEmail) {
            echo "Los correos electrónicos no coinciden.";
            exit();
        }

        if ($password !== $confirmarPassword) {
            echo "Las contraseñas no coinciden.";
            exit();
        }

        if ($edad < 14) {
            echo "Tienes que tener más de 14 años.";
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

        if($edad < 14){
            $_SESSION ["error_registro"] = "Necesitas tener 14 años o más.";
            header("Location: ../index.php");
            exit();
        }
        try {
            require_once "db_connect.inc.php";
            
            $consulta = $pdo->prepare("SELECT email FROM usuarios WHERE email = :email");
            $consulta->bindParam(":email", $email);
            $consulta->execute();
    
            if ($consulta->rowCount() > 0) {
                $pdo = null;
                $consulta = null;
                $_SESSION ["error_registro"] = "Email ya registrado";
                header("Location: ../index.php");
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
            die();
        } catch (PDOException $p) {
            die("Error: {$p->getMessage()}");
        }
    }
?>