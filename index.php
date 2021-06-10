
<?php

//Controlador Frontal

session_start();

//Controllers

require "autoload.php";
require "config/db.php";
require "config/parameters.php";
require "helpers/utils.php";
require "views/layout/header.php";

//CONTROLLERS

if (isset($_GET["controllers"])) {

    //users

    if ($_GET["controllers"] == "users") {
        if (isset($_GET["action"])) {

            $u = new UsersController;

            //ACTIONS

            if ($_GET["action"] == "login") {
                $usr = $u->login();
            }

            if ($_GET["action"] == "logout") {
                $u->logout();
            }

            if ($_GET["action"] == "registration") {
                $u->registration();
            }

            if ($_GET["action"] == "save") {
                $u->save();
            }

            if ($_GET["action"] == "myprofile") {
                $u->myprofile();
            }

            if ($_GET["action"] == "post") {
                $u->post();
            }

            if ($_GET["action"] == "change_email") {
                $u->change_email();
            }

            if ($_GET["action"] == "change_interests") {
                $u->change_interests();
            }

            if ($_GET["action"] == "change_bio") {
                $u->change_bio();
            }

            if ($_GET["action"] == "change_sign") {
                $u->change_sign();
            }

            if ($_GET["action"] == "change_users_photo") {
                $u->change_users_photo();
            }

            if ($_GET["action"] == "publicprofile") {
                $u->public_profile();
            }

            if ($_GET["action"] == "comment") {
                $u->comment();
            }

            if ($_GET["action"] == "adminConfiguration") {
                if (isset($_SESSION["user_information"])) {
                    if ($_SESSION["user_information"]["users_rol"] == "admin") {
                        $u->adminConfiguration();
                    } else {
                        echo "no eres admin";
                    }
                } else {
                    echo "no eres admin";
                }
            }
        }
    }

    //start

    if ($_GET["controllers"] == "start") {
        if (isset($_GET["action"])) {

            $s = new StartController;

            //ACTIONS

            if ($_GET["action"] == "index") {
                $s->index();
            }
        }
    }

    //post

    if ($_GET["controllers"] == "post") {
        if (isset($_GET["action"])) {

            $p = new PostController;

            //ACTIONS

            if ($_GET["action"] == "view") {
                $p->view();
            }

            if ($_GET["action"] == "viewpost") {
                if (isset($_GET["name"])) {
                    $p->view_all_posts_by_users_name($_GET["name"]);
                }
            }
        }
    }

    //topics

    if ($_GET["controllers"] == "topics") {
        if (isset($_GET["action"])) {

            $t = new TopicsController;

            //ACTIONS

            if ($_GET["action"] == "all") {
                $t->all();
            }

            if ($_GET["action"] == "General") {
                $t->General();
            }

            if ($_GET["action"] == "Anime") {
                $t->Anime();
            }

            if ($_GET["action"] == "Deportes") {
                $t->Deportes();
            }

            if ($_GET["action"] == "Informática") {
                $t->Informática();
            }

            if ($_GET["action"] == "Videojuegos") {
                $t->Videojuegos();
            }

            if ($_GET["action"] == "Música") {
                $t->Música();
            }

            if ($_GET["action"] == "Series") {
                $t->Series();
            }

            if ($_GET["action"] == "Cine") {
                $t->Cine();
            }

            if ($_GET["action"] == "Humor") {
                $t->Humor();
            }

            if ($_GET["action"] == "Política") {
                $t->Política();
            }

            if ($_GET["action"] == "Viajes") {
                $t->Viajes();
            }

            if ($_GET["action"] == "Economía") {
                $t->Economía();
            }

            if ($_GET["action"] == "Cocina") {
                $t->Cocina();
            }

            if ($_GET["action"] == "Arte") {
                $t->Arte();
            }

            if ($_GET["action"] == "Historia") {
                $t->Historia();
            }

            if ($_GET["action"] == "Moda") {
                $t->Moda();
            }

            if ($_GET["action"] == "Animales") {
                $t->Animales();
            }

            if ($_GET["action"] == "Paranormal") {
                $t->Paranormal();
            }

            if ($_GET["action"] == "Conspiraciones") {
                $t->Conspiraciones();
            }

            if ($_GET["action"] == "Carros") {
                $t->Carros();
            }
        }
    }
} else {
    $s = new StartController;
    $s->index();
    require_once "views/start/start.php";
}

require_once "views/layout/footer.php";

?>

