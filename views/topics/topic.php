
<?php
    echo "<style>";
    echo "#pag" . $pag . " {";
    echo "background-color: #a52a2a !important;";
    echo "color: white;";
    echo "}";
    echo ".dark_mode #pag" . $pag . " {";
    echo "background-color: #222 !important;";
    echo "color: white;";
    echo "}";
    echo "</style>";
?>

<h1>Tema: <?php echo $info ?></h1>

<div id="pagination">
    <?php
        for ($i = 0; $i < $numero_paginas; $i++) {
            echo "<a href='" . base_url . "index.php?controllers=topics&action=" . $info . "&pag=".($i+1)."'>";
            echo "<span class='pag' id='pag".($i+1)."'>".($i+1)."</spna>";
            echo "</a>";
        }
    ?>
</div> 

<div class="container">
    <h2>Últimos 10 Posts</h2>

        <div id="start_bar">
            <span class='bar_0'>Tema</span>
            <span class="bar_1">Visibilidad</span>
            <span class='bar_2'>Hora</span>
            <span class='bar_3'>Título</span>
            <span class='bar_4'>Autor</span>
            <span class='bar_5'>Visitas</span>
            <span class='bar_6'>Comentarios</span>
        </div>

    <?php 
    
    if (isset($All_Posts)) {
        for ($i = 0; $i < count($All_Posts); $i++) {
        echo "<a class='topic_a' href='" . base_url . "index.php?controllers=post&action=view&id=" . $All_Posts[$i]["posts_id"] . "' >";
        echo "<div class='row_post'>";
        echo "<span class='bar_0'><img src='" . base_url . "assets/img/topics/" . $All_Posts[$i]["topics_name"] . ".jpg'  title='" . $All_Posts[$i]["topics_name"] . "' alt='" . $All_Posts[$i]["topics_name"] . "' srcset=''></span>";
        if ($All_Posts[$i]["visibility"] == "private") {
            echo "<span class='bar_1'><img src='" . base_url . "assets/img/icons/private.svg'></span>";
        } else {
            echo "<span class='bar_1'><img src='" . base_url . "assets/img/icons/public.svg'></span>";
        }
        echo "<span class='bar_2'>" . $All_Posts[$i]["posts_last_modification_date"] . "</span>";
        echo "<span class='bar_3'>" . $All_Posts[$i]["posts_title"] . "</span>";
        echo "<span class='bar_4'>" . $All_Posts[$i]["users_name"] . "</span>";
        echo "<span class='bar_5'>" . $All_Posts[$i]["posts_visits_counter"] . "</span>";
        echo "<span class='bar_6'>" . $All_Posts[$i]["posts_likes"] . "</span>";
        echo "</div>";
        echo "</a>";
    }
    } else {
        echo "<p class='err'>Todavía no existen posts de " . $info . "</p>";
    }



    ?>

</div>

<div id="pagination">
    <?php
        for ($i = 0; $i < $numero_paginas; $i++) {
            echo "<a href='" . base_url . "index.php?controllers=topics&action=" . $info . "&pag=".($i+1)."'>";
            echo "<span class='pag' id='pag".($i+1)."'>".($i+1)."</spna>";
            echo "</a>";
        }
    ?>
</div> 

<script src="<?= base_url ?>assets/js/scriptB.js"></script>