<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 5, 2022
 * Name: flight_index_view.class.php
 * Description:
 */

class FlightIndexView extends IndexView {

    public static function displayHeader($pageTitle, $color) {
        parent::displayHeader($pageTitle, "black");
        ?>

        <div class="header-space"></div>
        <form id="search" class="search-flight" method="get" action="<?= BASE_URL ?>flight/search">
            <p class="search-title"></p>

            <div class="row">
                <div class="sub-section row">
                    <div class="input destination-input">
                        <label for="from">FROM</label>
                        <input name="from" value="<?= trim($_GET['from']) ?>" type="text" minlength="3" maxlength="3">
                    </div>
                    <p class="search-arrow">➝</p>
                    <div class="input destination-input">
                        <label for="to">TO</label>
                        <input name="to" value="<?= trim($_GET['to']) ?>" type="text" minlength="3" maxlength="3">
                    </div>
                </div>

                <div class="input sub-section">
                    <label for="depart">DEPART</label>
                    <input name="depart" value="<?= trim($_GET['depart']) ?>" type="date">
                </div>

                <button style="margin: 0;" type="submit">SEARCH</button>
            </div>
        </form>

<?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }
}