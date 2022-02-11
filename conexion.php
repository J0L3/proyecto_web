<?php
    $servidor = "localhost";
    $usuario = "root";
    $pass = "";
    $nombreBD="bd1";

    $conexion = mysqli_connect($servidor,$usuario,$pass) or die("Error de conexión");

    /*  Crear las tablas para la comprobación del ejercicio
        CREATE TABLE usuarios ( id int(2) AUTO_INCREMENT,
                                username varchar(10) NOT NULL,
                                pass varchar(40) NOT NULL,
                                email varchar(255) NOT NULL,
                                fecha varchar(255)NOT NULL, 
                                PRIMARY KEY (ID));
    */  

    //INSERT INTO usuarios VALUES(0,'usuario',SHA('contraseña'),'email','fecha');
?>