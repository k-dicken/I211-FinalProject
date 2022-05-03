<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

$page_title = "Error";

//display header
IndexView::displayHeader($page_title, "black");

?>

    <div class="full">
        <h1>An Error has Occurred</h1>
        <p><?= $message ?></p>
        <a href="<?= BASE_URL ?>">Back to Home</a>
    </div>

<?php
//display footer
IndexView::displayFooter();