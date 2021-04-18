<?php

require_once "models/users.php";

class UsersController {

    public function login() {
        require_once "views/user/login.php";
    }

    public function registration() {
        require_once "views/user/registration.php";
    }

    public function save() {

        if (isset($_POST["registration"])) {

            require_once "helpers/validations.php";

            $data = array();
            $err = array();
            $user = new Users;

            $data["user_name"] = $_POST["user_name"];
            $data["user_birth_date"] = $_POST["user_birth_date"];
            $data["user_password"] = $_POST["user_password"];
            $data["user_password_repited"] = $_POST["user_password_repited"];
            $data["user_email"] = $_POST["user_email"];

            if (!isset($_POST["accepted_rules"])) {
                $err["accepted_rules"] = "No has aceptado las normas del foro."; 
            }

            $data = $user->scape_characters($data);

            if ($user->user_name_exist($data[0])) {

                $err["user_name"]["exist"] = "Este nombre de usuario ya existe.";

            }

            if ($user->user_email_exist($data[4])) {

                $err["user_email"]["exist"] = "Este email de usuario ya existe.";

            }

            $err += Validations::registration_validation($data);
    
            if (empty($err)) {

                $_SESSION["status_registration"] = "completed";

                $actual_date = date('Y-m-d h:m:s');

                $user->setUsers_name($data[0]);
                $user->setUsers_birth_date($data[1]);
                $user->setUsers_password($data[2]);
                $user->setUsers_email($data[4]);
                $user->setUsers_registration_date($actual_date);
                $user->setUsers_last_connection_date($actual_date);
                $user->save();

            } else {
                $_SESSION["info"] = $data;
                $_SESSION["status_registration"] = "failed";
                $_SESSION["registration"] = $err;
            }

        }

        header("Location:".base_url."users/registration");

    }

}

?>