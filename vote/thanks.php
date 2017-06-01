<?php

    include_once('../scripts/settings.php');
    include_once('../includes/header.php');

    require_once('../scripts/db.php');

    $sql = "select * from shapes";
    $query =  $db->query($sql);
    $shapes = $query->fetchAll();
    $total_votes;

    foreach ($shapes as $shape) {
        $total_votes += $shape['votes'];
    }

?>

<main class="voting-thanks">
    <section>
        <nav>
            <a href="<?= URL ?>">
                <img src="../assets/images/home.svg" alt="Go to front page">
            </a>
        </nav>
        <div class="tagline">
            <h2>Thank you!</h2>
        </div>
        <div class="shapes">
            <?php
                foreach ($shapes as $shape) {
                    $percentage = ceil( $shape['votes'] / $total_votes * 100 );
            ?>
                <div class="shape <?= $shape['name'] ?>">
                    <div class="image" style="width: <?= $percentage ?>%;"></div>
                    <div class="info"><?= $shape['votes'] ?></div>
                </div>
            <?php
                }
            ?>
        </div>
        <div class="competition-info">
            <p>To enter the competition to win a box of Randoms, please share this competition on Facebook.</p>
            <div class="fb-share-button" data-href="http://bjornlindholm.dk/kea/randoms/vote/" data-layout="button" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Del</a></div>
        </div>

    </section>
</main>

<?php
    include_once('../includes/footer.php');
?>
