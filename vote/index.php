<?php

    include_once('../scripts/fb-head.php');
    include_once('../scripts/settings.php');

    $helper = $fb->getRedirectLoginHelper();

    $permissions = []; // Optional information that your app can access, such as 'email'
    $loginUrl = $helper->getLoginUrl(URL.'/vote/vote.php', $permissions);

    include_once('../includes/header.php');

?>

    <main class="voting-index">
        <section>
            <nav>
                <a href="<?= URL ?>">&larr; Home</a>
            </nav>
            <div class="tagline">
                <h2>Choose your favorite shape!</h2>
            </div>
            <div class="content">
                <p class="description">
                    This text describes the game. Includes a brief how to participate and also provides some information about why to participate.
                </p>
                <a href="<?= htmlspecialchars($loginUrl) ?>" class="facebook-login">Sign in with Facebook</a>
            </div>
        </section>
    </main>



<?php
    include_once('../includes/footer.php');
?>
