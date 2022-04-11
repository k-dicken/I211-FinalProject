<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class UserEdit extends IndexView {
    public function display($user) {

        $userNum = $user->getUserNum();
        $email = $user->getEmail();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $city = $user->getCity();
        $state = $user->getState();

        parent::displayHeader("Edit Profile", "black");

        ?>

        <form id="user" method="get" action="<?= BASE_URL ?>user/update/<?= $userNum ?>">
            <div class="row">
                <input name="firstName" class="user-medium" value="<?= $firstName ?>">&nbsp&nbsp&nbsp
                <input name="lastName" class="user-medium" value="<?= $lastName ?>">
            </div>
            <br>
            <input name="email" class="user-medium" value="<?= $email ?>">
            <br>
            <div class="row">
                <input name="city" class="user-medium" value="<?= $city ?>">&nbsp&nbsp&nbsp
                <input name="state" class="user-medium" value="<?= $state ?>" size="2" maxlength="2">
            </div>

            <br>

            <button>Update</button>
            <br>
            <a class="grey-link" href="<?= BASE_URL ?>user/detail/<?= $userNum ?>">Cancel</a>
            <br>
            <br>
            <a class="red-link position-bottom" href="<?= BASE_URL ?>user/delete/<?= $userNum ?>">Delete Account</a>

            <br><br>
        </form>

        <?php
        parent::displayFooter();
    }
}