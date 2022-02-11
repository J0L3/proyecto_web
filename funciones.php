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
    function valid_username($username){
      $permitidos="/^[a-zA-Z0-9]+$/";

      //Comprobra longitud del nombre de usuario
      if (strlen($username)>=4 && strlen($username)<=10){

        //Comprobar los caracteres del usuario
        if (preg_match($permitidos, $username)){
          echo "El nombre de usuario es correcto";
        }else{
          echo "Caracteres invalidos";
        }

      } else {
        echo "Longitud del usuario entre 4 y 10 caracteres";
      }
    }

    //Comprobar que las contraseña sea valida
    function valid_pass($pass,$passver){
      //Entre 8  y 18 caracteres
    }

    //Registrar usuario
    function registrar($username,$pass,$mail,$fecha){
      GLOBAL $nombreBD, $conexion;
      //Selecionamos la base de datos
      mysqli_select_db($conexion,$nombreBD);
      //Insertamos el usuario
      $sql="INSERT INTO usuarios VALUES(0,'$username',SHA('$pass'),'$mail','$fecha');";

      return mysqli_query($conexion,$sql);
    }

?>