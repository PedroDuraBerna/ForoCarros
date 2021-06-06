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
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Anime() {
        $info = "Anime";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Deportes() {
        $info = "Deportes";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Informática() {
        $info = "Informática";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Videojuegos() {
        $info = "Videojuegos";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Música() {
        $info = "Música";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Series() {
        $info = "Series";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Cine() {
        $info = "Cine";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Humor() {
        $info = "Humor";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Política() {
        $info = "Política";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Viajes() {
        $info = "Viajes";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Economía() {
        $info = "Economía";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Cocina() {
        $info = "Cocina";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Arte() {
        $info = "Arte";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Historia() {
        $info = "Historia";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Moda() {
        $info = "Moda";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Animales() {
        $info = "Animales";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Paranormal() {
        $info = "Paranormal";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Conspiraciones() {
        $info = "Conspiraciones";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

    public function Carros() {
        $info = "Carros";
        require_once "helpers/get_all_posts_by_topics_id.php";
        require_once "views/topics/topic.php";
    }

}

?>