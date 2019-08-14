<?php
session_start();

include('../conexion/conexion.php');

if (isset($_SESSION['admin'])) {
    # code...
    $usser = $_SESSION['admin'];

    $consulta = 'SELECT p.id,c.nombre as categoria ,p.nombre,p.descripcion,p.precio,p.cantidad,p.url
                FROM producto p inner join category c on c.id = p.idcategory where p.estado=1';
    $sql_leer_producto = $consulta;
    $sentencia_producto = $pdo->prepare($sql_leer_producto);
    $sentencia_producto->execute();
    $resultado_producto = $sentencia_producto->fetchAll();
}
  
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Administracion - Blogpage</title>

    <!-- Favicons-->
    <link rel="icon" href="../images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="../images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="../css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">



</head>

<body>
    
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="/" class="brand-logo darken-1"><img src="../images/materialize-logo.png" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1>
                    <ul class="right hide-on-med-and-down">
                        <li class="search-out">
                            <input type="text" class="search-out-text">
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="../images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="usuarios/profile.php"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li>
                                    <li><a href="conexion/cerrar.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $usser; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Administrador</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold"><a href="administracion.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Panel de control </a>
                    </li>

                    <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i> Manteniiento Página</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="../categorias/categorias.php">Categorias</a>
                                    </li>                                        
                                    <li><a href="productos.php">Productos</a>
                                    </li>
                                    <li><a href="css-shadow.html">Blog</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                   
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->    

        </div>
        <!-- END WRAPPER -->

        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">                
                <ol class="breadcrumb">
                    <li><a href="../administracion.php">Panel de control</a></li>
                    <li class="active">Productos</li>
                </ol>
              </div>
            </div>


            <div class="row">
                <a href="addproducto.php" class="btn waves-effect waves-light indigo">Agregar Producto</a>
                <hr>
            </div>

            <div class="row">
                <div class="col s12 m8 l9">
                  <table class="hoverable">
                    <thead>
                      <tr>
                        <th data-field="id">Id</th>
                        <th data-field="categoria">Categoria</th>
                        <th data-field="name">Nombre</th>
                        <th data-field="descripcion">Descripcion</th>
                        <th data-field="precio">Precio</th>
                        <th data-field="cantidad">Cantidad</th>
                        <th data-field="url">Imagen</th>
                        <th data-field="operacion">Operaciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($resultado_producto as $item): ?>
                        <tr>
                        <th scope="row"> <?php echo $item['id']; ?> </th>
                        <td> <?=  $item['categoria']; ?> </td>
                        <td> <?=  $item['nombre']; ?> </td>
                        <td> <?=  $item['descripcion']; ?> </td>
                        <td> <?=  $item['precio']; ?> </td>
                        <td> <?=  $item['cantidad']; ?> </td>
                        <td class="text-center"> <?= '<img src="data:image/jpeg;base64,'.base64_encode($item['url']).' " class="img-fluid" style="width:50px; height:50px;" />'; ?> </td>
                        <td>   
                            <a href="delete.php?id=<?php echo $item['id'] ?>"><i class="mdi-action-delete red-text text-darken-2"></i> </a>
                            <a href="updateproducto.php?id=<?php echo $item['id'] ?>"> <i class="mdi-action-system-update-tv cyan-text text-darken-2 "> </i> </a> 
                        </td>                  
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>

            
          </div>
        </div>

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2019 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">GeeksLabs</a> All rights reserved.
                <span class="right"> Frank Lisboa Abad<a class="grey-text text-lighten-4" href="#!"> </a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->


    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="../js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
       

    <!--prism-->
    <script type="text/javascript" src="../js/prism.js"></script>
    <!-- chartjs -->
    <script type="text/javascript" src="../js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="../js/plugins/chartjs/chart-script.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="../js/plugins/sparkline/sparkline-script.js"></script>

    <!-- chartist -->
    <script type="text/javascript" src="../js/plugins/chartist-js/chartist.min.js"></script>  
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../js/plugins.js"></script>
    <!-- Toast Notification -->
    <script type="text/javascript">
    
    </script>
</body>

</html>