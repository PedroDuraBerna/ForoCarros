<?php

    class Database{

        public static function connect() {

            $host = "localhost";
            $user = "root";
            $password = "";
            $database ="database_forocarros";

            $db = new mysqli($host,$user,$password,$database);
            $db->query("set names 'UTF-8'");
            return $db;

        }

    }

?>