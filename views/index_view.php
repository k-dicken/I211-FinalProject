<?php

class IndexView {
    static public function displayHeader($pageTitle, $color) {
        ?>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Skyline | <?= $pageTitle ?></title>
            <link rel="stylesheet" href="<?= BASE_URL ?>www/css/styles.css">
            <style>
                header a {
                    color: <?= $color ?>;
                }
            </style>
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <header>
            <nav>
                <a href="<?= BASE_URL ?>index.php">Home</a>
                <a href="<?= BASE_URL ?>flight/index">Flights</a>
            </nav>
            <a href="index.php"><img src="" alt="" class="logo"></a>
            <a href="<?= BASE_URL ?>user/login">Login</a>
        </header>

        <?php
    }

    static public function displayFooter() {
        ?>

        <footer>
            <a class="logo" href="<?= BASE_URL ?>">skyline</a>
            <br>
            <br>
            <p class="footer-address">12345 Skies Lane San Francisco, California 67890</p>
            <p class="footer-phone">(901) 123-4567</p>
            <br>
            <p class="footer-credit">Project by<br>Kylee Dicken & Oluwatishe Elesinnla</p>
            <br>
            <p class="footer-copyright">Copyright Skyline &copy 2022</p>
        </footer>
        </body>
        </html>

        <?php
    }
}