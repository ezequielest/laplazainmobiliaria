<?php

session_start();

if ($_POST['user'] == 'laplazainmobiliaria@gmail.com' && $_POST['password'] == 'Bianca0177') {
    $_SESSION['user_name'] = "Abel Gilmartin";
    header('Location: /laplazainmobiliaria/admin/view-magazines.php');
}

?>