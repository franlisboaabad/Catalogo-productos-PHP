<?php

include('../conexion/conexion.php');

$selected = $_POST['selected'];

if (isset($selected)) {
    $sql_category = 'SELECT id FROM category where nombre=? and estado=1';
    $sentencia_category = $pdo->prepare($sql_category);
    $sentencia_category->execute(array($selected));
    $resultado_category = $sentencia_category->fetch();


    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $cargaravatar = ($_FILES['avatar']['tmp_name']);
    $avatar_producto = fopen($cargaravatar, 'rb');
    $estado=true;


    var_dump($resultado_category['id'], $nombre, $descripcion, $precio, $cantidad, $avatar_producto);

    if ($_POST) {
        $sql_agregar = 'INSERT INTO producto (idcategory,nombre,descripcion,precio,cantidad,url,estado) VALUES (?,?,?,?,?,?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->bindParam(1, $resultado_category['id']);
        $sentencia_agregar->bindParam(2, $nombre);
        $sentencia_agregar->bindParam(3, $descripcion);
        $sentencia_agregar->bindParam(4, $precio);
        $sentencia_agregar->bindParam(5, $cantidad);
        $sentencia_agregar->bindParam(6, $avatar_producto, PDO::PARAM_LOB);
        $sentencia_agregar->bindParam(7, $estado, PDO::PARAM_BOOL);

        $sentencia_agregar->execute();

        header('location:productos.php');
        
        $sentencia_agregar = null;
        $pdo= null;
    }
}


