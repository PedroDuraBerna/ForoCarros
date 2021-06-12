<style>
    .profileIcon {
        background-color: #a52a2a;
    }
    .dark_mode .profileIcon {
        background-color: #222;
    }
    .dark_mode .button{
        background-color: #222;
        border-color: #222 !important;
    }
    .dark_mode .button_config {
        background-color: #333 !important;
        border-color: #222 !important;
    }
</style>

<?php
$user = new Users;
$user = $_SESSION["user_information"];
?>

<h1>Perfil de usuario</h1>

<div id="buttonConfig">
    <a href="<?= base_url ?>index.php?controllers=users&action=myprofile" class="button"><img src="<?= base_url ?>assets/img/icons/profile.svg" alt="" srcset=""></a>
    <?php if ($user["users_rol"] == "admin"){
    ?>
            <a href="<?= base_url ?>index.php?controllers=users&action=adminConfiguration" class="button_config"><img src="<?= base_url ?>assets/img/icons/gear.svg" alt="" srcset=""></a>
    <?php
        } 
    ?>
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
            ?>
            <img src="<?= base_url ?>assets/img/profile_picks/<?php echo $user["users_profile_photo"] ?>" alt="" srcset="">
            <?php
        }
        ?>
        <form action="<?=base_url?>index.php?controllers=users&action=change_users_photo" method="post" id="input_users_photo" class="hide" enctype="multipart/form-data">
            <input type="file" name="photo" id='photo' class='input_change'>
            <input type="submit" name="change_photo" value="Cambiar" class='button_change'>
        </form>
        </div>
        <p class='mid'><button class="change" onclick="insertFormPhoto('input_users_photo')"><img src="<?= base_url ?>assets/img/icons/edit.svg" alt="" srcset=""></button></p> 
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
                    <input type="text" name="email" value="<?php echo $user["users_email"] ?>" class='input_change'>
                    <input type="submit" value="Cambiar" class='button_change'>
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
                <?php 
                
                    if ($user["users_rol"] == "admin") {
                        echo "<p class='infoUser err'>" . $user["users_rol"] . "</p>";
                    } else if ($user["users_rol"] == "moderador") {
                        echo "<p class='infoUser' style='color:orange;'>" . $user["users_rol"] . "</p>";
                    } else {
                        echo "<p class='infoUser' style='color:green;'>" . $user["users_rol"] . "</p>";
                    }
                
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Enlace a perfíl público: </b></p>
            </td>
            <td>
                <p class="infoUser"><a href="<?php echo base_url . "index.php?controllers=users&action=publicprofile&name=" . $_SESSION["user_information"]["users_name"]  ?>"><?php echo base_url . "index.php?controllers=users&action=publicprofile&name=" . $_SESSION["user_information"]["users_name"] ?></a></p>
            </td>
        </tr>
        <tr>
            <td><p class="infoUser"><b>Ver todos mis posts: </b></p></td>
            <td><p class="infoUser"><a href="<?php echo base_url . "index.php?controllers=post&action=viewpost&name=" . $_SESSION["user_information"]["users_name"]  ?>"><?php echo base_url . "index.php?controllers=post&action=viewpost&name=" . $_SESSION["user_information"]["users_name"] ?></a></p></td>
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
                    <input type="text" name="interests" value='<?php echo $user["users_interests"] ?>' class='input_change'">
                    <input type="submit" value="Cambiar" class='button_change'>
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
                    <input type="submit" value="Cambiar" class='button_change'>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Firma: </b><button class="change" onclick="insertFormSign('text_sign','input_sign')"><img src="<?= base_url ?>assets/img/icons/edit.svg" alt="" srcset=""></button></p>
            </td>
            <td><?php echo $user["users_sign"] ?>
                <form action="<?=base_url?>index.php?controllers=users&action=change_sign" method="post" id="input_sign" class="hide">
                    <input type="text" name="sign" value='<?php echo $user["users_sign"] ?>' class='input_change'">
                    <input type="submit" value="Cambiar" class='button_change'>
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
            <td><?php echo $Aux_info["number_posts"] ?></td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Nº de mensajes escritos:</b></p>
            </td>
            <td><?php echo $Aux_info["number_comments"] ?></td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Nº de mensajes recibidos:</b></p>
            </td>
            <td><?php echo $Aux_info["number_comments_recibed"] ?></td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Nº de likes dados:</b></p>
            </td>
            <td><?php echo $Aux_info["number_likes_gived"] ?></td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Nº de likes recibidos:</b></p>
            </td>
            <td><?php echo $Aux_info["number_likes_recibed"] ?></td>
        </tr>
    </table>
</div>

<script src="<?= base_url ?>assets/js/scriptA.js"></script>