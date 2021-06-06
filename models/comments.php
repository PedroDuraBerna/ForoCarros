<?php 

    class Comments {

        private $comments_id;
        private $comments_text;
        private $comments_date;
        private $posts_id;
        private $users_id;

        public function __construct() {
            $this->db = Database::connect();
        }

        function setComments_id($comments_id) {
            $this->comments_id = $comments_id;
        }

        function getComments_id() {
            return $this->comments_id;
        }

        function setComments_text($comments_text) {
            $this->comments_text = $comments_text;
        }

        function getComments_text() {
            return $this->comments_text;
        }

        function setComments_date($comments_date) {
            $this->comments_date = $comments_date;
        }

        function getComments_date() {
            return $this->comments_date;
        }

        function setPosts_id($posts_id) {
            $this->posts_id = $posts_id;
        }

        function getPosts_id() {
            return $this->posts_id;
        }

        function setUsers_id($users_id) {
            $this->users_id = $users_id;
        }

        function getUsers_id() {
            return $this->users_id;
        }

        public function insert_comment($comments_text, $comments_date, $posts_id, $users_id) {

            $sql = "Insert into comments (comments_text, comments_date, posts_id, users_id) values ('" . htmlspecialchars($comments_text) . "', '{$comments_date}', '{$posts_id}', '{$users_id}')";

            $this->db->query($sql);

            return $sql;

        }

        public function getAll_comments_by_posts_id($posts_id) {

            $sql = "select * from comments where posts_id = $posts_id";

            $result = $this->db->query($sql);

            return $result;

        }

        public function getAll_comments_by_id_paginated($empezar_desde, $filas_por_pagina, $posts_id) {

            $sql = "select * from comments where posts_id = $posts_id order by comments_date desc limit $empezar_desde, $filas_por_pagina";

            $result = $this->db->query($sql);

            return $result;

        }

        public function delete_comment($comment_id) {

            $sql = "delete from comments where comments_id = $comment_id";

            $result = $this->db->query($sql);

            return $result;

        }

    }

?>