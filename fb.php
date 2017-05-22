<?php
    include_once('includes/header.php');

    $redirect = $_GET['redirect'];
 ?>

    <p>FB Auth</p>

    <form action="scripts/login.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="hidden" name="redirect" value="<?= $redirect ?>">
        <input type="submit" value="Log In">
    </form>

 <?php
     include_once('includes/footer.php');
  ?>
