<?php

class UserController {

    public function login() {
        $view = new UserLogin();
        $view->display();
    }

}