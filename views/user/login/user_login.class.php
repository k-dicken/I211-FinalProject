<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class UserLogin extends IndexView {

    public function display() {
        parent::displayHeader("Login", "black");

        if (trim($_GET['message']) != "") {
            $message = "Email or Password incorrect, please try again.";
        }

        ?>

        <form id="user-login" method="post" action="<?= BASE_URL ?>user/verify">
            <label for="email">Email<span>*</span></label>
            <input name="email" type="email" required>

            <label for="password">Password<span>*</span></label>
            <input name="password" type="text" required>

            <p class="login-message"><?= $message ?></p>

            <button type="submit">Login</button>

            <a class="position-bottom" href="<?= BASE_URL ?>user/create">Create Account</a>
        </form>

        <?php

        parent::displayFooter();
    }

}