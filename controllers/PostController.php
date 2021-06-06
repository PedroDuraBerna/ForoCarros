<?php

require_once "models/users.php";
require_once "models/topics.php";
require_once "models/posts.php";
require_once "models/comments.php";

    class PostController {

        public function view() {    
            
            $p = new Posts;
            $user = new Users;
            $topic = new Topics;
            $c = new Comments;

            if (isset($_POST["delete_comment"])) {
                $c->delete_comment($_POST["comment_id"]);
            }

            if (isset($_POST["delete_post"])) {
                $p->delete_post($_POST["post_id"]);
                header("Location:" . base_url);
            }

            //POST INFO

            $result = $p->getPosts_by_id($_GET["id"]);

            $Posts_info["posts_id"] = $result["posts_id"];
            $Posts_info["posts_title"] = $result["posts_title"];
            $Posts_info["posts_text"] = $result["posts_text"];
            $Posts_info["posts_date"] = $result["posts_date"];
            $Posts_info["posts_last_modification_date"] = $result["posts_last_modification_date"];
            $Posts_info["posts_visits_counter"] = $result["posts_visits_counter"];
            $Posts_info["users_name"] = $user->getUser_name_by_id($result["users_id"]);
            $Posts_info["topics_name"] = $topic->getTopics_name_by_id($result["topics_id"]);
            $Posts_info["users_proflile_photo"] = $user->getUsers_profile_photo_by_name($user->getUser_name_by_id($result["users_id"]));
            $Posts_info["users_sign"] = $user->getUsers_sign_by_name($user->getUser_name_by_id($result["users_id"]));
            $Posts_info["users_rol"] = $user->getUsers_rol_by_name($user->getUser_name_by_id($result["users_id"]));

            //COMMENTS INFO

            //PAGINATION

            $filas_por_pagina = 10;

            if (isset($_GET["pag"])) {
                $pag = $_GET["pag"];
            } else {
                $pag = 1;
            }

            $empezar_desde = ($pag - 1) * $filas_por_pagina;

            $result1 = $c->getAll_comments_by_posts_id($Posts_info["posts_id"]);

            $numero_filas = $result1->num_rows;

            $numero_paginas = ceil ($numero_filas/$filas_por_pagina);

            //PAGINATION

            $result2 = $c->getAll_comments_by_id_paginated($empezar_desde, $filas_por_pagina, $Posts_info["posts_id"]);

            $All_Comments = [];
            $count = 0;

            while ($array = $result2->fetch_assoc()) {
                $All_Comments[$count]["comments_id"] = $array["comments_id"];
                $All_Comments[$count]["comments_text"] = $array["comments_text"];
                $All_Comments[$count]["comments_date"] = $array["comments_date"];
                $All_Comments[$count]["users_name"] = $user->getUser_name_by_id($array["users_id"]);;
                $All_Comments[$count]["users_proflile_photo"] = $user->getUsers_profile_photo_by_name($user->getUser_name_by_id($array["users_id"]));
                $All_Comments[$count]["users_sign"] = $user->getUsers_sign_by_name($user->getUser_name_by_id($array["users_id"]));
                $All_Comments[$count]["users_rol"] = $user->getUsers_rol_by_name($user->getUser_name_by_id($array["users_id"]));
                $count++;
            }

            require "views/post/ViewPost.php";

        }

    }

?>