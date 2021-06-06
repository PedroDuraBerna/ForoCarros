<?php

    class Topics {

        private $topics_id;
        private $topics_image;
        private $topics_name;

        public function __construct() {
            $this->db = Database::connect();
        }

        function getAll_Topics() {

            $sql = "select * from topics";

            $result = $this->db->query($sql);
        
            return $result;

        }

        public function getTopics_name_by_id($id) {
            $sql = "select topics_name from topics where topics_id = '{$id}'";
            $topic = $this->db->query($sql);
            $topic = $topic->fetch_object();
            $topic_name = $topic->topics_name;
            return $topic_name;
        }

        public function getTopics_id_by_name($name) {
            $sql = "select topics_id from topics where topics_name = '{$name}'";
            $topic = $this->db->query($sql);
            $topic = $topic->fetch_object();
            $topic_id = $topic->topics_id;
            return $topic_id;
        }

    }

?>