<?php

class UserLogin extends IndexView {

    public function display() {

        parent::displayHeader("Login", "black");

        ?>

        <form id="user-login" method="get" action="<?= BASE_URL ?>user/verify">
            <label for="email">Email</label>
            <input name="email" type="email" required>

            <label for="password">Password</label>
            <input name="password" type="password" required>

            <button type="submit">Login</button>

            <a href="<?= BASE_URL ?>user/create">Create Account</a>
        </form>

        <?php

        parent::displayFooter();
    }

}