
<?php 
    //include_once('./class/db.class.php');
    
    //include_once('./class/magazines.class.php');
    
    //$magazine = new Magazine();
    //$magazines = $magazine->getById(1);
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
            <div class="social-media">
                <a href="https://www.facebook.com/laplaza.inmobiliaria" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/laplazainmobiliaria/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="favourite-magazine">
                <i class="fas fa-arrow-left"></i> Seleccione su revista favorita
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">CONSTRUYA HOY</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">LA PLAZA INMOBILIARIA</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <iframe id="yumpuLaPlaza" class="yumpu-container" src="https://www.yumpu.com/es/embed/view/9B0ksp76l5ErG8o4" frameborder="0" allowfullscreen="true"  allowtransparency="true"></iframe>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">      
                    <iframe id="yumpuConstruya" class="yumpu-container" src="https://www.yumpu.com/es/embed/view/bpNP71Chu4e9wy0i" frameborder="0" allowfullscreen="true"  allowtransparency="true"></iframe>
                </div>
            </div>


            </div>
        </div>
    </section>
    <footer>La plaza inmobiliaria | Construya hoy | Todos los derechos resevados ©</footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</body>
</html>

