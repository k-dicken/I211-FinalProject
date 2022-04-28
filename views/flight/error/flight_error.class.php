<?php

class FlightError {
    public function display($message) {
        parent::displayHeader("Error", "black");

        ?>

        <div class="full">
            <h1><?php $message ?></h1>
        </div>

        <?php
        parent::displayFooter();
    }
}