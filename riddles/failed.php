<?php

    include_once('../scripts/settings.php');
    include_once('../includes/header.php');
?>

    <main class="riddles-failed">
        <section>
            <nav>
                <a href="<?= URL ?>">
                    <img src="../assets/images/home.svg" alt="Go to front page">
                </a>
            </nav>
            <div class="tagline">
                <h2>Oh no!</h2>
            </div>
            <div class="content">
                <p class="description">
                    Unfortunately you didn’t manage to solve all the riddles correctly. You can try again or come back later to make sure you claim your discount code.
                </p>
                <a href="<?= URL ?>/riddles/" class="try-again">Try again</a>
            </div>
        </section>
    </main>



<?php
    include_once('../includes/footer.php');
?>
