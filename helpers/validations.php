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
                    $err["error_name"]["long_name"] = "El nombre que has introducido es demasiado largo. Máximo 25 letras.";
                }

            }

            //BIRTH DATE VALIDATION

            $time = explode("-", $data[1], 3); 
            $time = mktime(0,0,0,$time[1],$time[2],$time[0]);
            $age= (int)((time()-$time)/31556926);

            if ($age < 18) {
                $err["younger"] = "Para registrarte en ForoCarros has de ser mayor de edad.";
            }

            //PASSWORD VALIDATION

            if ($data[2] == $data[3]) {

                if (strlen($data[2]) < 6) {
                    $err["password"]["short"] = "La contraseña debe tener almenos 6 carácteres";
                }

                if (!preg_match('`[a-z]`',$data[2])) {
                    $err["password"]["lowercase_missing"] = "La contraseña debe contener almenos una minúscula";
                }

                if (!preg_match('`[A-Z]`',$data[2])) {
                    $err["password"]["uppercase_missing"] = "La contraseña debe contener almenos una mayúscula";
                }

                if (!preg_match('`[0-9]`',$data[2])) {
                    $err["password"]["number_missing"] = "La contraseña debe tener almenos un número";
                }

            } else {
                $err["password"]["not_match"] = "Las contraseñas que has introducido no coinciden";
            }

            // EMAIL VALIDATION

            if (!(false !== filter_var($data[4], FILTER_VALIDATE_EMAIL))) {
                $err["email"]["format"] = "Formato de correo electrónico incorrecto";
            }

            return $err;

        }

    }

?>