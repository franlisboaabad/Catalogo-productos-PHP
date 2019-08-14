<?php

include_once '../conexion/conexion.php';


$nombre_usuario = $_POST['usser'];
$correo_electronico = $_POST['email'];
$contrasena = $_POST['password'];
$contrasena2 = $_POST['password2'];


$sql_usser = 'SELECT * FROM ussers where usser=? and estado=1';
$sentencia_usser = $pdo->prepare($sql_usser);
$sentencia_usser->execute(array($nombre_usuario));
$resultado = $sentencia_usser->fetch();

if ($resultado) {
    echo'El usuario ya se encuentra registrado';
    die();
} else {

    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    
    if (password_verify($contrasena2, $contrasena)) {
        //echo '¡La contraseña es válida! <br>';
    
        //AGREGAR
        if ($_POST) {
                
            $sql_agregar = 'INSERT INTO ussers(usser,email,password,estado) values (?,?,?,1)';
            $sentencia_agergar = $pdo->prepare($sql_agregar);
        
        
            if ($sentencia_agergar->execute(array($nombre_usuario,$correo_electronico,$contrasena))) {
                    echo 'Agregado';
            } else {
                echo 'Error';
            }

            $sentencia_agergar=null;
            $pdo=null;
        
            header('location:../login.php');
        }
        else {
            echo 'Error la contraseña no es valida...';
        }

    }   

}


