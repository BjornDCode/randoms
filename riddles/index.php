<?php

    include_once('../scripts/fb-head.php');
    include_once('../scripts/settings.php');

    $helper = $fb->getRedirectLoginHelper();

    $permissions = []; // Optional information that your app can access, such as 'email'
    $loginUrl = $helper->getLoginUrl(URL.'/riddles/riddles.php', $permissions);

    include_once('../includes/header.php');

?>

    <main class="riddles-index">
        <section>
            <nav>
                <a href="<?= URL ?>">
                    <img src="../assets/images/home.svg" alt="Go to front page">
                </a>
            </nav>
            <div class="tagline">
                <h2>Solve some riddles!</h2>
            </div>
            <div class="content">
                <p class="description">
                    You will be presented with 5 riddles. If you manage to solve them all you will receive a discount code for a pack of Randoms. Each riddle will be a series of candy pieces where you will have to figure out what the next piece is. You can do this by looking at the pattern of the previous pieces. But you have to be quick! You only have 60 seconds for each riddle. If you don’t manage to solve them all, you can try again later.
                </p>
                <a href="<?= htmlspecialchars($loginUrl) ?>" class="facebook-login">Sign in with Facebook</a>
            </div>
        </section>
    </main>



<?php
    include_once('../includes/footer.php');
?>
