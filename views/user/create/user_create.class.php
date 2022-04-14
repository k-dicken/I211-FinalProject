<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class UserCreate extends IndexView {
    public function display() {

        parent::displayHeader("Create Account", "black");
        ?>

        <form id="user-create" method="post" action="<?= BASE_URL ?>user/add">
            <p class="user-large">Create Account</p>

            <br>
            <br>

            <input name="firstName" placeholder="First Name*" class="user-medium full-input" required>
            <br>
            <input name="lastName" placeholder="Last Name*" class="user-medium full-input" required>
            <br>
            <input name="email" placeholder="Email*" class="user-medium full-input" required>
            <br>
            <input name="password" placeholder="Password*" class="user-medium full-input" required>
            <br>
            <div class="input-row">
                <input name="city" placeholder="City*" class="user-medium" style="width: 80%" required>&nbsp&nbsp&nbsp
                <input name="state" placeholder="ST*" class="user-medium" size="2" maxlength="2" required>
            </div>

            <br>

            <button>Create Account</button>
            <br>
            <div class="row position-bottom">
                <p class="margin-reset">Already Have an Account?</p>&nbsp
                <a style="color: steelblue" href="<?= BASE_URL ?>user/login">Login</a>
            </div>

        </form>

        <?php
        parent::displayFooter();
    }
}