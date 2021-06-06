<style>
    .profileIcon {
        background-color: #a52a2a;
    }
</style>

<?php
$user = new Users;
$user = $_SESSION["user_information"];
?>

<h1>Perfil de usuario</h1>
<div id="buttonConfig">
    <button><img src="<?= base_url ?>assets/img/icons/profile.svg" alt="" srcset=""></button>
    <button style='background-color:rgb(200,100,100); border-color:rgb(200,100,100);'><img src="<?= base_url ?>assets/img/icons/gear.svg" alt="" srcset=""></button>
</div>

<?php 

    if (!empty($err)) {
        echo "<div class='container'>";
        echo "<h2>Error</h2>";
        echo "<p class='err'>".$err["change"]."</p>";
        echo "</div>";
    }

    if (isset($_SESSION["correct_change"])) {
        echo "<div class='container'>";
        echo "<h2>Cambio realizado correctamente</h2>";
        echo "<p class='ok'>".$_SESSION["correct_change"]."</p>";
        echo "</div>";
        unset($_SESSION["correct_change"]);
    }

?> 

<div class="container">
    <h2>Información del usuario</h2>
    <div class="user_photo">
        <?php if (is_null($user["users_profile_photo"])) { ?>
            <img src="<?= base_url ?>assets/img/icons/profile.svg" alt="" srcset="">
        <?php
        } else {
        }
        ?>
        <p><a class="button" href="">Cambiar</a></p>
    </div>
    <table class="user_table">
        <tr>
            <td>
                <p class="infoUser"><b>Nombre de usuario: </b></p>
            </td>
            <td>
                <p class="infoUser"><?php echo $user["users_name"]?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Correo: </b><button class="change" onclick="insertFormEmail('text_email','input_email')"><img src="<?= base_url ?>assets/img/icons/edit.svg" alt="" srcset=""></button></p>
            </td>
            <td>
                <p id="text_email" class="infoUser"><?php echo $user["users_email"] ?></p>
                <form action="<?=base_url?>index.php?controllers=users&action=change_email" method="post" id="input_email" class="hide">
                    <input type="text" name="email" value="<?php echo $user["users_email"] ?>">
                    <input type="submit" value="Cambiar">
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Fecha de nacimiento: </b></p>
            </td>
            <td>
                <p class="infoUser"><?php echo $user["users_birth_date"] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Registro: </b></p>
            </td>
            <td>
                <p class="infoUser"><?php echo $user["users_registration_date"] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Última conexión: </b></p>
            </td>
            <td>
                <p class="infoUser"><?php echo $user["users_last_connection_date"] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Estatus: </b></p>
            </td>
            <td>
                <p class="infoUser"><?php echo $user["users_rol"] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Enlace a perfíl público: </b></p>
            </td>
            <td>
                <p class="infoUser"></p>
            </td>
        </tr>
    </table>
    <h2>Conóceme</h2>
    <table class="user_table">
        <tr>
            <td>
                <p class="infoUser"><b>Intereses: </b><button class="change" onclick="insertFormInterests('text_interest','input_interests')"><img src="<?= base_url ?>assets/img/icons/edit.svg" alt="" srcset=""></button></p>
            </td>
            <td><?php echo $user["users_interests"] ?>
                <form action="<?=base_url?>index.php?controllers=users&action=change_interests" method="post" id="input_interests" class="hide">
                    <input type="text" name="interests" value="<?php echo $user["users_interests"] ?>">
                    <input type="submit" value="Cambiar">
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Biografía: </b><button class="change" onclick="insertFormBio('text_bio','input_bio')"><img src="<?= base_url ?>assets/img/icons/edit.svg" alt="" srcset=""></button></p>
            </td>
            <td><?php echo $user["users_bio"] ?>
                <form action="<?=base_url?>index.php?controllers=users&action=change_bio" method="post" id="input_bio" class="hide">
                    <textarea style="resize: none;" cols="40" rows="10" name="bio"> <?php echo $user["users_bio"] ?></textarea>
                    <input type="submit" value="Cambiar">
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Firma: </b><button class="change" onclick="insertFormSign('text_sign','input_sign')"><img src="<?= base_url ?>assets/img/icons/edit.svg" alt="" srcset=""></button></p>
            </td>
            <td><?php echo $user["users_sign"] ?>
                <form action="<?=base_url?>index.php?controllers=users&action=change_sign" method="post" id="input_sign" class="hide">
                    <input type="text" name="sign" value="<?php echo $user["users_sign"] ?>">
                    <input type="submit" value="Cambiar">
                </form>
            </td>
        </tr>
    </table>
    <h2>Estadísticas</h2>
    <table class="user_table">
        <tr>
            <td>
                <p class="infoUser"><b>Nº de posts:</b></p>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Nº de mensajes escritos:</b></p>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Nº de mensajes recibidos:</b></p>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Nº de likes:</b></p>
            </td>
            <td></td>
        </tr>
    </table>
</div>

<script src="<?= base_url ?>assets/js/scriptA.js"></script>