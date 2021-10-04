
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

    <section class="magazine-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-container">
                        <h2><?php echo $headerText ?> revista</h2>
                        <a class="btn btn-primary" href="view-magazines.php">Lista de revistas</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                <form action="controller/magazine.controller.php" method="POST">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $formType == 'new' ? '' : $magazine->getName(); ?>" required>

                    <label for="description">Descripción</label>
                    <textarea type="text" class="form-control" name="description"><?php echo $formType == 'new' ? '' : $magazine->getDescription(); ?></textarea>
                    
                    <label for="link">link de YUMPU</label>
                    <textarea type="text" class="form-control" name="link" required><?php echo $formType == 'new' ? '' : $magazine->getLink(); ?></textarea>

                    <label for="category_id">Tipo de revista</label>
                    <select name="category_id" class="form-control" required>
                        <option value="1" <?php if ($formType == 'edit' && $magazine->getCategoryId() == 1) { echo ' selected="selected"'; } ?>>La Plaza Inmobiliaria</option>
                        <option value="2" <?php if ($formType == 'edit' && $magazine->getCategoryId() == 2) { echo ' selected="selected"'; } ?>>Construya Hoy</option>
                    </select>

                    <label for="description">Mes de concurrencia</label>
                    <input type="date" name="relevant_month" class="form-control" value="<?php echo $formType == 'new' ? '' : $magazine->getRelevantMonth(); ?>"></input>

                    <div class="form-check">
                        <input name="enabled" class="form-check-input" type="checkbox" id="gridCheck1" value="1" <?php if ($formType == 'edit' && $magazine->getEnabled() || $formType == 'new') { echo 'checked'; } ?>>
                        <label class="form-check-label" for="gridCheck1">
                            Habilitar 
                        </label>
                    </div>
                    <input type="hidden" name="action" value="<?php echo ($formType == 'new') ? 'create' : 'edit';  ?>">
                    <input type="hidden" name="id" value="<?php echo ($formType == 'new') ? 'null' : $magazine->getId();  ?>">
                    <button type="submit" class="btn btn-primary send"><?php echo $formType == 'new' ? 'Crear' : 'Editar';?></button>
                </form>
                </div>
                <div class="col-6">
                    <h2>IMPORTANTE!!</h2>
                    <p>Del <b>iframe</b> generado por yumpu, solo seleccionar el enlace <b>dentro del src</b></p>
                    <h4>Ejemplo:</h4>
                    <p>Del enlace</p>
                    <p>< iframe width="620px" height="541px" src="<span class="highlight">https://www.yumpu.com/es/embed/view/SGX0yF6xYvmco3tP</span>" frameborder="0" allowfullscreen="true"  allowtransparency="true"></p>
                    <p>Seleccionar</p>
                    <p class="highlight">https://www.yumpu.com/es/embed/view/SGX0yF6xYvmco3tP</p>
                    <p>Ese es el enlace que debes copiar dentro de <b>link de YUMPU</b></p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>