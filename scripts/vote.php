<?php

    require_once('db.php');

    $shape = $_POST['shape'];
    $facebook_id = $_POST['facebook_id'];

    $sql = "update shapes set votes = votes + 1 where name = '$shape'";
    $db->query($sql);

    $sql = "update users set has_voted = 1 where facebook_id = $facebook_id";
    $db->query($sql);

    header('Location: ../vote/thanks.php');

?>
