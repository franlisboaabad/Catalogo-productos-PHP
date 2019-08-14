<?php

include('../conexion/conexion.php');

$id = $_GET['id'];


$sql_editar = 'UPDATE producto set estado=0 where id=?';
$sentencia_editar_producto = $pdo->prepare($sql_editar);
$sentencia_editar_producto->execute(array($id));


//cerramos conexion pdo
$sentencia_editar_producto=null;
$pdo=null;


header('location:productos.php');
