<?php
/*
 * Author: Kylee Dicken
 * Date: Apr 4, 2022
 * File: home_controller.class.php
 * Description: define the class for the home controller, the default controller.
 *
 */

class HomeController {
    public function index() {
        $view = new HomeIndex();
        $view->display();
    }
}