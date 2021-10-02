<?php 
    include_once('../class/magazines-crud.class.php');

    session_start();
    if (!isset($_SESSION['user_name'])) {
        header('location: /laplazainmobiliaria');
    }

    $magazineCrud = new MagazineCrud();
    $magazineList = $magazineCrud->getAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./css/index.css" rel="stylesheet">
</head>
<body>

    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
            <h2>Lista de revistas</h2>
            <div>
                <a href="magazine-form.php?action=new">Nueva revista</a>
            </div>
            <table class="table">
            <tr>
                <th>Nombre</th>
                <th>description</th>
                <th>category_id</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($magazineList as $magazine) { ?>
            <tr>
                <td> <?php echo $magazine['name'] ?> </td>
                <td> <?php echo $magazine['description'] ?> </td>
                <td> <?php echo $magazine['category_id'] ?> </td>
                <td> 
                    <ul>
                        <li>Editar</li>
                        <li>Eliminar</li>
                    </ul>    
                </td>
            </tr>
            <?php } ?>

            </table>
            </div>
        </div>
    </section>
    <footer>La plaza inmobiliaria | Construya hoy | Todos los derechos resevados ©</footer>
</body>
</html>