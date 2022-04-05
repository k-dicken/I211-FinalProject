<?php

$page_title = "Error";

//display header
IndexView::displayHeader($page_title);

?>
    <h1>Error</h1>
    <h3>Sorry, but an error has occurred.</h3>

    <?php echo urldecode($message) ?>

    <a href="<?= BASE_URL ?>index.php/index">Back to Home</a>

<?php
//display footer
IndexView::displayFooter();