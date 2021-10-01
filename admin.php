
<?php 
    include_once('./class/db.class.php');
    include_once('./class/magazines.class.php');
    
    $magazine = new Magazine();
    $magazines = $magazine->getById(1);
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
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2>Lista de revistas</h2>
            <table>
            <tr>
                <th>Nombre</th>
                <th>description</th>
                <th>category_id</th>
            </tr>
            <?php foreach ($magazines as $magazine) { ?>
            <tr>
                <td> <?php echo $magazine['name']; ?> </td>
                <td> <?php echo $magazine['description']; ?> </td>
                <td> <?php echo $magazine['category_id']; ?> </td>

            </tr>
            <?php } ?>

            </table>
            </div>
        </div>
    </div>


    



</body>
</html>