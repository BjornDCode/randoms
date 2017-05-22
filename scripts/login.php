<?php

session_start();

if(isset($_POST['email'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_password = sha1($password);
    $redirect = $_POST['redirect'];

    include_once('db.php');

    $sql = "select * from users where email = '$email' and password = '$encrypted_password'";
    $query = $db->query($sql);

    if ($user = $query->fetchObject()) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['email'] = $user->email;
        $_SESSION['first_name'] = $user->first_name;
        $_SESSION['last_name'] = $user->last_name;

        $redirect_to = ($redirect == 'vote') ? '../vote/vote.php' : '../riddles/something.php';

        header('Location: ' . $redirect_to);
    } else {
        $redirect_to = "Location: ../fb.php?rejected&redirect=$redirect";
        header($redirect_to);
    }


} else {
    header('Location: ../fb.php?rejected');
}

?>
