<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
    <title>ForoCarros</title>
</head>
<body>
<header><h1>ForoCarros</h1></header>
<?php
    if (isset($_SESSION["user_information"])) {
        echo "<form action='" . base_url . "users/logout' method='post' id='logout'>";
        echo $_SESSION["user_information"]->users_name . "<input type='submit' name='logout' value='Cerrar Sesión'>";
        echo "</form>";
    }   
?>
<nav>
    <ul>
        <li><a class="menuPH" href="<?=base_url?>"><img class="homeIcon" src="<?=base_url?>assets/img/icons/home.svg" alt="" srcset=""></a><a class="menuPC homeIcon" href="<?=base_url?>">Inicio</a></li>
        <li><a class="menuPH" href="<?=base_url?>topics/all"><img class="searchIcon" src="<?=base_url?>assets/img/icons/search.svg" alt="" srcset=""></a><a class="menuPC searchIcon" href="<?=base_url?>topics/all">Temas</a></li>
        <?php
            if (isset($_SESSION["user_information"])) {
                echo "<li><a class='menuPH' href=" . base_url . "users/myprofile'><img class='profileIcon' src='" . base_url . "assets/img/icons/profile.svg' alt='' srcset=''></a><a class='menuPC profileIcon' href='" . base_url . "users/myprofile'>Mi Perfil</a></li>";
                echo "<li><a class='menuPH' href='" . base_url . "users/post'><img class='postIcon' src='" . base_url . "assets/img/icons/register.svg' alt='' srcset=''></a><a class='menuPC postIcon' href='" . base_url . "users/post'>Postear</a></li>";
            } else {
                echo "<li><a class='menuPH' href=" . base_url . "users/login'><img class='loginIcon' src='" . base_url . "assets/img/icons/login.svg' alt='' srcset=''></a><a class='menuPC loginIcon' href='" . base_url . "users/login'>Ingresar</a></li>";
                echo "<li><a class='menuPH' href='" . base_url . "users/registration'><img class='registrationIcon' src='" . base_url . "assets/img/icons/register.svg' alt='' srcset=''></a><a class='menuPC registrationIcon' href='" . base_url . "users/registration'>Registrarse</a></li>";
            }
        ?>
        
    </ul>
</nav>
<div id="MainContainer">