
<!-- STYLE -->

    <style>
        .registrationIcon {
            background-color: #a52a2a;
        }
        .dark_mode .registrationIcon {
            background-color: #222;
        }
    </style>

<!-- STYLE -->

<h1>Registrarse en ForoCarros</h1>

<?php 

    if (isset($_SESSION["status_registration"])) {
        if ($_SESSION["status_registration"] == "failed") {
            echo "<div class='container'>";   
            echo "<h2>Error en el registro del usuario</h2>";
            echo "<p class='err'>Revisa los datos del formulario.</p>";
            echo "</div>";
        } else {
            echo "<div class='container'>";   
            echo "<h2>Usuario registrado correctamente</h2>";
            echo "<p class='ok'>Ya puedes logearte con tu nuevo usuario.</p>";
            echo "</div>";
        }
    }

?>

<form action="<?=base_url?>index.php?controllers=users&action=save" method="POST">

<div class="container">
    <h2>Información requerida</h2>
        <table>
            <tr>
                <td class="izq">
                    <label for="user_name">Nombre de usuario:</label>
                </td>
                <td>
                    <input type="text" name="user_name" <?php if (isset($_SESSION["info"][0])) echo "value='{$_SESSION["info"][0]}'" ?> required>
                </td>
            </tr>
            <tr>
                <td class="izq">
                    <?php 
                        if (isset($_SESSION["registration"]["error_name"]["empty_name"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["error_name"]["empty_name"] . "</p>";
                        }
                        if (isset($_SESSION["registration"]["error_name"]["contains_spaces"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["error_name"]["contains_spaces"] . "</p>";
                        }
                        if (isset($_SESSION["registration"]["error_name"]["long_name"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["error_name"]["long_name"] . "</p>";
                        }
                        if (isset($_SESSION["registration"]["user_name"]["exist"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["user_name"]["exist"] . "</p>";
                        }
                    ?>
                </td>
                <td>
                    <p>Nombre para iniciar sesión en ForoCarros. Con este nombre será el que aparezca en el foro como tu identificador, por lo que es único. Recomendamos usar un nombre ficticio si quieres conservar tu anonimato.</p> 
                    <br>
                    <p>Tu nombre puede tener como máximo 25 letras.</p>
                </td>
            </tr>
            <tr>
                <td class="izq">
                    <label for="user_birth_date">Fecha nacimiento:</label>
                </td>
                <td>
                    <input type="date" name="user_birth_date" <?php if (isset($_SESSION["info"][0])) echo "value='{$_SESSION["info"][1]}'" ?> required>
                </td>
            </tr>
            <tr>
                <td class="izq">
                    <?php 
                        if (isset($_SESSION["registration"]["younger"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["younger"] . "</p>";
                        }
                    ?>
                </td>
                <td>
                    <p>Has de ser mayor de edad para poder registrarte en ForoCarros.</p>
                </td>
            </tr>
            </table>
            <hr>
            <table>
            <tr>
                <td class="izq">
                    <label for="user_password">Contraseña:</label>
                </td>
                <td>
                    <input type="password" name="user_password" required>
                </td>
            </tr>
            <tr>
                <td class="izq">
                    <?php
                        if (isset($_SESSION["registration"]["password"]["short"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["password"]["short"] . "</p>";
                        }
                        if (isset($_SESSION["registration"]["password"]["lowercase_missing"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["password"]["lowercase_missing"] . "</p>";
                        }
                        if (isset($_SESSION["registration"]["password"]["uppercase_missing"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["password"]["uppercase_missing"] . "</p>";
                        }
                        if (isset($_SESSION["registration"]["password"]["number_missing"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["password"]["number_missing"] . "</p>";
                        }
                        if (isset($_SESSION["registration"]["password"]["not_match"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["password"]["not_match"] . "</p>";
                        }
                    ?>
                </td>
                <td>
                    <p>Introduce una contraseña que contenga almenos 6 carácteres. Debe contener alemons una minúscula, una mayúscula y un número.</p>
                </td>
            </tr>
            <tr>
                <td class="izq">
                    <label for="user_password_repited">Confirmar contraseña:</label>
                </td>
                <td>
                    <input type="password" name="user_password_repited" required>
                </td>
            </tr>
            </table>
            <hr>
            <table>
            <tr>
                <td class="izq">
                    <label for="user_email">Email:</label>
                </td>
                <td>
                    <input id="email_form" type="text" name="user_email" <?php if (isset($_SESSION["info"][0])) echo "value='{$_SESSION["info"][4]}'" ?> required>
                </td>
            </tr>
            <tr>
                <td class="izq">
                    <p class="err" id="error_email"></p>
                    <?php
                        if (isset($_SESSION["registration"]["email"]["format"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["email"]["format"] . "</p>";
                        }
                        if (isset($_SESSION["registration"]["user_email"]["exist"])) {
                            echo "<p class='err'>" . $_SESSION["registration"]["user_email"]["exist"] . "</p>";
                        }
                    ?>
                </td>
                <td>
                    <p>Introduce un formato de correo electrónico válido.</p>
                </td>
            </tr>
        </table>
</div>

<div class="container">
    <h2>Normas del foro</h2>
    <p class="note">Para registrarte en ForoCarros debes aceptar las normas del foro:</p>
    <div class="containerInside">
        <h3>Reglas de ForoCarros</h3>
        <br>
        <p>1.  El registro a ForoCarros es gratuito, por lo que queda prohibida la compra/venta de cuentas del foro.</p>
        <br>
        <p>2.  No se debe insultar a ningún usuario bajo ninguna circunstancia. Se puede criticar, discutir e intercambiar opiniones sin necesidad de recurrir al insulto.</p>
        <br>
        <p>3.  No se debe hacer apología de la violencia, ni de forma verbal ni mostrando insignias, banderas o similares que puedan interpretarse como tales.</p>
        <br>
        <p>4.  No trasladar a los foros discusiones a nivel personal con otros usuarios.Estas deben ser solucionadas en privado y no haciendo partícipes al resto de personas del foro.</p>
        <br>
        <p>5.  No revelar ni hacer público en el foro la identidad o datos personales de ningún participante sin su consentimiento, como por ejemplo direcciones de email, ip’s externas, etc.</p>
        <br>
        <p>6.  No enviar a los foros mensajes repetitivos; no usar los foros como soporte publicitario sin el permiso de los propietarios de la página.</p>
        <br>
        <p>7.  Prohibido fomentar o incitar a la práctica de cualquier actividad ilegal como pueda ser la piratería, el consumo de drogas, etc…</p>
        <br>
        <p>8.  No se debe escribir mensajes que empleen un lenguaje obsceno o blasfemo, o cualquier otra expresión que descalifique a personas, colectivos o instituciones</p>
        <br>
        <p>9.  Ceñirse a los temas generales de cada foro. Si tienes deseos de participar en alguna conversación que no está incluida en ninguno de nuestros temas, puedes enviarnos tu sugerencia a través del formulario de contacto o en el foro de sugerencias.</p>
        <br>
        <p>10. Cualquier sugerencia o queja sobre el funcionamiento de los foros debe ser dirigida al foro de sugerencias, o bien al administrador.</p>
        <br>
        <p>11. Queda tajantemente prohibido hacer alusión a terceros, de ser asi,el usuario deberá dar a conocer su identidad.</p>
        <br>
        <p>12. En todo caso, el moderador será el encargado de solucionar los posibles problemas que surjan entre los usuarios o en el foro. Dado el caso, se puede recurrir en última instancia al e-mail dedicado a esta cuestión: forocarros@gmail.com</p>
        <br>
        <p>13. Si el usuario no está de acuerdo con alguna de estas condiciones no tiene por qué entrar en ForoCarros, y puede dirigirse a los miles de foros que abundan en Internet.</p>
        <br>
        <p>14. Si ha escrito un mensaje en alguna categoría del foro, no lo vuelva a repetir en otra categoría distinta, ya que será borrado. Si debido a un error, se publica su mensaje dos veces, no se preocupe, en breve un moderador lo eliminará.</p>
        <br>
        <p>15. Se prohibe modificar o manipular los mensajes de otros usuarios, acceder y utilizar sus correos electrónicos o suplantarlos utilizando sus contraseñas.</p>
        <br>
        <p>16. El usuario será responsable de los daños y perjuicios de toda naturaleza que pueda ocasionar a otros usuarios del foro o a los sistemas físicos o lógicos del mismos.</p>
        <br>
        <p>17. Pedro Durá Berná no será responsable de las opiniones, comentarios o utilización del foro por parte de los usuarios que contravengan estas normas.</p>
        <br>
        <p>18. Pedro Durá Berná no garantiza la seguridad y privacidad en la utilización del foro, ni que terceros no autorizados no puedan alterar, eliminar, modificar o interceptar cualquier mensaje o comunicación que los usuarios difundan o publiquen en los foros.</p>
        <br>
        <p>19. En el Lenguaje web, escribir con letras mayusculas equivale a gritar, si no es esa su intención sugerimos que lo evite.</p>
        <br>
        <p>20. Cualquier usuario que altere el buen funcionamiento del foro mediante reiteradas quejas, desprecio a los moderadores y/o a la administración o las normas de uso del foro será expulsado del mismo.</p>
        <br>
        <p>21. El establecimiento y cambio en las normas del foro no implica retroactividad en las mismas. Si en el pasado algún usuario fue expulsado o sancionado por las normas vigentes con anterioridad, debe saber que el presente y/o futuros cambios de normas no tienen carácter retroactivo, y las expulsiones y sanciones continuarán vigentes.</p>
        <br>
    </div>
        <?php
            if (isset($_SESSION["registration"]["accepted_rules"])) {
                echo "<p class='err'>" . $_SESSION["registration"]["accepted_rules"] . "</p>";
            }
        ?>
    <hr>
    <p class="rules"><input type="checkbox" name="accepted_rules" value="accepted_rules" id="accepted_rules"><label for="accepted_rules"><b>Haciendo click aquí acepto las normas</b></label></p>
</div>
<div id="buttons">
    <input class="button" type="submit" value="Registrarse" name="registration"><input class="button" type="submit" value="Restaurar campos">
</div>
</form>

<?php 

    Utils::deleteSession("info");
    Utils::deleteSession("registration");
    Utils::deleteSession("status_registration");

?>