<?php

    include_once('../scripts/fb-head.php');
    include_once('../scripts/settings.php');

    $helper = $fb->getRedirectLoginHelper();

    $permissions = []; // Optional information that your app can access, such as 'email'
    $loginUrl = $helper->getLoginUrl(URL.'/vote/vote.php', $permissions);

    include_once('../includes/header.php');

?>

    Vote Index Page

    <a href="<?= htmlspecialchars($loginUrl) ?>">Vote</a>

<?php
    include_once('../includes/footer.php');
?>
