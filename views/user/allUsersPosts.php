<?php
    echo "<style>";
    echo "#pag" . $pag . " {";
    echo "background-color: #a52a2a !important;";
    echo "color: white;";
    echo "}";
    echo "</style>";
?>

<h1>Posts de <?php echo $users_name ?></h1>
<div id="pagination">
    <?php
        for ($i = 0; $i < $numero_paginas; $i++) {
            echo "<a href='" . base_url . "index.php?controllers=post&action=viewpost&name=" . $users_name . "&pag=" . ($i+1) . "'>";
            echo "<span class='pag' id='pag".($i+1)."' >".($i+1)."</span>";
            echo "</a>";
        }
    ?>
</div> 
<div class="container">
    <h2>Actividad de los últimos posts</h2>

        <div id="start_bar">
            <span class='bar_1'>Tema</span>
            <span class='bar_2'>Hora</span>
            <span class='bar_3'>Título</span>
            <span class='bar_4'>Autor</span>
            <span class='bar_5'>Visitas</span>
            <span class='bar_6'>Likes</span>
            <span class='bar_7'>Comentarios</span>
        </div>

    <?php 

    for ($i = 0; $i < count($All_Posts); $i++) {
        echo "<a class='topic_a' href='index.php?controllers=post&action=view&id=" . $All_Posts[$i]["posts_id"] . "'>";
        echo "<div class='row_post'>";
        echo "<span class='bar_1'><img src='" . base_url . "assets/img/topics/" . $All_Posts[$i]["topics_name"] . ".jpg'  title='" . $All_Posts[$i]["topics_name"] . "' alt='" . $All_Posts[$i]["topics_name"] . "' srcset=''></span>";
        echo "<span class='bar_2'>" . $All_Posts[$i]["posts_last_modification_date"] . "</span>";
        echo "<span class='bar_3'>" . $All_Posts[$i]["posts_title"] . "</span>";
        echo "<span class='bar_4'>" . $All_Posts[$i]["users_name"] . "</span>";
        echo "<span class='bar_5'>" . $All_Posts[$i]["posts_visits_counter"] . "</span>";
        echo "<span class='bar_6'>" . $All_Posts[$i]["posts_likes"] . "</span>";
        echo "<span class='bar_7'>" . $All_Posts[$i]["num_comments_posts"] . "</span>";
        echo "</div>";
        echo "</a>";
    }
    
    ?>  

</div>
<div id="pagination">
    <?php
        for ($i = 0; $i < $numero_paginas; $i++) {
            echo "<a href='" . base_url . "index.php?controllers=post&action=viewpost&name=" . $users_name . "&pag=" . ($i+1) . "'>";
            echo "<span class='pag' id='pag".($i+1)."' >".($i+1)."</span>";
            echo "</a>";
        }
    ?>
</div> 