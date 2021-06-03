<?php

require_once "models/users.php";
require_once "models/topics.php";
require_once "models/posts.php";

    class PostController {

        public function view() {

            $p = new Posts;
            $user = new Users;
            $topic = new Topics;

            $result = $p->getPosts_by_id($_POST["id"]);

            while ($obj = $result->fetch_object()) {
                $Posts_info["posts_id"] = $obj->posts_id;
                $Posts_info["posts_title"] = $obj->posts_title;
                $Posts_info["posts_text"] = $obj->posts_text;
                $Posts_info["posts_date"] = $obj->posts_date;
                $Posts_info["posts_last_modification_date"] = $obj->posts_last_modification_date;
                $Posts_info["posts_visits_counter"] = $obj->posts_visits_counter;
                $Posts_info["users_name"] = $user->getUser_name_by_id($obj->users_id);
                $Posts_info["topics_name"] = $topic->getTopics_name_by_id($obj->topics_id);
            }

            require "views/post/ViewPost.php";

        }

    }

?>