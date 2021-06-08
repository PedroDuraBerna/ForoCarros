
<!-- STYLE -->

<?php
    echo "<style>";
    echo "#pag" . $pag . " {";
    echo "background-color: #a52a2a !important;";
    echo "color: white;";
    echo "}";
    echo "</style>";
?>

<h1>Eres Amdmin!</h1>
<div class="container">
    <h2>Información de ForoCarros:</h2>
    <table class="table_fancy">
        <tr>
            <td>
                <p><b>Nº Usuarios: </b></p>
            </td>
            <td>
                <p><?php echo $All_users ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b></b></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Nº Posts: </b></p>
            </td>
            <td>
                <p><?php echo $All_posts ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b></b></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Nº Comentarios: </b></p>
            </td>
            <td>
                <p><?php echo $All_comments ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b></b></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Nº Likes a Posts: </b></p>
            </td>
            <td>
                <p><?php echo $All_likes ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b></b></p>
            </td>
        </tr>
    </table>
    <div class="buttons_post">
        <form action="">
            <input type="submit" value="Informe PDF" class="button_post">
        </form>
    </div>
</div>

<div id="pagination">
    <?php
        for ($i = 0; $i < $numero_paginas; $i++) {
            echo "<a href='" . base_url . "index.php?controllers=users&action=adminConfiguration&pag=" . ($i+1) . "'>";
            echo "<span class='pag' id='pag".($i+1)."' >".($i+1)."</span>";
            echo "</a>";
        }
    ?>
</div> 

<div class="container">
<h2>Usuarios de ForoCarros:</h2>

<?php 

    for ($i = 0; $i < count($All_users_info); $i++) {
        echo "<div class='block_user'>";
        echo "<div class='block_left'>";
        echo "<div class='img_user'>";
        if (is_null($All_users_info[$i]["users_profile_photo"])) {
            echo "<img src='" . base_url . "assets/img/icons/profile.svg'>";
        } else {
            echo "<img src='" . base_url . "assets/img/profile_picks/" . $All_users_info[$i]["users_profile_photo"] . "'>";
        }
        echo "<a href='index.php?controllers=users&action=publicprofile&name=" . $All_users_info[$i]["users_name"] . "'>Visitar</a>";
        echo "</div>";
        echo "<div>";
        echo "<table>";
        echo "<tr><td><p><b>Nombre: </b></p></td>";
        echo "<td><p>" . $All_users_info[$i]["users_name"] . "</p></td></tr>";
        echo "<tr><td><p><b>Rol: </b></p></td>";
        echo "<td><p class='" . $All_users_info[$i]["users_rol"] . "'>" . $All_users_info[$i]["users_rol"] . "</p></td></tr>"; 
        echo "<tr><td><p><b>Correo: </b></p></td>";
        echo "<td><p>" . $All_users_info[$i]["users_email"] . "</p></td></tr>"; 
        echo "</table>";
        echo "</div>";
        echo "</div>";
        if ($All_users_info[$i]["users_rol"] == "user" || $All_users_info[$i]["users_rol"] == "moderator") {

        echo "<div class='buttons_post'>";
        echo "<form action='" . base_url . "index.php?controllers=users&action=adminConfiguration' method='post' class='block_buttons'>";
        if ($All_users_info[$i]["users_rol"] == "user") {
            echo "<input type='hidden' name='users_id' value='" . $All_users_info[$i]["users_id"] . "'>";
            echo "<input class='button_post' type='submit' name='user_as_moderator' value='Hacer Moderador'>";
        } else {
            echo "<input type='hidden' name='users_id' value='" . $All_users_info[$i]["users_id"] . "'>";
            echo "<input class='button_post' type='submit' name='user_as_user' value='Hacer Usuario'>";
        }
        echo "<input class='button_post' type='submit' name='delete_user' value='Eliminar'>";
        echo "</form>";
        echo "</div>";
        }
        echo "</div>";
    }

?>
</div>

<div id="pagination">
    <?php
        for ($i = 0; $i < $numero_paginas; $i++) {
            echo "<a href='" . base_url . "index.php?controllers=users&action=adminConfiguration&pag=" . ($i+1) . "'>";
            echo "<span class='pag' id='pag".($i+1)."' >".($i+1)."</span>";
            echo "</a>";
        }
    ?>
</div> 

</div>