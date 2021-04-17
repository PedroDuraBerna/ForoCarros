<?php

require_once "models/users.php";

class UsersController {

    public function registration() {
        require_once "views/user/registration.php";
    }

    public function save() {

        if (isset($_POST["registration"])) {

            $user = new Users;
            $user->setUsers_name($_POST["user_name"]);
            $user->setUsers_birth_date($_POST["user_birth_date"]);
            $user->setUsers_password($_POST["user_password"]);
            $user->setUsers_email($_POST["user_email"]);
            $user->save();

            var_dump($user);

        }

        //header("Location:".base_url."users/registration");

    }

}

?>