
<!-- STYLE -->

    <style>
        .loginIcon {
            background-color: #a52a2a;
        }
    </style>

<!-- STYLE -->

<h1>Iniciar sesión en ForoCarros</h1>

<?php
    if (isset($_SESSION["login_error"])) {
        echo "<div class='container'>";
        echo "<h2>Error en el inicio de sesión</h2>";
        if (isset($_SESSION["login_error"]["users_password_failed"])) {
            echo "<p class='err'>{$_SESSION["login_error"]["users_password_failed"]}</p>";
        } else if (isset($_SESSION["login_error"]["user_not_exist"])) {
            echo "<p class='err'>{$_SESSION["login_error"]["user_not_exist"]}</p>";
        }
        echo "</div>";
    }
?>

<div class="container">
    <h2>Introduce tus datos</h2>
    <form action="<?=base_url?>users/login" method="post" id="loginBox">
        <table>
            <tr>
                <td class="izq"><label for="user_name">Nombre de Usuario:</label></td>
                <td><input type="text" name="user_name" id="user_name_input" required></td>
            </tr>
            <tr>
                <td><label for="user_password">Contraseña:</label></td>
                <td><input type="password" name="user_password" id="user_password_input" required></td>
            </tr>
        </table>
        <a href="#" class='link_login'>¿Has olvidado la contraseña?</a>
        <div id="buttons" class="buttons_login">
            <input class="button" type="submit" name="enter" value="Entrar"><input class="button" type="submit" name="new_user" value="Nuevo usuario">
        </div>
    </form>
</div>

<?php
    Utils::deleteSession("login_error");    
    echo "<div class='container'>";
    var_dump($_SESSION);
    echo "</div>";
    Utils::deleteSession("user_information"); 
?>
