
<?php //session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <title>ForoCarros</title>
</head>
<body>
<header><h1>ForoCarros</h1></header>
<?php
    if (isset($_SESSION["user_information"])) {
        echo "<form action='" . base_url . "index.php?controllers=users&action=logout' method='post' id='logout'>";
        echo $_SESSION["user_information"]["users_name"] . "<input type='submit' name='logout' value='Cerrar Sesión'>";
        echo "</form>";
    }   
?>
<nav>
    <ul>
        <li><a class="menuPH" href="<?=base_url?>index.php"><img class="homeIcon" src="<?=base_url?>assets/img/icons/home.svg" alt="" srcset=""></a><a class="menuPC homeIcon" href="<?=base_url?>index.php">Inicio</a></li>
        <li><a class="menuPH" href="<?=base_url?>?controllers=topics&action=all"><img class="searchIcon" src="<?=base_url?>assets/img/icons/search.svg" alt="" srcset=""></a><a class="menuPC searchIcon" href="<?=base_url?>?controllers=topics&action=all">Temas</a></li>
        <?php
            if (isset($_SESSION["user_information"])) {
                echo "<li><a class='menuPH' href='" . base_url . "index.php?controllers=users&action=myprofile'><img class='profileIcon' src='" . base_url . "assets/img/icons/profile.svg' alt='' srcset=''></a><a class='menuPC profileIcon' href='" . base_url . "index.php?controllers=users&action=myprofile'>Mi Perfil</a></li>";
                echo "<li><a class='menuPH' href='" . base_url . "index.php?controllers=users&action=post'><img class='postIcon' src='" . base_url . "assets/img/icons/post.svg' alt='' srcset=''></a><a class='menuPC postIcon' href='" . base_url . "index.php?controllers=users&action=post'>Postear</a></li>";
            } else {
                echo "<li><a class='menuPH' href='" . base_url . "index.php?controllers=users&action=login'><img class='loginIcon' src='" . base_url . "assets/img/icons/login.svg' alt='' srcset=''></a><a class='menuPC loginIcon' href='" . base_url . "index.php?controllers=users&action=login'>Ingresar</a></li>";
                echo "<li><a class='menuPH' href='" . base_url . "index.php?controllers=users&action=registration'><img class='registrationIcon' src='" . base_url . "assets/img/icons/register.svg' alt='' srcset=''></a><a class='menuPC registrationIcon' href='" . base_url . "index.php?controllers=users&action=registration'>Registrarse</a></li>";
            }
        ?>
        
    </ul>
</nav>

<div id="MainContainer">