<?php
    session_start();

    $_SESSION['id'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['username'] = null;
    //$_SESSION['email'] = null;

    session_destroy();
    header("Location:index.php");

?>