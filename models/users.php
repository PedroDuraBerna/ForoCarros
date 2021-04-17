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

        public function save() {

            $result = false;

            $sql = "insert into users (users_name, users_password, users_email, users_birth_date, users_registration_date,  users_last_connection_date, users_rol) values ('{$this->users_name}', '{$this->users_password}', '{$this->users_email}', '{$this->users_birth_date}', '{$this->users_registration_date}', '{$this->users_last_connection_date}', 'admin')";
            $save = $this->db->query($sql);

            if ($save) {
                $result = true;
            }

            return $result;

        }

    }

?>