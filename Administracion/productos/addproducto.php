<?php
session_start();

include('../conexion/conexion.php');

if (isset($_SESSION['admin'])) {
    # code...
    $usser = $_SESSION['admin'];
}

    
    $sql_category = 'SELECT * FROM category where estado = 1';
    $sentencia_category = $pdo->prepare($sql_category);
    $sentencia_category->execute();

    $resultado_category = $sentencia_category->fetchAll();
  
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
                                    <li><a href="categorias/categorias.php">Categorias</a>
                                    </li>                                        
                                    <li><a href="productos/productos.php">Productos</a>
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
                    <li> <a href="productos.php">Productos</a> </li>
                    <li class="active"> Agregar Producto </li>
                </ol>
              </div>
            </div>


            <div class="row">
                <a href="productos.php" class="btn waves-effect waves-light indigo">Lista de productos</a>
                <hr>
            </div>

            <div id="basic-form" class="section">
                        <div class="row">
                            <div class="col s12 m12 l6">
                            <div class="card-panel">
                                <div class="row">
                                    <form class="col s12" method="POST" action="create.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col s12 m8 l9">
                                        <div class="input-field col s12">
                                           
                                            <select name="selected">
                                            <option disabled selected>Seleccionar categoria</option>
                                            <?php foreach ($resultado_category as $item):  ?>
                                                 <option > <?=$item['nombre'] ?> </option>
                                            <?php endforeach ?>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name="nombre" required>
                                            <label for="first_name">Nombre</label>
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="input-field col s12">
                                            <input id="descripcion" type="text" name="descripcion" required>
                                            <label for="descripcion">Descripcion</label> 
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="input-field col s12">
                                            <input id="precio" type="text" name="precio" required>
                                            <label for="precio">Precio</label> 
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="input-field col s12">
                                            <input id="cantidad" type="text" name="cantidad" required>
                                            <label for="cantidad">cantidad</label> 
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <div class="file-field input-field">
                                                    <input class="file-path validate valid" type="text">
                                                    <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" name="avatar"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="row">
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Agregar Producto
                                                <i class="mdi-content-send right"></i>
                                            </button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        
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
    <script type="text/javascript" src="../js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="../js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="../js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="../js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../js/plugins.js"></script>
</body>

</html>