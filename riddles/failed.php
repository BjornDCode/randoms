<?php

    include_once('../scripts/settings.php');
    include_once('../includes/header.php');
?>

    <main class="riddles-failed">
        <section>
            <nav>
                <a href="<?= URL ?>">&larr; Home</a>
            </nav>
            <div class="tagline">
                <h2>Oh no!</h2>
            </div>
            <div class="content">
                <p class="description">
                    You are a failure in this game and life in general. Why are you like this?
                </p>
                <a href="<?= URL ?>/riddles/" class="try-again">Try again</a>
            </div>
        </section>
    </main>



<?php
    include_once('../includes/footer.php');
?>
