<?php
    session_start();
    include 'funciones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="" href="resources/css/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div id="container">
        <div id="cuerpoform">
            <h3 id="titleform">Sign Up</h3>
            <hr>
            <form action="" method="POST">
                <p>
                    <label><span class="errorEmail">* </span>E-mail:</label>
                    <input type="text" name="email" value="<?php if (isset($_POST['email'])){ echo $_POST['email'];}?>" placeholder="Tuemail@dominio.com">
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
                    <input type="submit" value="Enviar" name="enviar" id="btn">
                    <a href="./index.php"><input type="button" value="Cancelar" id="btn"></a>
                </p>
            </form>
        </div>
        <p id="errores"></p>
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
                header('Location: index.php');
            }
            
        } else { 
            echo '<script language="javascript">errores.innerHTML = "Rellena todos los campos";</script>';
        }
    }
?>