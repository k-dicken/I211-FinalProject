<?php

class UserController {
    private $userModel;

    //default constructor
    public function __construct() {
        //create an instance of the MovieModel class
        $this->userModel = UserModel::getUserModel();
    }

    public function login() {
        $view = new UserLogin();
        $view->display();
    }

    public function verify() {
        //retrieve query terms from search form
        $email = trim($_GET['email']);
        $password = trim($_GET['password']);

        //search the database for matching movies
        $user = $this->userModel->verify_user($email, $password);

        if ($user === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);

            return;
        }

        if ($user === 0) {
            header("Location:" . BASE_URL . "user/login?message=failed"); /* Redirect browser */
            exit();
        }

        header("Location:" . BASE_URL . "user/detail/" . $user->getUserNum()); /* Redirect browser */
        exit();

    }

    public function detail($userNum) {

        $user = $this->userModel->view_user($userNum);

        if (!$user) {
            //display an error
            $message = "There was a problem displaying the user userNum='" . $userNum . "'.";
            $this->error($message);
            return;
        }

        $view = new UserDetail();
        $view->display($user);
    }

}