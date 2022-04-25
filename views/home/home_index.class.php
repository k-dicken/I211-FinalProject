<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

class HomeIndex extends IndexView {
    public function display() {
        parent::displayHeader("Home", "white");
?>

    <div id="hero">
        <h1>Skyline</h1>
        <form id="search" class="search-home" method="get" action="<?= BASE_URL ?>flight/search">
            <br>
            <div class="row">
                <div class="input home-destination-input">
                    <label for="from">FROM</label>
                    <input name="from" id="searchtextboxFrom" data-searchtype="From" value="<?= trim($_GET['from']) ?>" type="text" minlength="3" maxlength="3" autocomplete="off" onkeyup="handleKeyUp(event)" onclick="getSearchType('From')">
                    <div id="suggestionDivFrom" class="suggestionDiv"></div>
                </div>

                <p class="search-arrow">➝</p>

                <div class="input home-destination-input">
                    <label for="to">TO</label>
                    <input name="to" id="searchtextboxTo" data-searchtype="To" value="<?= trim($_GET['to']) ?>" type="text" minlength="3" maxlength="3" autocomplete="off" onkeyup="handleKeyUp(event)" onclick="getSearchType('To')">
                    <div id="suggestionDivTo" class="suggestionDiv"></div>
                </div>
            </div>

            <label for="depart">DEPART</label>
            <input name="depart" type="date">

            <button type="submit">SEARCH</button>
        </form>
    </div>

<!--    <div id="section">-->
<!--        <p>Cras pulvinar mattis nunc sed blandit libero. Nibh praesent tristique magna sit amet purus gravida. Accumsan-->
<!--            lacus vel facilisis volutpat est velit egestas dui id. Odio pellentesque diam volutpat commodo sed egestas-->
<!--            egestas fringilla phasellus. Non odio euismod lacinia at quis risus sed. Est sit amet facilisis magna etiam-->
<!--            tempor. Nunc id cursus metus aliquam eleifend mi. Ipsum faucibus vitae aliquet nec. Ut pharetra sit amet-->
<!--            aliquam id diam maecenas ultricies mi. Molestie at elementum eu facilisis sed odio. Quisque id diam vel quam-->
<!--            elementum pulvinar etiam non quam. Euismod elementum nisi quis eleifend. Facilisis gravida neque convallis-->
<!--            a. Erat pellentesque adipiscing commodo elit at imperdiet dui accumsan sit. Sed id semper risus in-->
<!--            hendrerit.</p>-->
<!--    </div>-->

<?php
        parent::displayFooter();
    }
}