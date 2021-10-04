<?php

session_start();

if (isset($_POST['user']) && $_POST['user']  == 'laplazainmobiliaria@gmail.com' && $_POST['password'] == 'Bianca0177') {
    $_SESSION['user_name'] = "Abel Gilmartin";
    header('Location: /laplazainmobiliaria/admin/view-magazines.php');
}

if (isset($_GET['close']) && $_GET['close']=='close') {
    session_destroy();
    header('Location: /laplazainmobiliaria/admin/');
}

?>