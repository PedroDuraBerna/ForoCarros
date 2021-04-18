<?php

require_once "models/users.php";

class UsersController {

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
            $data["user_email"] = $_POST["user_email"];

            $data = $user->scape_characters($data);

            if (!$user->user_name_exist($data[0])) {

                $err = Validations::registration_validation($data);
    
                if (empty($err)) {
    
                    $actual_date = date('d-m-Y h:m:s');
    
                    $user->setUsers_name($_POST["user_name"]);
                    $user->setUsers_birth_date($_POST["user_birth_date"]);
                    $user->setUsers_password($_POST["user_password"]);
                    $user->setUsers_email($_POST["user_email"]);
                    $user->setUsers_registration_date($actual_date);
                    $user->setUsers_last_connection_date($actual_date);
                    //$user->save(); //HAY QUE ACTIVAR ESTO PARA QUE SE GUARDEN LOS USUARIOS
    
                }

            } else {

                $err["user_name"]["exist"] = "Este nombre de usuario ya existe.";

            }

        }

        var_dump($err);

        // TENGO QUE PONER UN SESSION CON LOS RESULTADOS DE ESTE PROCESO Y HACER QUE SE MUESTREN EN LA PÁGINA USERS/REGISTRATION

        //header("Location:".base_url."users/registration");

    }

}

?>