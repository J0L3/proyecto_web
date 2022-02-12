<?php
  include 'conexion.php';
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

  //Funciones mantener sesion activa por un mes
  function mantener_session($username,$pass){
    //Creamos la cookie con tiempo definido
    setcookie("MANTENERSESION", TRUE, time()+2629800);
    //Guardamos el usuario
    setcookie("MANTENERSESION[username]", $username, time()+2629800);
    //Guardamos la contraseña
    setcookie("MANTENERSESION[pass]", $pass, time()+2629800);
  }

?>