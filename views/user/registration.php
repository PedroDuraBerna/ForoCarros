
<!-- STYLE -->

    <style>
        #registrationIcon {
            background-color: #a52a2a;
        }
    </style>

<!-- STYLE -->

<h1>Registrarse en ForoCarros</h1>

<form action="<?=base_url?>users/save" method="POST">

<div class="container">
    <h2>Información requerida</h2>
        <table>
            <tr>
                <td>
                    <label for="user_name">Nombre de usuario:</label>
                </td>
                <td>
                    <input type="text" name="user_name" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p>Nombre para iniciar sesión en ForoCarros. Con este nombre será el que aparezca en el foro como tu identificador, por lo que es único. Recomendamos usar un nombre ficticio si quieres conservar tu anonimato.</p> 
                    <br>
                    <p>Tu nombre puede tener como máximo 25 letras</p>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="user_birth_date">Fecha nacimiento:</label>
                </td>
                <td>
                    <input type="date" name="user_birth_date" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p>Has de ser mayor de edad para poder registrarte en ForoCarros.</p>
                </td>
            </tr>
            </table>
            <hr>
            <table>
            <tr>
                <td>
                    <label for="user_password">Contraseña:</label>
                </td>
                <td>
                    <input type="password" name="user_password" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p>Introduce una contraseña mayor o igual a 8 carácteres. Debe contener alemons una minúscula, una mayúscula y un número.</p>
                </td>
            </tr>
            <tr>
                <td>
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
                <td>
                    <label for="user_email">Email:</label>
                </td>
                <td>
                    <input type="text" name="user_email" required>
                </td>
            </tr>
            <tr>
                <td></td>
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
        <p>El registro a ForoCarros es gratuito, por lo que queda prohibida la compra/venta de cuentas del foro.</p>
        <br>
        <p>No se debe insultar a ningún usuario bajo ninguna circunstancia. Se puede criticar, discutir e intercambiar opiniones sin necesidad de recurrir al insulto.</p>
        <br>
        <p>No se debe hacer apología de la violencia, ni de forma verbal ni mostrando insignias, banderas o similares que puedan interpretarse como tales.</p>
        <br>
        <p>No trasladar a los foros discusiones a nivel personal con otros usuarios.Estas deben ser solucionadas en privado y no haciendo partícipes al resto de personas del foro.</p>
        <br>
        <p>No revelar ni hacer público en el foro la identidad o datos personales de ningún participante sin su consentimiento, como por ejemplo direcciones de email, ip’s externas, etc.</p>
        <br>
        <p>No enviar a los foros mensajes repetitivos; no usar los foros como soporte publicitario sin el permiso de los propietarios de la página.</p>
        <br>
        <p>Prohibido fomentar o incitar a la práctica de cualquier actividad ilegal como pueda ser la piratería, el consumo de drogas, etc…</p>
        <br>
        <p>No se debe escribir mensajes que empleen un lenguaje obsceno o blasfemo, o cualquier otra expresión que descalifique a personas, colectivos o instituciones</p>
        <br>
        <p>Ceñirse a los temas generales de cada foro. Si tienes deseos de participar en alguna conversación que no está incluida en ninguno de nuestros temas, puedes enviarnos tu sugerencia a través del formulario de contacto o en el foro de sugerencias.</p>
        <br>
        <p>Cualquier sugerencia o queja sobre el funcionamiento de los foros debe ser dirigida al foro de sugerencias, o bien al administrador.</p>
        <br>
        <p>Queda tajantemente prohibido hacer alusión a terceros, de ser asi,el usuario deberá dar a conocer su identidad.</p>
        <br>
        <p>En todo caso, el moderador será el encargado de solucionar los posibles problemas que surjan entre los usuarios o en el foro. Dado el caso, se puede recurrir en última instancia al e-mail dedicado a esta cuestión: forocarros@gmail.com</p>
        <br>
        <p>Si el usuario no está de acuerdo con alguna de estas condiciones no tiene por qué entrar en ForoCarros, y puede dirigirse a los miles de foros que abundan en Internet.</p>
        <br>
        <p>Si ha escrito un mensaje en alguna categoría del foro, no lo vuelva a repetir en otra categoría distinta, ya que será borrado. Si debido a un error, se publica su mensaje dos veces, no se preocupe, en breve un moderador lo eliminará.</p>
        <br>
        <p>Se prohibe modificar o manipular los mensajes de otros usuarios, acceder y utilizar sus correos electrónicos o suplantarlos utilizando sus contraseñas.</p>
        <br>
        <p>El usuario será responsable de los daños y perjuicios de toda naturaleza que pueda ocasionar a otros usuarios del foro o a los sistemas físicos o lógicos del mismos.</p>
        <br>
        <p>Pedro Durá Berná no será responsable de las opiniones, comentarios o utilización del foro por parte de los usuarios que contravengan estas normas.</p>
        <br>
        <p>Pedro Durá Berná no garantiza la seguridad y privacidad en la utilización del foro, ni que terceros no autorizados no puedan alterar, eliminar, modificar o interceptar cualquier mensaje o comunicación que los usuarios difundan o publiquen en los foros.</p>
        <br>
        <p>En el Lenguaje web, escribir con letras mayusculas equivale a gritar, si no es esa su intención sugerimos que lo evite.</p>
        <br>
        <p>Cualquier usuario que altere el buen funcionamiento del foro mediante reiteradas quejas, desprecio a los moderadores y/o a la administración o las normas de uso del foro será expulsado del mismo.</p>
        <br>
        <p>El establecimiento y cambio en las normas del foro no implica retroactividad en las mismas. Si en el pasado algún usuario fue expulsado o sancionado por las normas vigentes con anterioridad, debe saber que el presente y/o futuros cambios de normas no tienen carácter retroactivo, y las expulsiones y sanciones continuarán vigentes.</p>
        <br>
    </div>
    <hr>
    <p class="rules"><input type="checkbox" name="accepted_rules" id="accepted_rules"><label for="accepted_rules"><b>Haciendo click aquí acepto las normas</b></label></p>
</div>
<div id="buttons">
    <input class="button" type="submit" value="Registrarse" name="registration"><input class="button" type="submit" value="Restaurar campos">
</div>
</form>