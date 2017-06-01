<?php
    include_once('scripts/settings.php');
    include_once('includes/header.php');
    include_once('includes/navigation.php');
?>

    <main class="site-content">
        <section class="intro" id="intro">
            <div class="tagline">
                <h1>Hey Denmark,<br>randomise yourself!</h1>
            </div>
            <div class="packaging">
                <img src="<?= URL ?>/assets/images/packaging.png" alt="Randoms Packaging">
            </div>
        </section>
        <div class="participation" id="participate">
            <section class="game" id="riddles">
                <div class="tagline">
                    <h2>Fancy Some Candy?</h2>
                    <h2>Solve the riddle!</h2>
                </div>
                <p class="description">
                    Are you ready to take on the RANDOMS CHALLENGE and get your hands on some Randoms. If you manage to solve our riddles you will get a pack of Randoms at a discounted price! Flex your brains before your friends, and treat yourself to some Randoms!
                </p>
                <a href="<?= URL ?>/riddles" class="button">Play</a>
            </section>
            <section class="vote" id="vote">
                <div class="tagline">
                    <h2>We make new shapes...</h2>
                    <h2>...you vote for it</h2>
                </div>
                <p class="description">
                    Randoms have an ambition - to become a true Danish favorite. That's why Rowntrees is introducing the liquorice Random - and it's up to YOU to decide what shape it will take. Which shape do you think is the most symbolic to Denmark?
                </p>
                <a href="<?= URL ?>/vote" class="button">Vote</a>
            </section>
        </div>
        <section class="product-info" id="product">
            <div class="tagline">
                <h2>Randoms</h2>
            </div>
            <p class="description">
                From ping-pong paddles and paintbrushes, to snowflakes and saxophones - each pack of Rowntree's Randoms contains billions of possible random sweet combinations. With so many shapes, textures and flavours no other sweets are this randomly playful.
            </p>
            <div class="pros">
                <div class="line">
                    <span>No artificial colours,</span>
                </div>
                <div class="line">
                    <span>flavours or preservatives.</span>
                </div>
            </div>
            <img src="<?= URL ?>/assets/images/packaging.png" alt="Randoms Packaging" class="packaging">
            <div class="info-links">
                <a href="#ingredients">ingredients</a>
                <a href="#nutritions">nutritional information</a>
            </div>
            <div id="ingredients">
                <a href="#ingredients" class="close"></a>
                <h3>Ingredients</h3>
                <p>Glucose syrup, Sugar, Dextrin(Maize fibre), Gelling agents(Gelatine, Pectin), Acids (Citric Acid, Tartaric Acid, Malic Acid), Concentrated Fruit Juices (1.%) (Apple, Blueberry, Raspberry, Strawberry, Black Carrot), Flavourings, Glaze (Palm oil, Glazing Agent: Carnauba Wax), Fruit and vegetable concentrates (Black Carrot, Hibiscus, Carrot, Safflower), Spirulina Concentrate, Invert Sugar Syrup, Colours (Paprika Extract, Chlorophylls and chlorophyllins, Carotenes), Stabilisers (Carageenan), Acidity Regulators (Sodium ascorbate, Sodium citrate), Fruit puree concentrates (Blueberry, Strawberry, Raspberry).</p>
            </div>
            <div id="nutritions">
                <a href="#nutritions" class="close"></a>
                <h3>Nutritional Information</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </section>
        <section class="brand" id="brand">
            <div class="tagline">
                <h2>Rowntree's</h2>
            </div>
            <div class="content">
                <p>
                    For over 130 years, the irresistible fruity taste of Rowntree’s products makes it impossible not to chew them. With delicious blackcurrant, lemon, strawberry, lime and orange flavors in each pack of Randoms, are you brainy enough to try?
                </p>
                <p>
                     With real fruit juice and no artificial colors, flavors or preservatives, they are an essence of playfulness, an escape of adult life. With so many shapes, textures and flavors no other sweets are this randomly clever.
                </p>
            </div>
            <img src="<?= URL ?>/assets/images/logo_bw.png" alt="Randoms Logo" class="logo">
        </section>
    </main>

<?php
    include_once('includes/footer.php');
?>
