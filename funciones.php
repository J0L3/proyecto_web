<?php
    include 'conexion.php';

    //Validar E-mail Registro
    function valid_email($mail){
      GLOBAL $nombreBD, $conexion;
      $verified=true;

      if (false !== filter_var($mail, FILTER_VALIDATE_EMAIL)) { //Comprobamos que el email sea valido
        
        //Selecionamos la base de datos
        mysqli_select_db($conexion,$nombreBD);
        //Comprobamos que el email no este en la base de datos
        $sql = "SELECT email FROM usuarios WHERE email LIKE '$mail' ";

        if (mysqli_num_rows(mysqli_query($conexion,$sql))!=0) {//Si no es igual a 0 el correo ya esta registrado
          $verified = false;
        }

      } else {
        $verified = false;
      }

      return ($verified);
    }

    //validar usuario Registro
    function valid_username($username) {
      
    }

?>