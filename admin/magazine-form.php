
<?php 

include_once('../class/magazines-crud.class.php');
include_once('../models/magazine.class.php');

if (isset($_GET['action'])) {
    $formType = $_GET['action'];

    if ($formType == 'new') {
        $headerText = 'Crear nueva';
    } else if ($formType == 'edit'){
        $headerText = 'Editar';

        $idMagazine = $_GET['id'];
        $magazineCrud = new MagazineCrud();
        $magazine = new Magazine();

        $magazine = $magazineCrud->getById($idMagazine);
    } else {
        header('Location: /laplazainmobiliaria');
    }
} else {
    header('Location: /laplazainmobiliaria');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/index.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-12">
            <h2><?php echo $headerText ?> revista</h2>
            <form action="controller/magazine.controller.php" method="POST">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="<?php echo $formType == 'new' ? '' : $magazine->getName(); ?>">

                <label for="description">Descripción</label>
                <textarea type="text" class="form-control" name="description"><?php echo $formType == 'new' ? '' : $magazine->getDescription(); ?></textarea>

                <label for="category_id">Tipo de revista</label>
                <select name="category_id" class="form-control" >
                    <option value="1" <?php if ($formType == 'edit' && $magazine->getCategoryId() == 1) { echo ' selected="selected"'; } ?>>la plaza</option>
                    <option value="2" <?php if ($formType == 'edit' && $magazine->getCategoryId() == 2) { echo ' selected="selected"'; } ?>>construir</option>
                </select>

                <label for="description">Mes de concurrencia</label>
                <input type="date" name="relevant_month" class="form-control" value="<?php echo $formType == 'new' ? '' : $magazine->getRelevantMonth(); ?>"></input>

                <div class="form-check">
                    <input name="enabled" class="form-check-input" type="checkbox" id="gridCheck1" value="1" <?php if ($formType == 'edit' && $magazine->getEnabled()) { echo 'checked'; } ?>>
                    <label class="form-check-label" for="gridCheck1">
                        Habilitar 
                    </label>
                </div>
                <input type="hidden" name="action" value="<?php echo ($formType == 'new') ? 'create' : 'edit';  ?>">
                <input type="hidden" name="id" value="<?php echo ($formType == 'new') ? 'null' : $magazine->getId();  ?>">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>