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
            <h1 id="titulo"><a href="./index.php">CINITO</a></h1>

            <div id="users">
                <?php
                    if(isset($_SESSION['username'])){
                ?>
                    <a href="./logout.php" class="btn">Desconectar</a>
                    <a href="./perfil.php" class="btn">Perfil</a>
                <?php
                    }else{
                        echo '<a href="./signup.php" class="btn">Registro</a> <a href="./login.php" class="btn">Login</a>';
                    }
                ?>
                
            </div>
        </header>
        <hr>
        <nav>
            <a href="./index.php">Inicio</a>
            <a href="#">Entradas</a>
            <a href="#">Contacto</a>
        </nav>

        <hr>      
        <div id="content">
            <article>
                <section>
                    <form action="" method="GET">
                    <p><input type="submit" value="Insertar" name="opc"></p>
                    <p><input type="submit" value="Modificar datos" name="opc"></p>
                    <p><input type="submit" value="Eliminar datos" name="opc"></p>
                    <p><input type="submit" value="Mostrar Clientes" name="opc"></p>
                    </form>
                </section>  
            </article>

            <?php
            //Dependiendo de una opción u otra realiza una operación
            if (isset($_GET['opc'])&&$_GET['opc']=="Insertar") {             
            ?>

            <article>
                <section>
                    <p>Insertar</p>
                </section>
            </article>

            <?php
            }
            ?>

            <?php
            //Dependiendo de una opción u otra realiza una operación
            if (isset($_GET['opc'])&&$_GET['opc']=="Modificar datos") {             
            ?>

            <article>
                <section>
                    <p>Modificar</p>
                </section>
            </article>

            <?php
            }
            ?>

            <?php
            //Dependiendo de una opción u otra realiza una operación
            if (isset($_GET['opc'])&&$_GET['opc']=="Eliminar datos") {             
            ?>

            <article>
                <section>
                    <p>Eliminar</p>
                </section>
            </article>

            <?php
            }
            ?>

            <?php
            //Dependiendo de una opción u otra realiza una operación
            if (isset($_GET['opc'])&&$_GET['opc']=="Mostrar Clientes") {             
            ?>

            <article>
                <section>
                    <p>Mostrar</p>
                </section>
            </article>

            <?php
            }
            ?>

            
        </div>
    </div>
    
    <footer>
            <p>Cosas</p>
    </footer>
</body>
</html>