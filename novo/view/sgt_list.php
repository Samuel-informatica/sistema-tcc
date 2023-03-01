<?php
    session_start();
    if(!isset($_SESSION['codigo']))
    {
        header("location: ../novo/view/index.php");
        exit;
    }
?>

<?php include('menu.php'); ?>

<br>



            





