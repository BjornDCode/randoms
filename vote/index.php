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
                <a href="<?= URL ?>">
                    <img src="../assets/images/home.svg" alt="Go to front page">
                </a>
            </nav>
            <div class="tagline">
                <h2>Choose your favorite shape!</h2>
            </div>
            <div class="content">
                <p class="description">
                    As Random’s are hitting the Danish homes we want to make sure you feel like Random’s is a natural part of your household. Therefore we want you to decide what the new liquorice piece should look like. Vote for your favorite and have a chance to win a free box of Randoms.
                </p>
                <a href="<?= htmlspecialchars($loginUrl) ?>" class="facebook-login">Sign in with Facebook</a>
            </div>
        </section>
    </main>



<?php
    include_once('../includes/footer.php');
?>
