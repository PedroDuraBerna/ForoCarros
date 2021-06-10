<?php

require_once "models/posts.php";
require_once "models/topics.php";
require_once "models/users.php";

class StartController {

    public function index() {

        $posts = new Posts;
        $user = new Users;
        $topic = new Topics;
        $comments = new Comments;

        //INFORMATION

        $All_posts = $posts->getAll_Posts()->num_rows;
        $All_users = $user->getAll_users()->num_rows;
        $All_comments = $comments->getAll_comments()->num_rows;
        $All_likes = $posts->get_all_likes_of_the_posts()->num_rows;

            //PAGINATION

            $filas_por_pagina = 10;

            if (isset($_GET["pag"])) {
                $pag = $_GET["pag"];
            } else {
                $pag = 1;
            }

            $empezar_desde = ($pag - 1) * $filas_por_pagina;

            $result1 = $posts->getAll_Posts();

            $numero_filas = $result1->num_rows;

            $numero_paginas = ceil ($numero_filas/$filas_por_pagina);

            //PAGINATION

        $result2 = $posts->getAll_Posts_Paginated($empezar_desde, $filas_por_pagina);
        
        $All_Posts = [];
        $count = 0;
 
        while ($array = $result2->fetch_assoc()) {
            $All_Posts[$count]["posts_id"] = $array["posts_id"];
            $likes = $posts->num_likes_post($array["posts_id"]);
            $All_Posts[$count]["posts_likes"] = $likes->num_rows;
            $All_Posts[$count]["posts_title"] = $array["posts_title"];
            $All_Posts[$count]["posts_text"] = $array["posts_text"];
            $All_Posts[$count]["visibility"] = $array["visibility"];
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
        
        require_once "views/start/start.php";

    }

}


?>