<?php

    session_start();

    include_once('../scripts/fb-authorize.php');
    include_once('../scripts/settings.php');

    $facebook_id = $_SESSION['facebook_id'];

    require_once('../scripts/db.php');

    $sql = "select * from users where facebook_id = $facebook_id";
    $query = $db->query($sql);
    $user = $query->fetchObject();

    if (!$user) {
        $sql = "insert into users (facebook_id, has_voted, has_played) values('$facebook_id', 0, 0)";
        $db->query($sql);
    } else {
        if ($user->has_voted) {
            header('Location: thanks.php');
        }
    }

    include_once('../includes/header.php');
?>

    <main class="voting-vote">
        <section>
            <nav>
                <a href="<?= URL ?>">
                    <img src="../assets/images/home.svg" alt="Go to front page">
                </a>
            </nav>
            <div class="tagline">
                <h2>Choose your favorite shape!</h2>
            </div>
            <form class="shapes" action="../scripts/vote.php" method="post">
                <div class="shapes-container">
                    <div class="shape beer">
                        <input type="radio" name="shape" value="beer" id="beer" required>
                        <label for="beer">The Beer</label>
                    </div>
                    <div class="shape flag">
                        <input type="radio" name="shape" value="flag" id="flag">
                        <label for="flag">The Flag</label>
                    </div>
                    <div class="shape letter">
                        <input type="radio" name="shape" value="letter" id="letter">
                        <label for="letter">The 'Ø'</label>
                    </div>
                </div>
                <input type="hidden" name="facebook_id" value="<?= $facebook_id ?>">
                <button type="submit">Vote</button>
            </form>
        </section>
    </main>

<?php
    include_once('../includes/footer.php');
?>
