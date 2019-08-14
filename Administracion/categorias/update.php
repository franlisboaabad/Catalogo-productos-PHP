<?php 

include ('../conexion/conexion.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

    //AGREGAR
    if ($_POST) {
                
        $sql_update = 'UPDATE category set nombre=?, descripcion=? where id=?' ;
        $sentencia_update = $pdo->prepare($sql_update);
    
    
        if ($sentencia_update->execute(array($nombre,$descripcion,$id))) {
               // echo 'Categoria Registrada';
               header('location:categorias.php');
        } else {
                echo 'Error al actualizar categoria';
        }

        $sentencia_agregar=null;
        $pdo=null;
    
       // header('location:addcategoria.php');
    }


