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

            $p->add_visit($_GET["id"]);

            if (isset($_POST["delete_comment"])) {
                $c->delete_comment($_POST["comment_id"]);
                $p->rest_visit($_GET["id"]);
            }

            if (isset($_POST["delete_post"])) {
                $p->delete_post($_POST["post_id"]);
                header("Location:" . base_url);
            }

            if (isset($_POST["liked"])) {
                $p->like_post($_SESSION["user_information"]["users_id"],$_POST["post_id"]);
                $p->rest_visit($_GET["id"]);
            }

            if (isset($_POST["not_liked"])) {
                $p->delete_liked_post($_SESSION["user_information"]["users_id"],$_POST["post_id"]);
                $p->rest_visit($_GET["id"]);
            }

            //POST INFO

            $result = $p->getPosts_by_id($_GET["id"]);

            $Posts_info["posts_id"] = $result["posts_id"];
            $Posts_info["posts_title"] = $result["posts_title"];
            $Posts_info["posts_text"] = $result["posts_text"];
            $Posts_info["posts_date"] = $result["posts_date"];
            $result["posts_last_modification_date"] = date_create($result["posts_last_modification_date"]);
            $Posts_info["posts_last_modification_date"] = date_format($result["posts_last_modification_date"], "d/m/y H:i:s");
            $Posts_info["posts_visits_counter"] = $result["posts_visits_counter"];
            $Posts_info["users_name"] = $user->getUser_name_by_id($result["users_id"]);
            $Posts_info["topics_name"] = $topic->getTopics_name_by_id($result["topics_id"]);
            $Posts_info["users_proflile_photo"] = $user->getUsers_profile_photo_by_name($user->getUser_name_by_id($result["users_id"]));
            $Posts_info["users_sign"] = $user->getUsers_sign_by_name($user->getUser_name_by_id($result["users_id"]));
            $Posts_info["users_rol"] = $user->getUsers_rol_by_name($user->getUser_name_by_id($result["users_id"]));
            $likes = $p->num_likes_post($Posts_info["posts_id"]);
            $Post_info["posts_likes"] = $likes->num_rows;
            
            if (isset($_SESSION["user_information"])) {
                $liked = $p->check_liked_post($_SESSION["user_information"]["users_id"],$Posts_info["posts_id"]);
                $liked = $liked->num_rows;
                if ($liked > 0) {
                    $Posts_info["posts_liked"] = "true"; 
                } else {
                    $Posts_info["posts_liked"] = "false";
                }
            }

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
                $All_Comments[$count]["comments_date"] = date_format(date_create($array["comments_date"]), "d/m/y H:i:s");
                $All_Comments[$count]["users_name"] = $user->getUser_name_by_id($array["users_id"]);
                $All_Comments[$count]["users_proflile_photo"] = $user->getUsers_profile_photo_by_name($user->getUser_name_by_id($array["users_id"]));
                $All_Comments[$count]["users_sign"] = $user->getUsers_sign_by_name($user->getUser_name_by_id($array["users_id"]));
                $All_Comments[$count]["users_rol"] = $user->getUsers_rol_by_name($user->getUser_name_by_id($array["users_id"]));
                $count++;
            }

            require "views/post/ViewPost.php";

        }

        public function view_all_posts_by_users_name($users_name) {

            $posts = new Posts;
            $user = new Users;
            $topic = new Topics;
            $comments = new Comments;
    
                //PAGINATION
    
                $filas_por_pagina = 10;
    
                if (isset($_GET["pag"])) {
                    $pag = $_GET["pag"];
                } else {
                    $pag = 1;
                }
    
                $empezar_desde = ($pag - 1) * $filas_por_pagina;
    
                $users_id = $user->getUsers_id_by_name($users_name);

                $result = $posts->getAll_posts_by_users_id($users_id["users_id"]);
    
                $numero_filas = $result->num_rows;
    
                $numero_paginas = ceil ($numero_filas/$filas_por_pagina);
    
                //PAGINATION
    
            $result2 = $posts->getAll_posts_by_users_id_paginated($empezar_desde, $filas_por_pagina, $users_id["users_id"]);
            
            $All_Posts = [];
            $count = 0;
     
            while ($array = $result2->fetch_assoc()) {
                $All_Posts[$count]["posts_id"] = $array["posts_id"];
                $likes = $posts->num_likes_post($array["posts_id"]);
                $All_Posts[$count]["posts_likes"] = $likes->num_rows;
                $All_Posts[$count]["posts_title"] = $array["posts_title"];
                $All_Posts[$count]["posts_text"] = $array["posts_text"];
                $All_Posts[$count]["posts_date"] = $array["posts_date"];
                $All_Posts[$count]["posts_last_modification_date"] = $array["posts_last_modification_date"];
                $All_Posts[$count]["posts_last_modification_date"] = date_create($All_Posts[$count]["posts_last_modification_date"]);
                $All_Posts[$count]["posts_last_modification_date"] = date_format($All_Posts[$count]["posts_last_modification_date"], "d/m/y H:i:s");
                $All_Posts[$count]["posts_visits_counter"] = $array["posts_visits_counter"];
                $All_Posts[$count]["users_name"] = $user->getUser_name_by_id($array["users_id"]);
                $All_Posts[$count]["topics_name"] = $topic->getTopics_name_by_id($array["topics_id"]);
                $All_Posts[$count]["num_comments_posts"] = $comments->getAll_comments_by_posts_id($array["posts_id"])->num_rows;
                $count++;
            }

            require_once "views/user/allUsersPosts.php";

        }

    }

?>