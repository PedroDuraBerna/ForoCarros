<?php

require_once "models/users.php";
require_once "models/topics.php";
require_once "models/posts.php";

class UsersController {

    public function login() {

        if (isset($_POST["new_user"])) {
            header("Location:".base_url."index.php?controllers=users&action=registration");
        } 

        if (isset($_POST["enter"])) {

            $user = new Users;
            $user->setUsers_name($_POST["user_name"]);
            $user->setUsers_password($_POST["user_password"]);
            $err = $user->login();

            if (empty($err)) {
                $_SESSION["user_information"] = $user->getUser($_POST["user_name"]);
            } else {
                $_SESSION["login_error"] = $err;
            }

        }

        require_once "views/user/login.php";

    }

    public function logout() {

        if (isset($_POST["logout"])) {
            Utils::deleteSession("user_information");
        }

        header("Location:".base_url."index.php?controllers=users&action=registration");

    }

    public function registration() {
        require_once "views/user/registration.php";
    }

    public function ViewPost($posts_id) {

        $p = new Posts;

        $result = $p->getPosts_by_id($posts_id);

        var_dump($result);

    }

    public function save() {

        var_dump($_POST);

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

        header("Location:".base_url."index.php?controllers=users&action=registration");

    }

    public function myprofile() {
        require_once "views/user/myprofile.php";
    }

    public function post() {
        
        $count = 0;
        $topics = [];
        $topic = new Topics;
        $result = $topic->getAll_Topics();

        while ($obj = $result->fetch_object()) {
            $topics[$count]["Name"] = $obj->topics_name;
            $count++;
        }

        $err = [];

        if (isset($_POST["title"])) {
            if ($_POST["title"] == "") {
                $err["title"] = "Has de introducir el título";
            }
        }

        if (isset($_POST["text"])) {
            if ($_POST["text"] == "") {
                $err["text"] = "Has de escribir algo";
            }
        }
        

        if (empty($err) && isset($_POST["Topic"])) {

            $post = new Posts;
            $topic = new Topics;
            $p = $_SESSION["user_information"];

            $today = getdate();
            $date = $today["year"] . "-" . $today["mon"] . "-" . $today["mday"] . " " . $today["hours"] . ":" . $today["minutes"] . ":" . $today["seconds"]; 

            $post->setPosts_title($_POST["title"]);
            $post->setPosts_text($_POST["text"]);
            $post->setPosts_date($date);
            $post->setPosts_last_modification_date($date);
            $post->setPosts_visits_counter(0);
            $post->setPosts_users_id($p["users_id"]);
            $post->setPosts_topics_id($topic->getTopics_id_by_name($_POST["Topic"]));

            $post->insert_post();

            header("Location:" . base_url . "index.php?");   

        }

        require_once "views/user/post.php";

    }

    public function change_email() {

        $user = new Users;
        $email = $_POST["email"];
        $err = [];

        if (!(false !== filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $err["change"] = "Formato de correo electrónico incorrecto";
        }

        if ($user->user_email_exist($email)) {
            $err["change"] = "Este email ya existe";
        }

        if (empty($err)) {
            $user->change_email($email);
        }

        require_once "views/user/myprofile.php";
    }

    public function change_interests() {

        $user = new Users;
        $interests = $_POST["interests"];
        $err = [];

        if (strlen($interests) > 900) {
            $err["change"] = "Has superado los 900 carácteres, introduce menos";
        }

        if (empty($err)) {
            $user->change_interests($interests);
        }

        require_once "views/user/myprofile.php";

    }

    public function change_bio() {

        $user = new Users;
        $bio = $_POST["bio"];
        $err = [];

        if (strlen($bio) > 900) {
            $err["change"] = "Has superado los 900 carácteres, introduce menos";
        }

        if (empty($err)) {
            $user->change_bio($bio);
        }

        require_once "views/user/myprofile.php";

    }

    public function change_sign() {

        $user = new Users;
        $sign = $_POST["sign"];
        $err = [];

        if (strlen($sign) > 200) {
            $err["change"] = "Has superado los 200 carácteres, introduce menos";
        }

        if (empty($err)) {
            $user->change_sign($sign);
        }

        require_once "views/user/myprofile.php";

    }

    public function getPost_by_id($posts_id) {

        $p = new Posts;
        $result = $p->getPosts_by_id($posts_id);
        return $result;

    }

}
