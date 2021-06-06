<?php

require_once "models/users.php";
require_once "models/topics.php";
require_once "models/posts.php";

    class PostController {

        public function view() {

            $p = new Posts;
            $user = new Users;
            $topic = new Topics;

            $result = $p->getPosts_by_id($_GET["id"]);

            $Posts_info["posts_id"] = $result["posts_id"];
            $Posts_info["posts_title"] = $result["posts_title"];
            $Posts_info["posts_text"] = $result["posts_text"];
            $Posts_info["posts_date"] = $result["posts_date"];
            $Posts_info["posts_last_modification_date"] = $result["posts_last_modification_date"];
            $Posts_info["posts_visits_counter"] = $result["posts_visits_counter"];
            $Posts_info["users_name"] = $user->getUser_name_by_id($result["users_id"]);
            $Posts_info["topics_name"] = $topic->getTopics_name_by_id($result["topics_id"]);

            require "views/post/ViewPost.php";

        }

    }

?>