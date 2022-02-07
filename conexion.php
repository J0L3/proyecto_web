<?php
    $servidor = "localhost";
    $usuario = "root";
    $pass = "";
    $nombreBD="tft";

    $conexion = mysqli_connect($servidor,$usuario,$pass) or die("Error de conexión");

    /*  Crear las tablas para la comprobación del ejercicio
        CREATE TABLE usuarios ( id int(2) AUTO_INCREMENT,
                                nombre varchar(255),
                                apellidos varchar(255),
                                edad int(2),
                                direccion varchar(255), 
                                PRIMARY KEY (ID,nombre));
    */  
?>