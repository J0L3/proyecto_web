<?php
    $servidor = "localhost";
    $usuario = "root";
    $pass = "";
    $nombreBD="bd1";

    $conexion = mysqli_connect($servidor,$usuario,$pass) or die("Error de conexión");

    /*  Crear las tablas para la comprobación
        CREATE TABLE usuarios ( id int(20) AUTO_INCREMENT,
                                username varchar(10) NOT NULL,
                                pass varchar(60) NOT NULL,
                                email varchar(255) NOT NULL,
                                fecha varchar(255)NOT NULL, 
                                PRIMARY KEY (id),
                                UNIQUE (username,email));
    */  
?>