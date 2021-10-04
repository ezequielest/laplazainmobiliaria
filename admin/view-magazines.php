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
    <link href="../css/index.css" rel="stylesheet">
</head>
<body>

    <section class="view-magazine">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <div class="header-container">
                    <h2>Lista de revistas</h2>
                    <div>
                        <a class="btn btn-primary" href="magazine-form.php?action=new">Nueva revista</a>
                        <a class="btn btn-danger" href="login.php?close=close">Cerrar sesión</a>
                    </div>
                </div>
                <table class="table">
                <tr>
                    <th style="width: 25%">Nombre</th>
                    <th  style="width: 40%">Descripción</th>
                    <th  style="width: 25%">Categoría</th>
                    <th style="width: 15%">Acciones</th>
                </tr>
                <?php foreach ($magazineList as $magazine) { ?>
                <tr id="row<?php echo $magazine['id'] ?>">
                    <td> <?php echo $magazine['name'] ?> </td>
                    <td> <?php echo $magazine['description'] ?> </td>
                    <td> <?php echo ($magazine['category_id'] == 1) ? 'La Plaza Inmobiliaria' : 'Construya Hoy'; ?> </td>
                    <td> 
                        <ul>
                            <li><a class="action" href="./magazine-form.php?action=edit&id=<?php echo $magazine['id'] ?>"><i class="fas fa-edit"></i></a></li>
                            <!--<li><a id="<?php echo $magazine['id'] ?>" class="action delete"><i class="fas fa-trash-alt"></i></a></li>-->
                            <li><a class="action" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash-alt"></i></li>
                        </ul>    
                    </td>
                </tr>
                <?php } ?>

                </table>
                </div>
            </div>
        </div>
    </section>

    <div class="modal" tabindex="-1" id="deleteModal" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminando revista</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Esta seguro de que quiere eliminar esta revista?</p>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</a>
                <a id="<?php echo $magazine['id'] ?>" class="action delete btn btn-primary">SI</a>
            </div>
            </div>
        </div>
    </div>

    <footer>La plaza inmobiliaria | Construya hoy | Todos los derechos resevados ©</footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
    $('.delete').click(function() {
        let id = $(this).attr('id');

        $.ajax({
            url: `./controller/magazine.controller.php?action=delete&id=${id}`,
            type: 'GET',
            //data: {id: id},
            error: function() {
                $('#deleteModal').modal('hide')
                alert('Error de servidor, vuelva a intentarlo');
            },
            success: function(data) {
                $('#deleteModal').modal('hide')
                $("#row"+id).remove();
            }
        });

    });
    </script>
</body>
</html>