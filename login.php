<?php
    session_start();
    include './resources/php/funciones_login.php';

    
    if (isset($_COOKIE['MANTENERSESION'])) {
        if ($_COOKIE['MANTENERSESION']){
            if (valid_login($_COOKIE['MANTENERSESION']['username'], $_COOKIE['MANTENERSESION']['pass'])) {
                $_SESSION['username']=$_COOKIE['MANTENERSESION']['username'];
                echo '<script language="javascript">window.location.replace("./index.php");</script>';            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/forms.css">
    <link rel="shortcut icon" href="./resources/img/favicon.ico">
    <title>Login</title>
</head>
<body>
    <div id="container">
        <header>
            <h1 id="titleform">Login</h1>
            <hr>
        </header>
        <?php if (isset($_POST['enviar'])){ echo '<div id="errores"></div>';}//Recuadro con errores?> 
        <div id="cuerpoform">
            
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
                    <label id="sesion">Mantener sesión iniciada:</label><input type="checkbox" name="mantenersesion" id="">
                    
                </p>

                <p>
                    <input type="submit" value="Login" name="enviar" id="btn">
                    <a href="./index.php"><input type="button" value="Cancelar" id="btn"></a>
                </p>

                <p id="createaccount">
                    <label>¿Aún no tienes cuenta? <a href="./signup.php">Click aqui</a></label>
                </p>

            </form>
        </div>
    </div>
</body>
</html>

<?php

    if (isset($_POST['enviar'])){
        if (!empty($_POST['username'])&&!empty($_POST['pass'])){ 

            if (valid_login($_POST['username'],$_POST['pass'])) {

                if(isset($_POST['mantenersesion'])){//Creamos cookie para mantener sesion activa
                    mantener_session($_POST['username'],$_POST['pass']);
                } else {
                    hasta_cerrar_navegador();
                }
                $_SESSION['username'] = $_POST['username'];

                echo '<script language="javascript">window.location.replace("./index.php");</script>';

            }else{
                echo '<script language="javascript">errores.innerHTML = "El usuario o la contraseña no es válido";</script>';
            }

        } else {
            echo '<script language="javascript">errores.innerHTML = "El usuario o la contraseña no es válido";</script>';
        }
    }
?>