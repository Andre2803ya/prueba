<?php
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) ){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
   
    
    $sentencia = $bd->prepare("INSERT INTO tarea(nombre) VALUES (?);");
    $resultado = $sentencia->execute([$nombre]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>