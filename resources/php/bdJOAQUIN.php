<?php
include "conexion.php";

//Crear BD
$crearBD="CREATE DATABASE IF NOT EXISTS $nombreBD";
mysqli_query($conexion,$crearBD);

//Selecionamos BD
mysqli_select_db($conexion,$nombreBD);

//Crear tabla clientes
$crearTabla="CREATE TABLE IF NOT EXISTS clientes ( id_cliente int(20) AUTO_INCREMENT,
                        usuario varchar(10) NOT NULL,
                        pass varchar(60) NOT NULL,
                        email varchar(255) NOT NULL,
                        fecha varchar(255)NOT NULL,
                        administracion boolean(1)NOT NULL, 
                        PRIMARY KEY (id_cliente,username),
                        UNIQUE (email));";

mysqli_query($conexion,$crearTabla);


?>