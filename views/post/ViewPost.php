
<!-- STYLE -->

<?php
    echo "<style>";
    echo "#pag" . $pag . " {";
    echo "background-color: #a52a2a;";
    echo "color: white;";
    echo "}";
    echo ".dark_mode #pag" . $pag . " {";
    echo "background-color: #222 !important;";
    echo "color: white;";
    echo "}";
    echo "</style>";
?>

<!-- STYLE -->

<h1>POST</h1>

<div class="container">
    <h2><?php echo $Posts_info["topics_name"]; ?></h2>
    <h3 class='post_topics_name'><?php echo $Posts_info["posts_title"]; ?></h3>
    <p class='paragraph'><?php echo nl2br($Posts_info["posts_text"]) ?></p>
    <div class="post_info">
        <div>
        <?php if (!is_null($Posts_info["users_proflile_photo"])) { ?>
        <img src="<?php base_url ?>assets/img/profile_picks/<?php echo $Posts_info["users_proflile_photo"] ?>" alt="">
        <?php } else { ?>
            <img src="<?php base_url ?>assets/img/icons/profile.svg" alt="">
        <?php } ?>
        <a href="<?php base_url ?>index.php?controllers=users&action=publicprofile&name=<?php echo $Posts_info["users_name"]; ?>">Visitar</a>
        </div>
        <div class="post_data">
            <p><b>Autor:</b> <?php echo $Posts_info["users_name"]; ?></p>
            <p><b>Último comentario:</b> <?php echo $Posts_info["posts_last_modification_date"]; ?></p>
            <p><b>Visitas:</b> <?php echo $Posts_info["posts_visits_counter"]; ?></p>
            <p><b>Me gustas: </b><?php echo  $Post_info["posts_likes"]; ?></p>
            <p><b>Rol:</b><span class="<?php echo $Posts_info["users_rol"]; ?>"> <?php echo $Posts_info["users_rol"]; ?></span></p>
            <p><b>Firma:</b> <?php echo $Posts_info["users_sign"]; ?></p>
        </div>
    </div>
    <?php if (isset($_SESSION["user_information"])) { ?>
    <div class="buttons_post">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <?php if ($Posts_info["posts_liked"] == "false"){ ?>
        <input type="submit" name="liked" value="Me gusta" class="button_post">
        <?php } else { ?>
            <input type="submit" name="not_liked" value="No me gusta" class="button_post">
        <?php } ?>
        <input type="hidden" name="post_id" value="<?php echo $Posts_info["posts_id"] ?>">
        <?php 
            if ($_SESSION["user_information"]["users_rol"] == "moderador" || $_SESSION["user_information"]["users_rol"] == "admin" || $_SESSION["user_information"]["users_name"] == $Posts_info["users_name"]) {
                echo "<input type='submit' name='delete_post' value='Eliminar' class='button_post'>";
            }
        ?>
        </form>
    </div>
    <?php } ?>
</div>

    <?php 
        if (isset($_SESSION["user_information"])) {
    ?>

<div class="container">
    <h2>Comentar</h2>
    <form action="<?php base_url ?>index.php?controllers=users&action=comment" method="post">
        <textarea name="post_comment" id="post_comment" cols="30" rows="10"></textarea>
        <div class="buttons_post">
            <input type="hidden" name="posts_id" value="<?php echo $Posts_info["posts_id"]; ?>">
        <input type="submit" name="comment" value="Enviar" class="button_post">
        </div>
    </form>
</div>

    <?php
        }
    ?>

<h1>COMENTARIOS</h1>

<div id="pagination">
    <?php
        for ($i = 0; $i < $numero_paginas; $i++) {
            echo "<a href='" . base_url . "index.php?controllers=post&action=view&id=" . $Posts_info["posts_id"] . "&pag=" . ($i+1) . "'>";
            echo "<span class='pag' id='pag".($i+1)."' >".($i+1)."</span>";
            echo "</a>";
        }
    ?>
</div> 

<?php 
    if (empty($All_Comments)) {
        echo "<div class='container'><h2>No hay comentarios</h2><p class='err'>Todavía no se han hecho comentarios al post.</p></div>";
    } else {
        for ($i = 0; $i < count($All_Comments); $i++) {
            echo "<div class='container'>";
            echo "<h2>" . $All_Comments[$i]["comments_date"] . "</h2>";
            echo "<p class='paragraph'>" . nl2br($All_Comments[$i]["comments_text"]) . "</p>";
            echo "<div class='post_info'>";
            echo "<div>";
            if (!is_null($All_Comments[$i]["users_proflile_photo"])) {
                echo "<img src='" . base_url . "assets/img/profile_picks/" . $All_Comments[$i]["users_proflile_photo"] . "'>";
            } else {
                echo "<img src='" . base_url . "assets/img/icons/profile.svg'>";
            }
            echo "<a href='" . base_url . "index.php?controllers=users&action=publicprofile&name=" . $All_Comments[$i]["users_name"] . "'>Visitar</a>";
            echo "</div>";
            echo "<div class='post_data'>";
            echo "<p><b>Autor: </b>" . $All_Comments[$i]["users_name"] . "</p>";
            echo "<p><b>Rol: </b><span class='" . $All_Comments[$i]["users_rol"] . "'>" . $All_Comments[$i]["users_rol"] . "</span></p>";
            echo "<p><b>Firma: </b>" . $All_Comments[$i]["users_sign"] . "</p>";
            echo "</div>";
            echo "</div>";
?>
<?php if (isset($_SESSION["user_information"])) { ?>
            <div class="buttons_post">
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <input type="hidden" name="comment_id" value="<?php echo $All_Comments[$i]["comments_id"]; ?>">
            <?php 
                if ($_SESSION["user_information"]["users_rol"] == "moderador" || $_SESSION["user_information"]["users_rol"] == "admin") {
                    echo "<input type='submit' name='delete_comment' value='Eliminar' class='button_post'>";
                }
            ?>
            </form>
            </div>
<?php } ?>
<?php
            echo "</div>";
        }
    }
?>

<div id="pagination">
    <?php
        for ($i = 0; $i < $numero_paginas; $i++) {
            echo "<a href='" . base_url . "index.php?controllers=post&action=view&id=" . $Posts_info["posts_id"] . "&pag=" . ($i+1) . "'>";
            echo "<span class='pag' id='pag".($i+1)."' >".($i+1)."</span>";
            echo "</a>";
        }
    ?>
</div>