<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class UserDetail extends IndexView {

    public function display($user) {

        $userNum = $user->getUserNum();
        $email = $user->getEmail();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $city = $user->getCity();
        $state = $user->getState();

        parent::displayHeader($firstName . " " . $lastName, "black");

        if ($userNum != $_SESSION['userNum']) {
            if (isset($_SESSION['userNum'])) {
                header("Location:" . BASE_URL . "user/detail/" . $_SESSION['userNum']); /* Redirect browser */
                exit();
            } else {
                header("Location:" . BASE_URL . "user/login"); /* Redirect browser */
                exit();
            }
        }
        ?>

        <div id="user">
            <p class="user-large"><?= $firstName . " " . $lastName ?></p>
            <p class="user-medium"><?= $email ?></p>
            <p class="user-medium"><?= $city . ", " . $state ?></p>

            <br><br>

            <a class="user-button" href="<?= BASE_URL ?>flight/user/<?= $userNum ?>">View Flights</a>
            <br>
            <a class="user-button" href="<?= BASE_URL ?>user/edit/<?= $userNum ?>">Edit Profile</a>

            <br>

            <a class="red-link position-bottom" href="<?= BASE_URL ?>user/logout">Logout</a>

            <br><br>
        </div>

        <?php
        parent::displayFooter();
    }
}