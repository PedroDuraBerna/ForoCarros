<?php

    class Users {

        private $users_id;
        private $users_name;
        private $users_password;
        private $users_email;
        private $users_bio;
        private $users_sign;
        private $users_interests;
        private $users_birth_date;
        private $users_registration_date;
        private $users_last_connection_date;
        private $users_profile_photo;
        private $users_profile_visits_counter;
        private $users_rol;
        private $db;

        public function __construct() {
            $this->db = Database::connect();
        }

        function setUsers_id($users_id) {
            $this->users_id = $users_id;
        }

        function getUsers_id() {
            return $this->users_id;
        }

        function setUsers_name($users_name) {
            $this->users_name = $users_name;
        }

        function getUsers_name() {
            return $this->users_name;
        }

        function setUsers_password($users_password) {
            $this->users_password = $users_password;
        }

        function getUsers_password() {
            return $this->users_password;
        }

        function setUsers_email($users_email) {
            $this->users_email = $users_email;
        }

        function getUsers_email() {
            return $this->users_email;
        }

        function setUsers_bio($users_bio) {
            $this->users_bio = $users_bio;
        }

        function getUsers_bio() {
            return $this->users_bio;
        }

        function setUsers_sign($users_sign) {
            $this->users_sign = $users_sign;
        }

        function getUsers_sign() {
            return $this->users_sign;
        }

        function setUsers_interests($users_interests) {
            $this->users_interests = $users_interests;
        }

        function getUsers_interests() {
            return $this->users_interests;
        }

        function setUsers_birth_date($users_birth_date) {
            $this->users_birth_date = $users_birth_date;
        }

        function getUsers_birth_date() {
            return $this->users_birth_date;
        }

        function setUsers_registration_date($users_registration_date) {
            $this->users_registration_date = $users_registration_date;
        }

        function getUsers_registration_date() {
            return $this->users_registration_date;
        }

        function setUsers_last_connection_date($users_last_connection_date) {
            $this->users_last_connection_date = $users_last_connection_date;
        }

        function getUsers_last_connection_date() {
            return $this->users_last_connection_date;
        }

        function setUsers_profile_photo($users_profile_photo) {
            $this->users_profile_photo = $users_profile_photo;
        }

        function getUsers_profile_photo() {
            return $this->users_profile_photo;
        }

        function setUsers_profile_visits_counter($users_profile_visits_counter) {
            $this->users_profile_visits_counter = $users_profile_visits_counter;
        }

        function getUsers_profile_visits_counter() {
            return $this->users_profile_visits_counter;
        }

        function setUsers_rol($users_rol) {
            $this->users_rol = $users_rol;
        }

        function getUsers_rol() {
            return $this->users_rol;
        }

        public function getUser($user_name) {
            
            $user = [];
            
            $sql = "select * from users where users_name = '{$user_name}'";
            $result = $this->db->query($sql);
            $fields=mysqli_fetch_array($result);
            return $fields;
        }
        
        public function getUser_name_by_id($id) {
            $sql = "select users_name from users where users_id = '{$id}'";
            $user = $this->db->query($sql);
            $user = $user->fetch_object();
            $this->user_name = $user->users_name;
            return $this->user_name;
        }

        public function user_name_exist($user_name) {

            $sql = "select users_id from users where users_name = '{$user_name}'";

            $result = $this->db->query($sql);
            $result = $result->num_rows;

            if ($result >= 1) {
                return true;
            } else {
                return false;
            }
            
        }

        public function user_email_exist($user_email) {

            $sql = "select users_id from users where users_email = '{$user_email}'";

            $result = $this->db->query($sql);
            $result = $result->num_rows;

            if ($result >= 1) {
                return true;
            } else {
                return false;
            }

        }

        public function change_email($email) {

            $u = $_SESSION["user_information"];

            $sql = "update users set users_email = '{$email}' where users_name = '{$u["users_name"]}'";

            $this->db->query($sql);

            $u["users_email"] = $email;

            $_SESSION["user_information"] = $u;

            $_SESSION["correct_change"] = "Correo cambiado correctamente";

        }

        public function change_interests($interests) {

            $u = $_SESSION["user_information"];

            $sql = "update users set users_interests = '{$interests}' where users_name = '{$u["users_name"]}'";

            $this->db->query($sql);

            $u["users_interests"] = $interests;

            $_SESSION["user_information"] = $u;

            $_SESSION["correct_change"] = "Intereses cambiados correctamente";

        }

        public function change_bio($bio) {

            $u = $_SESSION["user_information"];

            $sql = "update users set users_bio = '{$bio}' where users_name = '{$u["users_name"]}'";

            $this->db->query($sql);

            $u["users_bio"] = $bio;

            $_SESSION["user_information"] = $u;

            $_SESSION["correct_change"] = "Biografía cambiada correctamente";

        }

        public function change_sign($sign) {

            $u = $_SESSION["user_information"];

            $sql = "update users set users_sign = '{$sign}' where users_name = '{$u["users_name"]}'";

            $this->db->query($sql);

            $u["users_sign"] = $sign;

            $_SESSION["user_information"] = $u;

            $_SESSION["correct_change"] = "Firma cambiada correctamente";

        }

        public function scape_characters($data) {

            $result = [];

            foreach ($data as $d) {
                $result[] = $this->db->real_escape_string($d);
            }

            return $result;

        }

        public function save() {

            $result = false;
            $users_password = password_hash($this->users_password, PASSWORD_BCRYPT, ["cost" => 4]);
            $sql = "insert into users (users_name, users_password, users_email, users_birth_date, users_registration_date,  users_last_connection_date, users_rol) values ('{$this->users_name}', '{$users_password}', '{$this->users_email}', '{$this->users_birth_date}', '{$this->users_registration_date}', '{$this->users_last_connection_date}', 'user')";
            $save = $this->db->query($sql);

            if ($save) {
                $result = true;
            }

            return $result;

        }

        public function login() {

            $err = [];

            $sql = "select * from users where users_name = '{$this->users_name}'";
            $login = $this->db->query($sql);

            if ($login && $login->num_rows == 1) {

                $user = $login->fetch_object();

                $verify = password_verify($this->users_password, $user->users_password);

                if (!$verify) {
                    $err["users_password_failed"] = "El usuario con esta contraseña no existe";
                }

            } else {
                $err["user_not_exist"] = "El usuario que has introducido no existe";
            }

            return $err;

        }

    }

?>