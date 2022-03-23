<?php
    session_start();
    include './resources/php/funciones_signup.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/forms.css">
    <link rel="shortcut icon" href="./resources/img/favicon.ico">
    <title>Sign Up</title>
</head>
<body>
    <div id="container">
        <header>
            <h1 id="titleform">Registrarse</h1>
            <hr>
        </header>

        <?php if (isset($_POST['enviar'])){ echo '<div id="errores"></div>';}//Recuadro con errores?> 

        <div id="cuerpoform">
            
            <form action="" method="POST">
                <p>
                    <label><span class="errorEmail">* </span>E-mail:</label>
                    <input type="text" name="email" value="<?php if (isset($_POST['email'])){ echo $_POST['email'];}?>">
                </p>

                <p>
                    <label><span id="errorFecha">* </span>Fecha de nacimiento:</label>
                    <input type="date" name="fechaNacimiento" value="<?php if (isset($_POST['fechaNacimiento'])){echo $_POST['fechaNacimiento'];} ?>">
                </p>

                <p>
                    <label><span id="errorUsuario">* </span>Usuario:</label>
                    <input type="text" name="username" value="<?php if (isset($_POST['username'])){ echo $_POST['username'];} ?>">
                </p>

                <p>
                    <label><span id="errorPass">* </span>Contraseña:</label>
                    <input type="password" name="pass" id="">
                </p>

                <p>
                    <label><span id="errorPass">* </span>Confirmar contraseña:</label>
                    <input type="password" name="passver" id="">
                </p>    

                <p>
                    <input type="submit" value="Registrar" name="enviar" id="btn">
                    <a href="./index.php"><input type="button" value="Ir al Inicio" id="btn"></a>
                </p>
                <p id="createaccount">
                    <label>¿Ya tienes cuenta? <a href="./login.php">Click aqui</a></label>
                </p>
            </form>
        </div>

    </div>
</body>
</html>

<?php
    if (isset($_POST['enviar'])){
        if (!empty($_POST['email'])&&!empty($_POST['fechaNacimiento'])&&!empty($_POST['username'])&&!empty($_POST['pass'])&&!empty($_POST['passver'])){ 

            $i=0; //Verificar que se comprobo todo correctamente
            if (valid_email($_POST['email'])) {
                $i++;  
            }

            if (valid_username($_POST['username'])){
                $i++;
            }

            if (valid_age($_POST['fechaNacimiento'])){
                $i++;
            } 

            if(valid_pass($_POST['pass'],$_POST['passver'])){ 
                $i++;
            }

            if($i==4){ 
                registrar($_POST['username'],$_POST['pass'],$_POST['email'],$_POST['fechaNacimiento']);

                echo '<script language="javascript">window.location.replace("./index.php");</script>';            }
            
        } else { 
            echo '<script language="javascript">errores.innerHTML = "Rellene todos los campos";</script>';
        }
    }
?>