<?php

require_once "models/topics.php";
require_once "models/posts.php";
require_once "models/users.php";

class TopicsController {

    public function all() {

        $All_Topics = [];
        $count = 0;

        $Topic = new Topics;
        $result = $Topic->getAll_Topics();

        while ($obj = $result->fetch_object()) {
            $All_Topics[$count]["Name"] = $obj->topics_name;
            $All_Topics[$count]["Image"] = $obj->topics_image;
            $count++;
        }

        require_once "views/topics/all.php";
    }

    public function General() {
        $info = "General";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Anime() {
        $info = "Anime";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Deportes() {
        $info = "Deportes";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Informática() {
        $info = "Informática";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Videojuegos() {
        $info = "Videojuegos";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Música() {
        $info = "Música";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Series() {
        $info = "Series";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Cine() {
        $info = "Cine";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Humor() {
        $info = "Humor";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Política() {
        $info = "Política";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Viajes() {
        $info = "Viajes";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Economía() {
        $info = "Economía";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Cocina() {
        $info = "Cocina";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Arte() {
        $info = "Arte";
        require_once "views/topics/topic.php";
    }

    public function Historia() {
        $info = "Historia";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Moda() {
        $info = "Moda";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Animales() {
        $info = "Animales";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Paranormal() {
        $info = "Paranormal";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Conspiraciones() {
        $info = "Conspiraciones";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

    public function Carros() {
        $info = "Carros";
        $All_Posts = get_posts($info);
        require_once "views/topics/topic.php";
    }

}

function get_posts($info) {

        $count = 0;
        $t = new Topics;
        $p = new Posts;
        $u = new Users;

            //PAGINATION

            $filas_por_pagina = 10;

            if (isset($_SESSION["pagina_topic"])) {
                $pagina = $_SESSION["pagina_topic"];
            } else {
                $_SESSION["pagina_topic"] = 1;
                $pagina = $_SESSION["pagina_topic"];
            }

            $empezar_desde = ($pagina -1) * $filas_por_pagina;

            $result = $p->getAll_posts_by_topics_id($t->getTopics_id_by_name($info));

            $numero_filas = $result->num_rows;

            $numero_paginas = ceil ($numero_filas/$filas_por_pagina);

            $_SESSION["numero_paginas_topic"] = $numero_paginas;

            //PAGINATION

        $result = $p->getAll_posts_by_topics_id_paginated($empezar_desde, $filas_por_pagina, $t->getTopics_id_by_name($info));

        while ($obj = $result->fetch_object()) {
            $All_Posts[$count]["posts_id"] = $obj->posts_id;
            $All_Posts[$count]["posts_title"] = $obj->posts_title;
            $All_Posts[$count]["posts_text"] = $obj->posts_text;
            $All_Posts[$count]["posts_date"] = $obj->posts_date;
            $All_Posts[$count]["posts_last_modification_date"] = $obj->posts_last_modification_date;
            $All_Posts[$count]["posts_visits_counter"] = $obj->posts_visits_counter;
            $All_Posts[$count]["users_name"] = $u->getUser_name_by_id($obj->users_id);
            $All_Posts[$count]["topics_name"] = $t->getTopics_name_by_id($obj->topics_id);
            $count++;
        }

        return $All_Posts;
}

?>