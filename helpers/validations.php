<?php 

    class Validations {

        public static function registration_validation($data) {

            $err = [];

            //NAME VALIDATION

            if (strlen($data[0]) == 0) {
                $err["error_name"]["empty_name"] =  "No has introducido el nombre.";
            } else if (strlen($data[0]) < 25) {

                if (strpos($data[0], " ")) {
                    $err["error_name"]["contains_spaces"] = "El nombre no puede contener espacios.";
                }
                
            } else {

                if (strlen($data[0] >= 25)) {
                    $err["error_name"]["long_name"] = "El nombre que has introducido es demasiado largo.";
                }

            }

            //BIRTH DATE VALIDATION

            //PASSWORD VALIDATION

            //EMAIL VALIDATION

            return $err;

        }

    }

?>