<?php
    include 'conexion.php';

    //Validar E-mail Registro
    function valid_email($mail){
      GLOBAL $nombreBD, $conexion;
      $verified = false;

      if(false !== filter_var($mail, FILTER_VALIDATE_EMAIL)){ //Comprobamos que el email sea valido
        
        //Selecionamos la base de datos
        mysqli_select_db($conexion,$nombreBD);
        //Comprobamos que el email no este en la base de datos
        $sql = "SELECT email FROM usuarios WHERE email LIKE '$mail' ";

        if (mysqli_num_rows(mysqli_query($conexion,$sql))==0) {//Si no es igual a 0 el correo ya esta registrado
          $verified=true;
        }
      }else{
        echo "email no valido";
      }

      return $verified;
    }

    //Validar edad >18años
    function valid_age($fechaN) {
      $verified=false;
      $today= date("Y-m-d"); //Fecha de hoy
      $nuevaFecha = date ('Y-m-d', strtotime ('+18 year' , strtotime($fechaN))); //Sumamos al nacimiento 18 años

      if($today >= $nuevaFecha){//Si el dia de hoy es mayor que la nueva fecha tiene +18años
        $verified=true;
      }

      return $verified;
    }

    //validar usuario Registro
    function valid_username($username){
      GLOBAL $nombreBD, $conexion;
      $verified = false;
      $permitidos="/^[a-zA-Z0-9]+$/";//Metacaracteres validos

      //Comprobra longitud del nombre de usuario
      if(strlen($username)>=4 && strlen($username)<=10){

        //Comprobar los caracteres permitidos
        if(preg_match($permitidos, $username)){
            
            //Selecionamos la base de datos
            mysqli_select_db($conexion,$nombreBD);
            //Comprobamos que el usuario no este en la base de datos
            $sql = "SELECT username FROM usuarios WHERE username LIKE '$username' ";

            if (mysqli_num_rows(mysqli_query($conexion,$sql))==0) {//Comprobar si el usuario esta en uso
              $verified=true;
            }

        }else{
          echo "Caracteres invalidos";
        }

      } else {
        echo "Longitud del usuario entre 4 y 10 caracteres";
      }
      return $verified;
    }

    //Comprobar que las contraseña sea valida
    function valid_pass($pass,$passver){
      $verified=false;
      //Entre 8  y 18 caracteres
      if (strlen($pass)>=8 && strlen($pass)<=18){
        //Comprobamos que las contraseñas sean iguales
        if($pass==$passver){
          $verified=true;
        }   
      }else{
        echo 'Contraseña entre 8 y 18 caracteres';
      }
      
      return $verified;
    }

    //Registrar usuario
    function registrar($username,$pass,$mail,$fecha){
      GLOBAL $nombreBD, $conexion;
      //Selecionamos la base de datos
      mysqli_select_db($conexion,$nombreBD);
      //Encriptamos contraseña
      $pass=password_hash($pass, PASSWORD_DEFAULT, ['cost' => 15]);
      //Insertamos el usuario
      $sql="INSERT INTO usuarios VALUES(0,'$username','$pass','$mail','$fecha');";

      return mysqli_query($conexion,$sql);
    }

    //Verificar login
    function valid_login($username,$pass){
      GLOBAL $nombreBD, $conexion;
      $verified=false;
      //Selecionamos la base de datos
      mysqli_select_db($conexion,$nombreBD);
      //Comprobamos que el usuario este en la base de datos
      $sql = "SELECT username FROM usuarios WHERE username LIKE '$username' ";

      if (mysqli_num_rows(mysqli_query($conexion,$sql))==1) {//Comprobar si el usuario esta en uso

        $sql = "SELECT pass FROM usuarios WHERE username LIKE '$username' ";
        $sql = mysqli_query($conexion,$sql);

        //Recogemos el hash de la BD
        while ($row = mysqli_fetch_row($sql)){ 
          $hash = $row[0];
        }
        
        //Verificamos la contraseña
        if (password_verify($pass, $hash)){
          $verified=true;
        }
      }

      return $verified;
    }

?>