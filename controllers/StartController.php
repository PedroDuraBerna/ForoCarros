<?php

require_once "models/posts.php";
require_once "models/topics.php";
require_once "models/users.php";

class StartController {

    public function index() {

        $posts = new Posts;
        $user = new Users;
        $topic = new Topics;

        $count = 0;

            //PAGINATION

            $filas_por_pagina = 10;

            if (isset($_SESSION["pagina"])) {
                $pagina = $_SESSION["pagina"];
            } else {
                $_SESSION["pagina"] = 1;
                $pagina = $_SESSION["pagina"];
            }

            $empezar_desde = ($pagina -1) * $filas_por_pagina;

            $result = $posts->getAll_Posts();

            $numero_filas = $result->num_rows;

            $numero_paginas = ceil ($numero_filas/$filas_por_pagina);

            $_SESSION["numero_paginas"] = $numero_paginas;

            //PAGINATION

        $result = $posts->getAll_Posts_Paginated($empezar_desde, $filas_por_pagina);

        while ($obj = $result->fetch_object()) {
            $All_Posts[$count]["posts_id"] = $obj->posts_id;
            $All_Posts[$count]["posts_title"] = $obj->posts_title;
            $All_Posts[$count]["posts_text"] = $obj->posts_text;
            $All_Posts[$count]["posts_date"] = $obj->posts_date;
            $All_Posts[$count]["posts_last_modification_date"] = $obj->posts_last_modification_date;
            $All_Posts[$count]["posts_visits_counter"] = $obj->posts_visits_counter;
            $All_Posts[$count]["users_name"] = $user->getUser_name_by_id($obj->users_id);
            $All_Posts[$count]["topics_name"] = $topic->getTopics_name_by_id($obj->topics_id);
            $count++;
        }
        
        require_once "views/start/start.php";

    }

}


?>