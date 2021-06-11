<?php

require_once "models/users.php";
require_once "models/topics.php";
require_once "models/posts.php";
require_once "models/comments.php";

class UsersController
{

    public function login()
    {

        if (isset($_POST["new_user"])) {
            header("Location:" . base_url . "index.php?controllers=users&action=registration");
        }

        if (isset($_POST["enter"])) {

            $user = new Users;
            $user->setUsers_name($_POST["user_name"]);
            $user->setUsers_password($_POST["user_password"]);
            $err = $user->login();

            if (empty($err)) {
                $_SESSION["user_information"] = $user->getUser($_POST["user_name"]);
                $_SESSION["user_information"]["users_birth_date"] = date_format(date_create($_SESSION["user_information"]["users_birth_date"]), "d/m/Y");
                $_SESSION["user_information"]["users_registration_date"] = date_format(date_create($_SESSION["user_information"]["users_registration_date"]), "d/m/Y H:i:s");
                $_SESSION["user_information"]["users_last_connection_date"] = date_format(date_create($_SESSION["user_information"]["users_last_connection_date"]), "d/m/Y H:i:s");
            } else {
                $_SESSION["login_error"] = $err;
            }
        }

        require_once "views/user/login.php";
    }

    public function logout()
    {

        if (isset($_POST["logout"])) {
            $user = new Users;
            $actual_date = date('Y-m-d h:I:s');
            $user->update_last_connection_date($actual_date);
            Utils::deleteSession("user_information");
        }

        header("Location:" . base_url . "index.php?");
    }

    public function registration()
    {
        require_once "views/user/registration.php";
    }

    public function ViewPost($posts_id)
    {

        $p = new Posts;

        $result = $p->getPosts_by_id($posts_id);

        var_dump($result);
    }

