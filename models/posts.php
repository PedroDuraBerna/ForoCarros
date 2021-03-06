<?php

    class Posts {

        private $posts_date;
        private $posts_title;
        private $posts_text;
        private $posts_last_modification_date;
        private $posts_visits_counter;
        private $posts_image;
        private $posts_users_id;
        private $posts_topics_id;
        private $posts_visibility;

        function setPosts_date($posts_date) {
            $this->posts_date = $posts_date;
        }

        function getPosts_date() {
            return $this->posts_date;
        }

        function setPosts_title($posts_title) {
            $this->posts_title = $posts_title;
        }

        function getPosts_title() {
            return $this->posts_title;
        }

        function setPosts_text($posts_text) {
            $this->posts_text = $posts_text;
        }

        function getPosts_text() {
            return $this->posts_text;
        }

        function setPosts_last_modification_date($posts_last_modification_date) {
            $this->posts_last_modification_date = $posts_last_modification_date;
        }

        function getPosts_last_modification_date() {
            return $this->posts_last_modification_date;
        }

        function setPosts_visits_counter($posts_visits_counter) {
            $this->posts_visits_counter = $posts_visits_counter;
        }

        function getPosts_visits_counter() {
            return $this->posts_visits_counter;
        }

        function setPosts_image($posts_image) {
            $this->posts_image = $posts_image;
        }

        function getPosts_image() {
            return $this->posts_image;
        }

        function setPosts_users_id($posts_users_id) {
            $this->posts_users_id = $posts_users_id;
        }

        function getPosts_users_id() {
            return $this->posts_users_id;
        }

        public function __construct() {
            $this->db = Database::connect();
        }

        function setPosts_topics_id($posts_topics_id) {
            $this->posts_topics_id = $posts_topics_id;
        }

        function getPosts_topics_id() {
            return $this->posts_topics_id;
        }

        function setPosts_visibility($posts_visibility) {
            $this->posts_visibility = $posts_visibility;
        }

        function getPosts_visibility() {
            return $this->posts_visibility;
        }

        function getAll_Posts() {

            $sql = "select * from posts";

            $result = $this->db->query($sql);

            return $result;

        }

        function getAll_Posts_Paginated($empezar_desde, $filas_por_pagina) {

            $sql = "select * from posts order by posts_last_modification_date desc limit $empezar_desde, $filas_por_pagina";

            $result = $this->db->query($sql);

            return $result;

        }

        function getAll_posts_by_users_id($users_id) {

            $sql = "select * from posts where users_id = $users_id";
            
            $result = $this->db->query($sql);

            return $result;

        }

        function get_all_likes_of_the_posts() {

            $sql = "select * from liked_posts";

            $result = $this->db->query($sql);

            return $result;
        }

        function getAll_posts_by_users_id_paginated($empezar_desde, $filas_por_pagina, $users_id) {
            
            $sql = "select * from posts where users_id = $users_id order by posts_last_modification_date desc limit $empezar_desde, $filas_por_pagina";

            $result = $this->db->query($sql);

            return $result;

        }

        function getPosts_by_id($posts_id) {

            $sql = "select * from posts where posts_id = {$posts_id}";

            $result = $this->db->query($sql);
            $fields=mysqli_fetch_array($result);

            return $fields;

        }

        function getAll_posts_by_topics_id_paginated($empezar_desde, $filas_por_pagina, $topics_id) {
            
            $sql = "select * from posts where topics_id = $topics_id order by posts_last_modification_date desc limit $empezar_desde, $filas_por_pagina";

            $result = $this->db->query($sql);

            return $result;

        }

        function getAll_posts_by_topics_id($topics_id) {

            $sql = "select * from posts where topics_id = $topics_id ";

            $result = $this->db->query($sql);

            return $result;

        }

        function insert_post() {

            $sql = "Insert into posts (posts_title, posts_text, posts_date, posts_last_modification_date, posts_visits_counter, users_id, topics_id, visibility) values ('" . htmlspecialchars($this->posts_title) . "', '" . htmlspecialchars($this->posts_text) . "', '{$this->posts_date}', '{$this->posts_last_modification_date}', '{$this->posts_visits_counter}', '{$this->posts_users_id}', '{$this->posts_topics_id}', '{$this->posts_visibility}' )";

            $this->db->query($sql);

        }

        public function delete_post($post_id) {

            $sql = "delete from liked_posts where posts_id = $post_id";

            $result = $this->db->query($sql);

            $sql = "delete from comments where posts_id = $post_id";

            $result = $this->db->query($sql);

            $sql = "delete from posts where posts_id = $post_id";

            $result = $this->db->query($sql);

            return $result;

        }

        public function num_likes_post($posts_id){

            $sql = "select * from liked_posts where posts_id = $posts_id";

            $result = $this->db->query($sql);

            return $result;

        }

        public function like_post($users_id, $posts_id) {

            $sql = "insert into liked_posts (users_id, posts_id) values ($users_id, $posts_id)";

            $result = $this->db->query($sql);

            return $result;

        }

        public function check_liked_post($users_id, $posts_id) {

            $sql = "select * from liked_posts where users_id = $users_id and posts_id = $posts_id";

            $result = $this->db->query($sql);

            return $result;

        }

        public function delete_liked_post($users_id, $posts_id) {

            $sql = "delete from liked_posts where users_id = $users_id and posts_id = $posts_id";

            $result = $this->db->query($sql);

            return $result;

        }

        public function scape_characters($data) {

            $result = $this->db->real_escape_string($data);

            return $result;

        }

        public function add_visit($posts_id) {

            $sql = ("select posts_visits_counter from posts where posts_id = $posts_id");

            $result = $this->db->query($sql);

            $result = $result->fetch_assoc();

            $visits = $result["posts_visits_counter"];

            $visits++;

            $sql = ("update posts set posts_visits_counter = $visits where posts_id = $posts_id");

            $result = $this->db->query($sql);

        }

        public function rest_visit($posts_id) {

            $sql = ("select posts_visits_counter from posts where posts_id = $posts_id");

            $result = $this->db->query($sql);

            $result = $result->fetch_assoc();

            $visits = $result["posts_visits_counter"];

            $visits--;

            $sql = ("update posts set posts_visits_counter = $visits where posts_id = $posts_id");

            $result = $this->db->query($sql);

        }

    }

?>