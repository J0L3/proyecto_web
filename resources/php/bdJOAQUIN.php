<?php
include "conexion.php";

//Crear BD
$crearBD="CREATE DATABASE IF NOT EXISTS $nombreBD";
mysqli_query($conexion,$crearBD);

//Selecionamos BD
mysqli_select_db($conexion,$nombreBD);

//Crear tabla clientes
$crearTabla="CREATE TABLE `bd1`.`clientes` ( `id_cliente` INT(20) NOT NULL , 
`usuario` VARCHAR(10) NOT NULL , 
`pass` VARCHAR(60) NOT NULL , 
`email` VARCHAR(255) NOT NULL ,
`fecha` VARCHAR(255) NOT NULL , 
`administrador` BOOLEAN DEFAULT FALSE , 
PRIMARY KEY (`id_cliente`, `usuario`), UNIQUE (`email`)) 
ENGINE = InnoDB;";

mysqli_query($conexion,$crearTabla);


?>