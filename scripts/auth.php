<?php
    // include_once('settings.php');
    session_start();


    if (!isset($_SESSION['user_id'])) {
        // $redirect_to = 'Location: '.URL;
        header('Location: ../index.php');
    }

?>
