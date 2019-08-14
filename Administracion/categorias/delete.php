<?php 

include ('../conexion/conexion.php');

$id = $_GET['id'];


$sql_editar = 'UPDATE category set estado=0 where id=?';
$sentencia_editar_category = $pdo->prepare($sql_editar);
$sentencia_editar_category->execute(array($id));


//cerramos conexion pdo
$sentencia_editar=null;
$pdo=null;


header('location:categorias.php');
