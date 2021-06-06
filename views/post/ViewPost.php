
<h1>POST</h1>

<div class="container">
    <h2><?php echo $Posts_info["topics_name"]; ?></h2>
    <h3 class='post_topics_name'><?php echo $Posts_info["posts_title"]; ?></h3>
    <p class='paragraph'><?php echo nl2br($Posts_info["posts_text"]) ?></p>
    <div class="post_info">
        <div class="post_data">
            <p>Autor: <?php echo $Posts_info["users_name"]; ?></p>
            <p>Última modificación: <?php echo $Posts_info["posts_last_modification_date"]; ?></p>
            <p>Visitas: <?php echo $Posts_info["posts_visits_counter"]; ?></p>
            <p>Me gustas: 1234</p>
        </div>
    </div>
    <div class="buttons">
        <input type="submit" value="Me gusta" class="button">
        <input type="submit" value="Eliminar Post" class="button">
        </div>
</div>

    <?php 
        if (isset($_SESSION["user_information"])) {
    ?>

<div class="container">
    <h2>Comentar</h2>
    <form action="" method="post">
        <textarea name="post_comment" id="post_comment" cols="30" rows="10"></textarea>
        <div class="buttons">
        <input type="submit" value="Enviar" class="button">
        </div>
    </form>
</div>

    <?php
        }
    ?>
