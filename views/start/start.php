
<?php
    if (isset($_POST["pagina"])) {
        $_SESSION["pagina"] = $_POST["pagina"];
        header ("Location:" . base_url);
    }

?>

<!-- STYLE -->

    <style>
        .homeIcon {
            background-color: #a52a2a;
        }
    </style>

<?php
    echo "<style>";
    echo "#pag" . $_SESSION["pagina"] . " {";
    echo "background-color: #a52a2a !important;";
    echo "color: white;";
    echo "}";
    echo "</style>";
?>



<!-- STYLE -->

<h1>Bienvenido a ForoCarros</h1>
<div id="pagination">
    <?php
        for ($i = 0; $i < $_SESSION["numero_paginas"]; $i++) {
            echo "<form action=" . $_SERVER["PHP_SELF"] . " method='post'>";
            echo "<input type='submit' value=".($i+1)." name='pagina' class='pag' id='pag".($i+1)."'>";
            echo "</form>";
        }
    ?>
</div> 
<div class="container">
    <h2>Últimos 10 posts</h2>

        <div id="start_bar">
            <span class='bar_1'>Tema</span>
            <span class='bar_2'>Hora</span>
            <span class='bar_3'>Título</span>
            <span class='bar_4'>Autor</span>
            <span class='bar_5'>Visitas</span>
            <span class='bar_6'>Comentarios</span>
        </div>

    <?php 

    for ($i = 0; $i < count($All_Posts); $i++) {
        echo "<form onclick='redirigir_post(\"" . $All_Posts[$i]["posts_id"] . "\")' action='Post/view' method='post'>";
        echo "<div class='row_post'>";
        echo "<span class='bar_1'><img src='" . base_url . "assets/img/topics/" . $All_Posts[$i]["topics_name"] . ".jpg'  title='" . $All_Posts[$i]["topics_name"] . "' alt='" . $All_Posts[$i]["topics_name"] . "' srcset=''></span>";
        echo "<span class='bar_2'>" . $All_Posts[$i]["posts_last_modification_date"] . "</span>";
        echo "<span class='bar_3'>" . $All_Posts[$i]["posts_title"] . "</span>";
        echo "<span class='bar_4'>" . $All_Posts[$i]["users_name"] . "</span>";
        echo "<span class='bar_5'>" . $All_Posts[$i]["posts_visits_counter"] . "</span>";
        echo "<span class='bar_6'>1234";
        echo "<input type='hidden' name='id' value=" . $All_Posts[$i]["posts_id"] . ">";
        echo "<input class='hide' type='submit' value='Enviar' id='" . $All_Posts[$i]["posts_id"] . "' >";
        echo "</div>";
        echo "</form>";
    }
    
    ?>  

</div>
<div id="pagination">
    <?php
        for ($i = 0; $i < $_SESSION["numero_paginas"]; $i++) {
            echo "<form action=" . $_SERVER["PHP_SELF"] . " method='post'>";
            echo "<input type='submit' value=".($i+1)." name='pagina' class='pag' id='pag".($i+1)."'>";
            echo "</form>";
        }
    ?>
</div>  
<div class="container">
    <h2>Estadísticas</h2>
</div>
<div class="container">
    <h2>Regístrate</h2>
</div>

<script src="<?= base_url ?>assets/js/scriptB.js"></script>