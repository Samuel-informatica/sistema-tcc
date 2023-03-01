<?php

    session_start();
    unset($_SESSION['codigo']);
    header("location: ../index.php")

?>