    public function save()
    {

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
                header("Location:" . base_url . "index.php?controllers=users&action=myprofile");
            } else {
                $_SESSION["info"] = $data;
                $_SESSION["status_registration"] = "failed";
                $_SESSION["registration"] = $err;
            }
        }

        header("Location:" . base_url . "index.php?controllers=users&action=registration");
    }

    public function myprofile()
    {

        $u = new Users;
        $Aux_info = [];

        $Aux_info["number_posts"] = $u->getNumber_posts_by_users_id($_SESSION["user_information"]["users_id"]);
        $Aux_info["number_likes_recibed"] = $u->getNumber_like_recibed_by_users_id($_SESSION["user_information"]["users_id"]);
        $Aux_info["number_likes_gived"] = $u->getNumber_like_gived_by_users_id($_SESSION["user_information"]["users_id"]);
        $Aux_info["number_comments"] = $u->getNumber_comments_by_users_id($_SESSION["user_information"]["users_id"]);
        $Aux_info["number_comments_recibed"] = $u->getNumber_comments_recibed_by_users_id($_SESSION["user_information"]["users_id"]);

        require_once "views/user/myprofile.php";
    }

    public function post()
    {

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
            $OK = "Post";
            $p = $_SESSION["user_information"];

            $today = date('Y-m-d H:i:s');

            $post->setPosts_title($_POST["title"]);
            $post->setPosts_text($_POST["text"]);
            $post->setPosts_date($today);
            $post->setPosts_last_modification_date($today);
            $post->setPosts_visits_counter(0);
            $post->setPosts_users_id($p["users_id"]);
            $post->setPosts_topics_id($topic->getTopics_id_by_name($_POST["Topic"]));
            $post->setPosts_visibility($_POST["visibility"]);

            $post->insert_post();

        }

        require_once "views/user/post.php";
    }

    public function comment()
    {

        if (isset($_POST["comment"])) {

            $p = new Posts;

            $p->rest_visit($_POST["posts_id"]);

            $err = [];

            $comments_text = $_POST["post_comment"];
            $comments_date = date('Y-m-d H:i:s');
            echo $comments_date;
            $posts_id = $_POST["posts_id"];
            $users_id = $_SESSION["user_information"]["users_id"];

            if ($_POST["post_comment"] == "" || $_POST["post_comment"] == " ") {
                $err["void_comment"] = "No hay nada excrito en el comentario";
            }

            if (empty($err)) {

                $c = new Comments;

                $c->insert_comment($comments_text, $comments_date, $posts_id, $users_id);

                header("Location:" . base_url . "index.php?controllers=post&action=view&id=" . $posts_id);
            }
        }
    }

    public function change_email()
    {

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

    public function change_interests()
    {

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

    public function change_bio()
    {

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

    public function change_sign()
    {

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

    public function change_users_photo()
    {

        if (isset($_POST["change_photo"])) {

            $file = $_FILES['photo'];
            $err = [];
            $u = new Users;

            if (isset($file) && $file != "") {
                $name = time() . $file["name"];
                $type = $file["type"];
                $tmp_name = $file["tmp_name"];
                $size = $file["size"];

                if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 2000000))) {
                    $err["change"] = 'Error. La extensión o el tamaño de los archivos no es correcta.
                    Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.';
                } else {

                    $path = "assets/img/profile_picks/";

                    if (isset($_SESSION["user_information"])) {
                        if ($_SESSION["user_information"] != null) {
                            unlink($path . $_SESSION["user_information"]["users_profile_photo"]);
                            $_SESSION["user_information"]["users_profile_photo"] = $name;
                        }
                    }

                    if (move_uploaded_file($tmp_name, $path . $name)) {
                        chmod($path . $name, 0777);
                        $u->change_users_profile_photo($name);
                    } else {
                        $err["change"] = "Ocurrió algún error al subir la imagen al servidor. No se ha podido guardar.";
                    }
                }
            }

            require_once "views/user/myprofile.php";
        }
    }

    public function public_profile()
    {

        if (isset($_GET["name"])) {

            $u = new Users;

            $user = $u->getPublic_user($_GET["name"]);

            $Aux_info["number_posts"] = $u->getNumber_posts_by_users_id($user["users_id"]);
            $Aux_info["number_likes_recibed"] = $u->getNumber_like_recibed_by_users_id($user["users_id"]);
            $Aux_info["number_likes_gived"] = $u->getNumber_like_gived_by_users_id($user["users_id"]);
            $Aux_info["number_comments"] = $u->getNumber_comments_by_users_id($user["users_id"]);
            $Aux_info["number_comments_recibed"] = $u->getNumber_comments_recibed_by_users_id($user["users_id"]);

            require_once "views/user/publicprofile.php";
        } else {
            echo "error";
        }
    }

    public function getPost_by_id($posts_id)
    {

        $p = new Posts;
        $result = $p->getPosts_by_id($posts_id);
        return $result;
    }

    public function adminConfiguration()
    {

        $p = new Posts;
        $c = new Comments;
        $u = new Users;

        //POST

        if (isset($_POST["delete_user"])) {
            $u->delete_User($_POST["users_id"]);
            header("Location:" . base_url . "index.php?controllers=users&action=adminConfiguration");
        }

        if (isset($_POST["user_as_moderator"])) {
            $u->setUser_as_moderator($_POST["users_id"]);
            header("Location:" . base_url . "index.php?controllers=users&action=adminConfiguration");
        }

        if (isset($_POST["user_as_user"])) {
            $u->setUser_as_user($_POST["users_id"]);
            header("Location:" . base_url . "index.php?controllers=users&action=adminConfiguration");
        }

        //INFORMATION

        $All_posts = $p->getAll_Posts()->num_rows;
        $All_users = $u->getAll_users()->num_rows;
        $All_comments = $c->getAll_comments()->num_rows;
        $All_likes = $p->get_all_likes_of_the_posts()->num_rows;

        //PAGINATION

        $filas_por_pagina = 10;

        if (isset($_GET["pag"])) {
            $pag = $_GET["pag"];
        } else {
            $pag = 1;
        }

        $empezar_desde = ($pag - 1) * $filas_por_pagina;

        $numero_filas = $All_users;

        $numero_paginas = ceil($numero_filas / $filas_por_pagina);

        //PAGINATION

        $result = $u->getAll_users_paginated($empezar_desde, $filas_por_pagina);

        $All_users_info = [];
        $count = 0;

        while ($array = $result->fetch_assoc()) {
            $All_users_info[$count]["users_name"] = $array["users_name"];
            $All_users_info[$count]["users_id"] = $array["users_id"];
            $All_users_info[$count]["users_rol"] = $array["users_rol"];
            $All_users_info[$count]["users_email"] = $array["users_email"];
            $All_users_info[$count]["users_profile_photo"] = $array["users_profile_photo"];
            $count++;
        }

        if (isset($_POST["pdf"])) {

            header("Location:" . base_url . "views/user/pdf.php");

        }

        require "views/user/configuration.php";
        
    }
}
