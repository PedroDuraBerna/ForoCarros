<style>
    .postIcon {
        background-color: #a52a2a;
    }
</style>

<h1>Postea en ForoCarros</h1>

<?php 

    if (isset($OK)) {
        echo "<div class='container'>";   
        echo "<h2>Post realizado correctamente</h2>";
        echo "<p class='ok'>Ya puedes ver tu post, redireccionando en <span id='cdT'>3</span> segundos.</p>";
        echo "</div>";
        header("Refresh:3;url=" . base_url . "index.php?controllers=post&action=viewpost&name=" . $_SESSION["user_information"]["users_name"]);
    }

?>

<div class="container">

<form action="<?=base_url?>index.php?controllers=users&action=post" method="POST">

<h2>Elige un tema</h2>

<select name="Topic" id="topics_select">
<?php 
    
    for ($i = 0; $i < count($topics); $i++) {
        echo "<option value=" . $topics[$i]["Name"] . ">";
        echo $topics[$i]["Name"];
        echo "</option>";
    }

?>
</select>

<h2>Título</h2>

<?php 
    if (isset($err["title"])) {
        echo "<p class='err'>" . $err["title"] . "</p>";
    }
?>

<input type="text" name="title" id="topics_title" placeholder="Introduce un título">

<h2>Cuéntame</h2>

<?php 
    if (isset($err["text"])) {
        echo "<p class='err'>" . $err["text"] . "</p>";
    }
?>

<textarea name="text" id="topics_text" cols="30" rows="10" placeholder="A ver, dime cosas..." ></textarea>

<h2>Visibilidad</h2>

<select name="visibility" id="visibility" class="margin_20">
    <option value="public">Pública</option>
    <option value="private">Privada</option>
</select>

<div id="buttons">
<input type="submit" class="button" value="Postear"><input class="button" type="submit" value="Restaurar">
</div>

</form>
</div>


