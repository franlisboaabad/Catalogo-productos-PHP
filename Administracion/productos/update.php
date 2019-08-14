<?php

include('../conexion/conexion.php');

$selected = $_POST['selected']; // retorna el id de la categoria seleccionada

//var_dump($selected);

if (isset($selected)) {
    $idproducto=$_POST['idproducto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $cargaravatar = ($_FILES['avatar']['tmp_name']);
    $avatar_producto = fopen($cargaravatar, 'rb');


    //  var_dump($selected, $nombre, $descripcion, $precio, $cantidad, $avatar_producto,$idproducto);

    if ($_POST) {
       

        //eliminar la imagen antes de actualizar // era una opcion
        /*$sql_delete = 'UPDATE producto set url=null where id=?';
        $sentencia_delete = $pdo->prepare($sql_delete);
        $sentencia_delete->execute(array($idproducto));*/

        //si existe imagen para cambiar -- realizamos el cambio de datos + imagen
        if ($avatar_producto != null) {
            $sql_update = 'UPDATE  producto SET nombre=:nombre,idcategory=:idcategory,descripcion=:descripcion,precio=:precio,cantidad=:cantidad,url=:url where id=:id';
            $sentencia_update = $pdo->prepare($sql_update);
            $sentencia_update->bindParam(':nombre', $nombre);
            $sentencia_update->bindParam(':idcategory', $selected);
            $sentencia_update->bindParam(':descripcion', $descripcion);
            $sentencia_update->bindParam(':precio', $precio);
            $sentencia_update->bindParam(':cantidad', $cantidad);
            $sentencia_update->bindParam(':url', $avatar_producto, PDO::PARAM_LOB);
            $sentencia_update->bindParam(':id', $idproducto);
            $sentencia_update->execute();
        } else {
            // en caso contrario solo cambiamos - documentacion
            $sql_update = 'UPDATE  producto SET nombre=:nombre,idcategory=:idcategory,descripcion=:descripcion,precio=:precio,cantidad=:cantidad where id=:id';
            $sentencia_update = $pdo->prepare($sql_update);
            $sentencia_update->bindParam(':nombre', $nombre);
            $sentencia_update->bindParam(':idcategory', $selected);
            $sentencia_update->bindParam(':descripcion', $descripcion);
            $sentencia_update->bindParam(':precio', $precio);
            $sentencia_update->bindParam(':cantidad', $cantidad);
            $sentencia_update->bindParam(':id', $idproducto);
            $sentencia_update->execute();
        }

        //var_dump($data);

        header('location:productos.php');
        
        $sentencia_update = null;
        $pdo= null;
    }
}


// si no encuentor imagen - realizar una consulta para actualizar datos menos imagen
//caso contrario actualizar todo si encuentro imagen
