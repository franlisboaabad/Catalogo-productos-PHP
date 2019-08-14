
<?php
    include('conexion/conexion.php');
    session_start();
    
    $idcategory = $_GET['id'];

    $sql_category = 'SELECT nombre FROM category where estado=1 and id=?';
    $sentencia_category = $pdo->prepare($sql_category);
    $sentencia_category->execute(array($idcategory));
    $resultado_category = $sentencia_category->fetch();

    $consulta_producto = 'SELECT id,nombre,descripcion,precio,cantidad,url FROM producto p  where estado = 1 and idcategory=?';
    $sql_producto = $consulta_producto;
    $sentencia_producto = $pdo->prepare($sql_producto);
    $sentencia_producto->execute(array($idcategory));
    $resultado_producto = $sentencia_producto->fetchAll();

?>

    

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>CATALOGO DE PRODUCTOS / INFORMÁTICA</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-material-design.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
    <style>
        html {
            font-size: 14px;
        }

        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        }

        .card-deck .card {
            min-width: 220px;
        }

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }
    </style>
</head>

<body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"> <a href="/">MI CATALOGO</a> </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Features</a>
            <a class="p-2 text-dark" href="#">Enterprise</a>
            <a class="p-2 text-dark" href="#">Support</a>
            <a class="p-2 text-dark" href="#">Pricing</a>
        </nav>
        <a class="btn btn-outline-primary" href="<?php echo isset($_SESSION['admin'])? 'administracion.php' : 'login.php' ?>">
        <?php echo isset($_SESSION['admin'])? 'ADMINISTRACION' : 'LOGIN' ?>
        </a>
        
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"> CATEGORIA :  <?= $resultado_category['nombre']; ?> </h1>
        
    </div>

    <div class="container">
      
        <div class="row">
        <?php foreach ($resultado_producto as $item):?>
            <div class="col-md-4 pb-2 d-flex align-items-stretch">
                <div class="card text-center">
                    
                    <div class="text-center pt-2">
                    <?= '<img src="data:image/jpeg;base64,'.base64_encode($item['url']).' " class="img-fluid"/> '; ?>
                    </div>
              
                        <div class="card-body">
                            <h5 class="card-title"> <?= $item['nombre']  ?> </h5>
                            <p class="card-text"><?= $item['descripcion']  ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">precio : <?= $item['precio']  ?></li>
                            <li class="list-group-item">cantidad : <?= $item['cantidad']  ?></li>
                        </ul>
                        <div class="card-body">
                            <button type="button" class="btn btn-raised btn-success">cotizar</button>                          
                        </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <img class="mb-2" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="24"
                        height="24">
                    <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Cool stuff</a></li>
                        <li><a class="text-muted" href="#">Random feature</a></li>
                        <li><a class="text-muted" href="#">Team feature</a></li>
                        <li><a class="text-muted" href="#">Stuff for developers</a></li>
                        <li><a class="text-muted" href="#">Another one</a></li>
                        <li><a class="text-muted" href="#">Last time</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Resource</a></li>
                        <li><a class="text-muted" href="#">Resource name</a></li>
                        <li><a class="text-muted" href="#">Another resource</a></li>
                        <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Team</a></li>
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap-material-design.min.js"></script>
    <script src="js/vendor/holder.min.js"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>
</body>

</html>