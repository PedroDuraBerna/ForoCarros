<style>
    .postIcon {
        background-color: #a52a2a;
    }
</style>

<h1>Postea en ForoCarros</h1>

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


</div>

<div id="buttons">
<input type="submit" class="button" value="Postear"><input class="button" type="submit" value="Restaurar">
</div>

</form>