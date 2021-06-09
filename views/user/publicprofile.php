
<h1>Perfil público</h1>

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
                <p class="infoUser"><b>Fecha de nacimiento: </b></p>
            </td>
            <td>
                <p class="infoUser"><?php echo date_format(date_create($user["users_birth_date"]), "d/m/Y"); ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Registro: </b></p>
            </td>
            <td>
                <p class="infoUser"><?php echo date_format(date_create($user["users_registration_date"]), "d/m/Y H:i:s") ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Última conexión: </b></p>
            </td>
            <td>
                <p class="infoUser"><?php echo date_format(date_create($user["users_last_connection_date"]), "d/m/Y H:i:s") ?></p>
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
                    } else if ($user["users_rol"] == "moderator") {
                        echo "<p class='infoUser' style='color:orange;'>" . $user["users_rol"] . "</p>";
                    } else {
                        echo "<p class='infoUser' style='color:green;'>" . $user["users_rol"] . "</p>";
                    }
                
                ?>
            </td>
        </tr>
        <tr>
            <td><p class="infoUser"><b>Ver todos mis posts: </b></p></td>
            <td><p class="infoUser"><a href="<?php echo base_url . "index.php?controllers=post&action=viewpost&name=" . $user["users_name"] ?>"><?php echo base_url . "index.php?controllers=post&action=viewpost&name=" . $user["users_name"] ?></a></p></td>
        </tr>
    </table>
    <h2>Conóceme</h2>
    <table class="user_table">
        <tr>
            <td>
                <p class="infoUser"><b>Intereses: </b></p>
            </td>
            <td><?php echo $user["users_interests"] ?>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Biografía: </b></p>
            </td>
            <td><?php echo $user["users_bio"] ?>
            </td>
        </tr>
        <tr>
            <td>
                <p class="infoUser"><b>Firma: </b></p>
            </td>
            <td><?php echo $user["users_sign"] ?>
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
