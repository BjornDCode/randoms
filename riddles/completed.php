<?php

    session_start();
    if (!isset($_SESSION['facebook_id'])) {
        header('Location: index.php');
    }

    require_once('../scripts/db.php');

    $facebook_id = $_SESSION['facebook_id'];

    $sql = "select * from users where facebook_id = $facebook_id";
    $query = $db->query($sql);
    $user = $query->fetchObject();

    $discount_code;
    if ($user->discount_code) {
        $discount_code = $user->discount_code;
    } else {
        $discount_code = mt_rand(100000, 999999);
        $sql = "update users set discount_code = '$discount_code' where facebook_id = $facebook_id";
        $db->query($sql);
    }

    $sql = "update users set has_played = 1 where facebook_id = $facebook_id";
    $db->query($sql);

    include_once('../scripts/settings.php');
    include_once('../includes/header.php');


?>

    <main class="riddles-completed">
        <section>
            <nav>
                <a href="<?= URL ?>">&larr; Home</a>
            </nav>
            <div class="tagline">
                <h2>Congratulations!</h2>
            </div>
            <div class="content">
                <p class="description">
                    This text describes the game. Includes a brief how to participate and also provides some information about why to participate.
                </p>
                <div class="discount-code">
                    <p>Your discount code is:</p>
                    <div class="code"><?= $discount_code ?></div>
                </div>
                <div class="fb-share-button" data-href="http://bjornlindholm.dk/kea/randoms/riddles/" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Del</a></div>
            </div>
        </section>
    </main>



<?php
    include_once('../includes/footer.php');
?>
