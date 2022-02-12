<?php
    session_start();
    include './resources/php/funciones_login.php';

    
    if (isset($_COOKIE['MANTENERSESION'])) {
        if (valid_login($_COOKIE['MANTENERSESION']['username'], $_COOKIE['MANTENERSESION']['pass'])) {
            $_SESSION['username']=$_COOKIE['MANTENERSESION']['username'];
            header('Location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Inicio</title>
</head>
<body>
    <div id="container">
        <div id="cuerpoform">
            <h3 id="titleform">Login</h3>
            <hr>
            <form action="" method="POST">
                <p>
                    <label>Usuario:</label>
                    <input type="text" name="username" value="">
                </p>

                <p>
                    <label>Contraseña:</label>
                    <input type="password" name="pass" id="">
                </p>

                <p>
                    <label>Mantener sesion iniciada</label>
                    <input type="checkbox" name="mantenersesion" id="">
                </p>

                <p>
                    <input type="submit" value="Login" name="enviar" id="btn">
                    <a href="./index.php"><input type="button" value="Cancelar" id="btn"></a>
                </p>
                <p class="createaccount">¿Aún no tienes cuenta? <a href="./signup.php">Click aqui</a></p>
            </form>
        </div>
        <div id="errores"></div>
    </div>
</body>
</html>

<?php

    if (isset($_POST['enviar'])){
        if (!empty($_POST['username'])&&!empty($_POST['pass'])){ 

            if (valid_login($_POST['username'],$_POST['pass'])) {

                if(isset($_POST['mantenersesion'])){//Creamos cookie para mantener sesion activa
                    mantener_session($_POST['username'],$_POST['pass']);
                }
                $_SESSION['username'] = $_POST['username'];
                header('Location: index.php');

            }else{
                echo '<script language="javascript">errores.innerHTML = "El usuario o la contraseña no es válido";</script>';
            }

        } else {
            echo '<script language="javascript">errores.innerHTML = "El usuario o la contraseña no es válido";</script>';
        }
    }
?>