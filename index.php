<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="shortcut icon" href="./resources/img/favicon.ico">
    <title>Cinito</title>
</head>
<body>
    <div id="container">
        <header>
            <h1 id="titulo"><a href="./index.php">Cinito</a></h1>

            <div id="users">
                <?php
                    if(isset($_SESSION['username'])){
                ?>
                    <a href="./logout.php" class="btn">Desconectar</a>
                    <a href="./perfil.php" class="btn">Perfil</a>
                <?php
                    }else{
                        echo '<a href="./signup.php" class="btn">Registrarse</a> <a href="./login.php" class="btn">Iniciar Sesión</a>';
                    }
                ?>
                
            </div>
        </header>
        <hr>
        <nav>
            <a href="./index.php">Inicio</a>
            <a href="#">Cartelera</a>
            <a href="#">Contacto</a>
        </nav>

        <hr>      
        <div id="content">
            <article>
                <section>
                    <p><img id="img_promocion" src="./resources/img/intro.png"></p>
                </section>  
            </article>
        </div>
    </div>
    
    <footer>
            <p>Politicas y demás</p>
    </footer>
</body>
</html>