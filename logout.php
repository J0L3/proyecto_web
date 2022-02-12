<?php
    session_start();
    //Borramos las cookies
    if (isset($_COOKIE['MANTENERSESION'])) {
        setcookie("MANTENERSESION",FALSE, time()-60);
        setcookie("MANTENERSESION[username]", $username, time()-60);
        setcookie("MANTENERSESION[pass]", $pass, time()-60);
    }

    session_destroy();
    header("Location: index.php");

?>