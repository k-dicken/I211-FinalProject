<?php
/**
 *Author: your name*
 * Date: 4/13/2022
 * File: flight_create.class.php
 * Description:
 */


class FlightCreate extends IndexView {
    public function display() {

        parent::displayHeader("Create New Flights", "black");
        ?>

        <form id="flight-create" method="get" action="<?= BASE_URL ?>flight/add">
            <p class="flight-large">Create Flight</p>

            <br>

                <br><br>
                <br>
                <label>Departure Date:</label><br>
                <input type="text" placeholder="YYYY-MM-DD"
                       onfocus="(this.type='date')"
                       onblur="(this.type='text')" class="user-medium full-input">

                <br>

                <label>Location:</label><br>
                <div class="row">
                    <input name="fromLocation" placeholder="From" class="user-medium full-input">
                    &nbsp&nbsp&nbsp<p class='flight-margin' style='font-size: large'>➝</p>&nbsp&nbsp&nbsp
                    <input name="toLocation" placeholder="To" class="user-medium full-input">
                </div>

                <br><br>
                <label for="availability">Available Seats:</label>
                <input name="availability" placeholder="Available Seats" class="user-medium full-input">
                <br>
                <br>
                <label> Time:</label><br>
                <input type="text" placeholder="Departure"
                       onfocus="(this.type='time')"
                       onblur="(this.type='text')" class="user-medium full-input">

                    <input type="text" placeholder="Arrival"
                           onfocus="(this.type='time')"
                           onblur="(this.type='text')" class="user-medium full-input">
                    <br>
                    <br>
                    <label for="status">Gate Number:</label>
                    <input name="gate" label="Gate Number:" placeholder="Gate Number" class="user-medium full-input">
                    <br><br>
                    <label for="status">Flight's Status:</label>
                    <select name="status" id="status">
                        <option value="on-time">On Time</option>
                        <option value="delayed">Delayed</option>
                        <option value="cancel">Canceled</option>
                        <option value="depart">Departed</option>
                        <option value="arrive">Arrived</option>
                        <option value="in-air">In Air</option>
                    </select>
                    <br><br>


                    <br>
                    <br>

                    <button>Create A New Fight</button>
                    <br>
                    <!--            <div class="row position-bottom">-->
                    <!--                <p class="margin-reset">Already Have an Account?</p>&nbsp-->
                    <!--                <a style="color: steelblue" href="-->
                    <?//= BASE_URL ?><!--flight/create">Add Flight</a>-->
                    <!--            </div>-->

        </form>

        <?php
        parent::displayFooter();
    }
}