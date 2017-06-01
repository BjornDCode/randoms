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
        if ($user->has_played) {
            header('Location: completed.php');
        }
    }

    // Riddles

    $sql = "select * from riddles order by rand() limit 5";
    $query = $db->query($sql);
    $riddles = $query->fetchAll();

    include_once('../includes/header.php');
?>

    <main class="riddles-riddle">
        <section>
            <nav>
                <a href="<?= URL ?>">
                    <img src="../assets/images/home.svg" alt="Go to front page">
                </a>
            </nav>
            <div class="tagline">
                <h2>Which is the next piece?</h2>
            </div>
            <div class="riddles">
                <?php foreach ($riddles as $riddle) { ?>
                    <div class="riddle">
                        <header>
                            <div class="timer">
                                <span>60</span>
                            </div>
                            <div class="progress">
                                <span>1/5</span>
                            </div>
                        </header>
                        <div class="question">
                            <?php
                                foreach ($riddle as $field => $ingredient) {
                                    if ( substr($field, 0, 10) === 'ingredient' ) {
                            ?>
                                    <div class="candy <?= $ingredient ?>"></div>
                            <?php
                                    }
                                }
                            ?>
                            <div class="candy empty"></div>
                        </div>
                        <div class="answers">
                            <?php
                                $answer = $riddle['answer'];

                                $sql = "select * from ingredients where not name = '$answer' order by rand() limit 3";
                                $query = $db->query($sql);
                                $answers = $query->fetchAll();
                                $answers[] = array(
                                    'name' => $answer,
                                    'correct' => true
                                );
                                shuffle($answers);

                                // echo '<pre>';
                                // print_r($answers);
                                // echo '</pre>';

                                foreach ($answers as $answer) {
                            ?>
                                    <button type="button" name="button" data-answer="<?= ($answer['correct']) ? 'true' : 'false'; ?>">
                                        <div class="candy <?= $answer['name'] ?>"></div>
                                    </button>
                            <?php
                                }
                            ?>
                            <!-- <button type="button" name="button">
                                Answer 1
                            </button>
                            <button type="button" name="button">
                                Answer 1
                            </button>
                            <button type="button" name="button">
                                Answer 1
                            </button>
                            <button type="button" name="button">
                                Answer 1
                            </button> -->
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>

<?php
    include_once('../includes/footer.php');
?>
