
<!-- STYLE -->

    <style>
        .searchIcon {
            background-color: #a52a2a;
        }
    </style>

<!-- STYLE -->

<h1>Temas de ForoCarros</h1>

<div class="container">
    <h2>Tema</h2>
    <?php 
        for ($i = 0; $i < count($All_Topics); $i++) {
            echo "<a href='" . base_url . "index.php?controllers=topics&action=" . $All_Topics[$i]['Name']. "' class='topic_a'>";
            echo "<p class='topic_p'>";
            echo $All_Topics[$i]["Name"];
            echo "<img src='" . base_url . "assets/img/topics/" . $All_Topics[$i]["Image"] . "' alt='' srcset=''>";
            echo "</p>";
            echo "</a>";
        }
    ?>
</div>