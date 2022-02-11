<?php
    session_start();
    include 'funciones.php'
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
                    <input type="checkbox" name="sesion" id="">
                </p>

                <p>
                    <input type="submit" value="Login" name="enviar" id="btn">
                    <a href="./index.php"><input type="button" value="Cancelar" id="btn"></a>
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
                echo 'ok';
            }

        }
    }
?>