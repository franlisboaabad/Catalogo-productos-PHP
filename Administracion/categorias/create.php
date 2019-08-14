<?php

include('../conexion/conexion.php');

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];


if (isset($nombre) && isset($descripcion)) {
    $sql_category = 'SELECT * FROM category where nombre=? and estado=1';
    $sentencia_category = $pdo->prepare($sql_category);
    $sentencia_category->execute(array($nombre));
    $resultado_category = $sentencia_category->fetch();
    
    var_dump($nombre, $descripcion);
    
    if ($resultado_category) {
        echo'Categoria ya se encuentra registrada';
        die();
    } else {
    
        //AGREGAR
        if ($_POST) {
            $sql_agregar = 'INSERT INTO category(nombre,descripcion,estado) values (?,?,1)';
            $sentencia_agregar = $pdo->prepare($sql_agregar);
        
        
            if ($sentencia_agregar->execute(array($nombre,$descripcion))) {
                // echo 'Categoria Registrada';
                header('location:categorias.php');
            } else {
                echo 'Error al registrar';
            }
    
            $sentencia_agregar=null;
            $pdo=null;
        
            // header('location:addcategoria.php');
        }
    }
} else {
    echo 'Error, no ingreso los datos...';
}
