<?php
class UserDetail extends IndexView {

    public function display($user) {

        $userNum = $user->getUserNum();
        $email = $user->getEmail();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $city = $user->getCity();
        $state = $user->getState();

        parent::displayHeader($firstName . " " . $lastName, "black");

        ?>

        <div id="user">
            <p class="user-name"><?= $firstName . " " . $lastName ?></p>
            <p class="user-email"><?= $email ?></p>
            <p class="user-email"><?= $city . ", " . $state ?></p>

            <a class="user-button" href="<?= BASE_URL ?>flight/user/<?= $userNum ?>">View Flights</a>
            <a class="user-delete" href="<?= BASE_URL ?>user/delete/<?= $userNum ?>">Delete Account</a>

            <br><br>
        </div>

        <?php
        parent::displayFooter();
    }
}