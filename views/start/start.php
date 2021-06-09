
<!-- STYLE -->

    <style>
        .homeIcon {
            background-color: #a52a2a;
        }
    </style>

<?php
    echo "<style>";
    echo "#pag" . $pag . " {";
    echo "background-color: #a52a2a !important;";
    echo "color: white;";
    echo "}";
    echo "</style>";
?>

<!-- STYLE -->

<h1>Bienvenido a ForoCarros</h1>
<div id="pagination">
    <?php
        for ($i = 0; $i < $numero_paginas; $i++) {
            echo "<a href='" . base_url . "index.php?pag=" . ($i+1) . "'>";
            echo "<span class='pag' id='pag".($i+1)."' >".($i+1)."</span>";
            echo "</a>";
        }
    ?>
</div> 
<div class="container">
    <h2>Actividad</h2>

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
            echo "<a href='" . base_url . "index.php?pag=" . ($i+1) . "'>";
            echo "<span class='pag' id='pag".($i+1)."' >".($i+1)."</span>";
            echo "</a>";
        }
    ?>
</div>  

<div class="container">
<section>

  <div class="Slider_container">
    <div id="slider" class="slider">
      <img src="<?= base_url ?>assets/img/carousel/carouselA.jpg">
      <img src="<?= base_url ?>assets/img/carousel/carouselB.jpg">
    </div>
  </div>
<section>
</div>
<div class="container">
    <h2>Información</h2>
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
                <p><b>Nº Posts: </b></p>
            </td>
            <td>
                <p><?php echo $All_posts ?></p>
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
    <div id='weather'>
    </div>
    <br>
    <br>
    <br>

    <!-- <div class="clock-box">
    <div class="clock">
    <div class="number number-1">1</div>
    <div class="number number-2">2</div>
    <div class="number number-3">3</div>
    <div class="number number-4">4</div>
    <div class="number number-5">5</div>
    <div class="number number-6">6</div>
    <div class="number number-7">7</div>
    <div class="number number-8">8</div>
    <div class="number number-9">9</div>
    <div class="number number-10">10</div>
    <div class="number number-11">11</div>
    <div class="number number-12">12</div>
    <div class="hands second" second-hand></div>
    <div class="hands minute" minute-hand></div>
    <div class="hands hour" hour-hand></div>
    <div class="circle"></div>
    </div> -->

</div> 
</div>